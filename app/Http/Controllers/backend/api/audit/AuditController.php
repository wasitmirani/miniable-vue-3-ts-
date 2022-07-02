<?php

namespace App\Http\Controllers\backend\api\audit;

use App\Models\Audit;
use App\Models\Auditor;
use App\Models\AuditDate;
use Illuminate\Support\Str;
use App\Models\AuditAuditor;
use Illuminate\Http\Request;
use App\Jobs\SendAuditEmailJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{
    //
    public function index(Request $request){
        $q=request('query');
        $audits =Audit::latest();


        if(!empty($request->date_range)){

        }
        $audits = $audits->where('title', 'like', '%' . $q . '%')
                         ->orWhere('phone','like', '%' . $q . '%')
                         ->orWhere('location','like', '%' . $q . '%')
                         ->with('auditdates','status:id,name','auditors')
                         ->paginate((int)env('PER_PAGE'));
        $auditors =Auditor::orderBy('name','ASC')->get();
        return response()->json(['audits'=>$audits,'auditors'=>$auditors]);
    }
    public function getAuditDetails(Request $request){
        $audit = Audit::find($request->id)->with('user','auditdates','status:id,name','auditors')->first();
        $audit->auditdates = $audit->auditdates()->orderBy('audit_date','ASC')->get();
        // $audit->auditors = $audit->auditors()->orderBy('name','ASC')->get();
        return response()->json(['audit'=>$audit]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'min:6','max:255'],
            'description' => ['required', 'string', 'min:20'],
        ]);

DB::beginTransaction();
try{
        $audit =Audit::create([
            'title'=>$request->title,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'location'=>$request->location,
            'user_id'=>$request->user()->id,
        ]);


        foreach ($request->dates as $key => $value) {
            # code...
            AuditDate::create([
                'audit_id'=>$audit->id,
                'audit_date'=>date('Y-m-d H:i:s', strtotime($value)),
                'status_id'=>1,
            ]);
        }
        foreach ($request->auditors as $key => $auditor) {

            AuditAuditor::create([
                'audit_id'=>$audit->id,
                'token'=>(string)Str::uuid(),
                'auditor_id'=>$auditor['id'],
            ]);
            dispatch(new SendAuditEmailJob($auditor,$audit));

        }
        // Auditors
        DB::commit();
        return response()->json(['message'=>'Audit has been created successfully.','audit'=>$audit]);
    }
    catch(\Exception $e){
        //if there is an error/exception in the above code before commit, it'll rollback
        DB::rollBack();
        // return $e->getMessage();
        return response()->json(['message'=>$e->getMessage()],422);
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => ['required', 'string', 'min:6','max:255'],
            'description' => ['required', 'string', 'min:20'],
        ]);
        $audit =Audit::findOrFail($id);
        $audit->update([
            'title'=>$request->title,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'location'=>$request->location,
            'user_id'=>$request->user()->id,
        ]);
        $audit->auditdates()->delete();
        foreach ($request->dates as $key => $value) {
            # code...
            AuditDate::create([
                'audit_id'=>$audit->id,
                'audit_date'=>date('Y-m-d H:i:s', strtotime($value)),
                'status_id'=>1,
            ]);
        }
        $audit->auditors()->delete();
        foreach ($request->auditors as $key => $auditor) {

            AuditAuditor::create([
                'audit_id'=>$audit->id,
                'token'=>(string)Str::uuid(),
                'auditor_id'=>$auditor['id'],
            ]);
            dispatch(new SendAuditEmailJob($auditor,$audit));

        }
        return response()->json(['message'=>'Audit has been updated successfully.','audit'=>$audit]);
    }
    public function destroy($id){
        AuditDate::where('audit_id',$id)->delete();
        AuditAuditor::where('audit_id',$id)->delete();
        $audit=Audit::destroy($id);
        if($audit)
          return response()->json(['message' => 'Audit has been destroyed successfully'], 200);
        else
            return response()->json(['message' => 'Audit has not been not found'], 400);

    }
}
