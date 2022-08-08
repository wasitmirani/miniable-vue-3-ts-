<?php

namespace App\Http\Controllers\backend\api\audit;

use App\Models\Audit;
use App\Models\Auditor;
use App\Models\AuditDate;
use Illuminate\Support\Str;
use App\Models\AuditAuditor;
use Illuminate\Http\Request;
use App\Models\AuditAssigned;
use App\Jobs\SendAuditEmailJob;
use App\Models\AuditDateRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class AuditController extends Controller
{
    //


    public function updateAuditRemark(Request $request)
    {
        $audit=Audit::find($request->id);
        $audit->remarks=$request->remarks;
        $audit->status_id=3;
        $audit->save();
        $auditors=AuditAuditor::where('audit_id',$request->id)->pluck('auditor_id');
        $auditors=Auditor::whereIn('id',$auditors)->get();

        $audit_dates=AuditDate::where('audit_id',$audit->id)->get();
        $audit_dates=collect($audit_dates)->sortBy('audit_date');
        $audit_assigned=AuditAssigned::where('audit_id',$audit->id)->with('auditdate','auditor')->get();
        $audit_assigned=collect($audit_assigned)->map(function($item) {
          return [
                'auditor_name'=>$item->auditor->name,
                'auditor_id'=>$item->auditor->id,
                'auditor_email'=>$item->auditor->email,
                'audit_date'=>$item->auditdate->audit_date,
                'audit_date_id'=>$item->auditdate->id,
                'is_assigned'=>$item->is_assigned,
          ];

        })->sortBy('audit_date')->values();
        $audit_date_requests= AuditDateRequest::where(['audit_id'=> $audit->id])->with('auditdate','auditor')->get();
        $audit_date_requests=collect($audit_date_requests)->map(function($item) use($audit_assigned) {
         $audit_request=collect($audit_assigned)->where('auditor_id',$item->auditor_id)->where('audit_date_id',$item->audit_date_id)->first();
          return [
            'auditor_name'=>$item->auditor->name,
            'auditor_id'=>$item->auditor->id,
            'auditor_email'=>$item->auditor->email,
            'audit_date'=>$item->auditdate->audit_date->format('d-m-Y'),
            'audit_date_id'=>$item->auditdate->id,
            'is_assigned'=>!empty($audit_request) ?$audit_request['is_assigned'] : 0,
          ];

        });

    $audit_date_requests= $audit_date_requests->groupBy('auditor_id')->values();


        foreach ($auditors as $key => $auditor) {
            $audit_auditor= AuditAuditor::where(['audit_id'=>$audit->id,'auditor_id'=>$auditor['id']])->first();
             $new_auditor = [
                              'token'=>$audit_auditor->token,
                              'audit_id'=>$audit->id,
                              'auditor_id'=>$auditor['id'],
                              'name'=>$auditor['name'],
                              'email'=>$auditor['email']];


             dispatch(new SendAuditEmailJob($new_auditor,$audit,$audit_date_requests,$audit_dates));

         }
        return response()->json(['message'=>'Audit remark updated successfully'],200);

    }
    public  function sendSurveyDates(Request $request)
    {

        $audit_auditor= AuditAuditor::where('token',$request->token)->with('auditor')->first();
        AuditDateRequest::where(['audit_id'=>$audit_auditor->audit_id,'auditor_id'=>$audit_auditor->auditor_id])->delete();
        $audit_dates=AuditDate::whereIn('id',$request->available_dates)->get();
        $not_dates_availability=AuditDate::where('audit_id',$audit_auditor->audit_id)->whereNotIn('id',$request->available_dates)
        ->get();

        $audit=Audit::where('id',$audit_auditor->audit_id)->first();

        if($audit_auditor->finished==0 ){

         $audit->status_id=2;

         activity()
        ->performedOn($audit)
        ->withProperties(['name' => $audit_auditor->auditor->name, 'email' => $audit_auditor->auditor->email])
        ->log($audit_auditor->auditor->name.' has sent survey dates successfully');
         $audit->save();
         $audit->increment('response');
        }
        $audit_auditor->status_id=2;
        $audit_auditor->finished=1;
        $audit_auditor->save();
        foreach ($audit_dates as $key => $item) {
            # code...
            AuditDateRequest::create([
                'audit_id'=>$audit_auditor->audit_id,
                'auditor_id'=>$audit_auditor->auditor_id,
                'audit_date_id'=>$item->id,
                'availability'=>1
            ]);
        }
        foreach ($not_dates_availability as $key => $value) {
            # code...
            AuditDateRequest::create([
                'audit_id'=>$audit_auditor->audit_id,
                'auditor_id'=>$audit_auditor->auditor_id,
                'audit_date_id'=>$value->id,
                'availability'=>0
            ]);
        }


        // $check_auditor= AuditAuditor::where(['audit_id'=>$audit_auditor->audit_id,'finished'=>0])->get();
        //     if(count($check_auditor)==0){
        //         $audit->status_id=3;
        //         $audit->save();
        //     }


        return redirect()->route('thank');
    }
    public function auditSurvey(Request $request){
       $audit_auditor= AuditAuditor::where('token',$request->token)->with('auditor')->first();
       if(empty($audit_auditor)){
              return response()->json(['message'=>'Invalid Token'],401);
       }
       $audit=Audit::where('id',$audit_auditor->audit_id)->with('auditdates','status:id,name')->first();

        if($audit->status_id<3){
            $audit->status_id=2;
            $audit->save();
        }
        $audit_dates=AuditDate::where('audit_id',$audit_auditor->audit_id)->get();
        $audit_dates=collect($audit_dates)->sortBy('audit_date');
        $audit_assigned=AuditAssigned::where('audit_id',$audit_auditor->audit_id)->with('auditdate','auditor')->get();
        $audit_assigned=collect($audit_assigned)->map(function($item) {
          return [
                'auditor_name'=>$item->auditor->name,
                'auditor_id'=>$item->auditor->id,
                'auditor_email'=>$item->auditor->email,
                'audit_date'=>$item->auditdate->audit_date,
                'audit_date_id'=>$item->auditdate->id,
                'is_assigned'=>$item->is_assigned,
          ];

        })->sortBy('audit_date')->values();
        $audit_date_requests= AuditDateRequest::where(['audit_id'=> $audit->id])->with('auditdate','auditor')->get();
        $audit_date_requests=collect($audit_date_requests)->map(function($item) use($audit_assigned) {
         $audit_request=collect($audit_assigned)->where('auditor_id',$item->auditor_id)->where('audit_date_id',$item->audit_date_id)->first();
          return [
            'auditor_name'=>$item->auditor->name,
            'auditor_id'=>$item->auditor->id,
            'auditor_email'=>$item->auditor->email,
            'audit_date'=>$item->auditdate->audit_date->format('d-m-Y'),
            'audit_date_id'=>$item->auditdate->id,
            'is_assigned'=>!empty($audit_request) ?$audit_request['is_assigned'] : 0,
          ];

        });

    $audit_date_requests= $audit_date_requests->groupBy('auditor_id')->values();



        $auditor_audit_requests=AuditDateRequest::where(['audit_id'=> $audit->id,'auditor_id'=>$audit_auditor->auditor->id])->where('availability',1)->get();
        $audit_requests_ids=$auditor_audit_requests->pluck('audit_date_id');

       return view('survey.index',['audit_date_requests'=>$audit_date_requests,'audit'=>$audit,'audit_dates'=>$audit_dates,'audit_auditor'=>$audit_auditor,'audit_requests_ids'=>$audit_requests_ids]);

    }
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
        $audit = Audit::where('id',$request->id)->with('user','auditdates','status:id,name','auditors')->first();
        $audit->auditdates = $audit->auditdates()->orderBy('audit_date','ASC')->get();

        $activities=Activity::where('subject_id', $audit->id)->where('subject_type',get_class($audit))->get();
        $auditors =Auditor::orderBy('name','ASC')->get();
        // $audit->auditors = $audit->auditors()->orderBy('name','ASC')->get();
        return response()->json(['auditors'=>$auditors,'audit'=>$audit,'activities'=>$activities]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string','max:255'],
            'description' => ['required', 'string'],
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
                'audit_date'=>date('Y-m-d', strtotime($value)),
                'status_id'=>1,
            ]);
        }
        foreach ($request->auditors as $key => $auditor) {

           $audit_auditor= AuditAuditor::create([
                'audit_id'=>$audit->id,
                'token'=>(string)Str::uuid(),
                'auditor_id'=>$auditor['id'],
            ]);
            $new_auditor = [
                             'token'=>$audit_auditor->token,
                             'audit_id'=>$audit->id,
                             'auditor_id'=>$auditor['id'],
                             'name'=>$auditor['name'],
                             'email'=>$auditor['email']];
            dispatch(new SendAuditEmailJob($new_auditor,$audit));

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
            'title' => ['required', 'string','max:255'],
            'description' => ['required', 'string'],
        ]);
        $audit =Audit::findOrFail($id);
        $audit->update([
            'title'=>$request->title,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'status_id'=>2,
            'location'=>$request->location,
            'user_id'=>$request->user()->id,
            'response'=>0,
        ]);

        AuditDateRequest::where('audit_id',$id)->delete();
        $audit->auditdates()->delete();

        foreach ($request->dates as $key => $value) {
            # code...
            AuditDate::create([
                'audit_id'=>$audit->id,
                'audit_date'=>date('Y-m-d', strtotime($value)),
                'status_id'=>1,
            ]);
        }
        $audit->auditors()->delete();
        foreach ($request->auditors as $key => $auditor) {

            $audit_auditor=  AuditAuditor::create([
                'audit_id'=>$audit->id,
                'token'=>(string)Str::uuid(),
                'auditor_id'=>$auditor['id'],
            ]);
            $new_auditor = [
                'token'=>$audit_auditor->token,
                'audit_id'=>$audit->id,
                'auditor_id'=>$auditor['id'],
                'name'=>$auditor['name'],
                'email'=>$auditor['email']];
            dispatch(new SendAuditEmailJob($new_auditor,$audit));

        }
        return response()->json(['message'=>'Audit has been updated successfully.','audit'=>$audit]);
    }
    public function destroy($id){
        AuditDateRequest::where('audit_id',$id)->delete();
        AuditDate::where('audit_id',$id)->delete();
        AuditAuditor::where('audit_id',$id)->delete();
        $audit=Audit::destroy($id);
        if($audit)
          return response()->json(['message' => 'Audit has been destroyed successfully'], 200);
        else
            return response()->json(['message' => 'Audit has not been not found'], 400);

    }

    public function getAuditDates($request){
      $audit_date=  AuditDate::where(['id'=>$request->audit_date_id,'audit_id'=>$request->audit_id])->with('auditor')->first();
      if(empty($audit_date->auditor_assistant)){
        $audit_date->auditor_assistant =$request->auditor_id;
        $audit_date->status_id=3;
        $audit_date->finished=1;
        $audit_date->save();
        return ['message'=>'Auditor Assistant has been assigned successfully.','code'=>200];
      }
      else {
        return ['message'=>$audit_date->auditor->name.' , Auditor Assistant has already been assigned.','code'=>422];
      }
    }
    public function updateAuditReject(Request $request){
        $audit_req=AuditDateRequest::where('id',$request->id)->first();
        if(empty($audit_req)){
            return response()->josn(['message'=>'Audit Date Request has not been found.','code'=>422],422);
        }
        else {

            $auditAssigned=AuditAssigned::where(['audit_date_id'=>$audit_req->audit_date_id,'auditor_id'=>$audit_req->auditor_id,'audit_id'=>$audit_req->audit_id])->first();
            if(empty($auditAssigned)){
                return response()->json(['message'=>'Audit Date Request has not been found.','code'=>422],422);
            }
            else {
                $audit_req->update(['approval_type'=>2]);
                $auditAssigned->delete();
                return response()->json(['message'=>'Audit Date Request has been rejected successfully.','code'=>200],200);
            }

        }
    }
    public function updateAuditApproval(Request $request){
        $audit_req=AuditDateRequest::where('id',$request->id)->first();
        if(empty($audit_req)){
            return response()->josn(['message'=>'Audit Date Request has not been found.','code'=>422],422);
        }
        else {
            $audit_req->update(['approval_type'=>1]);
            return response()->json($this->assignedAuditToAuditor($audit_req));
        }
        // if($request->approval_type=="2"){
        //     $audit_req->update(['approval_type'=>$request->approval_type]);
        //      AuditDate::where(['id'=>$audit_req->audit_date_id,'audit_id'=>$audit_req->audit_id])->update(['status_id'=>2,'finished'=>0,'auditor_assistant'=>null]);
        // }
        // else{
        // $assinged_auditor= $this->getAuditDates($audit_req);
        // if($assinged_auditor['code']==200){
        //     $audit_req->update(['approval_type'=>$request->approval_type]);
        //     return response()->json( $assinged_auditor);
        // }
        // else{
        //     return response()->json($assinged_auditor,$assinged_auditor['code']);
        // }

        // }

        // if($audit_req)
        //     return response()->json(['message' => 'Audit has been updated successfully'], 200);
        // else
        //     return response()->json(['message' => 'Audit  has not been not found'], 400);

    }
    public function assignedAuditToAuditor($request){
        $auditAssigned=AuditAssigned::where(['audit_date_id'=>$request->audit_date_id,'auditor_id'=>$request->auditor_id,'audit_id'=>$request->audit_id])->first();
        if(empty($auditAssigned)){
            AuditAssigned::create([
                'audit_date_id'=>$request->audit_date_id,
                'auditor_id'=>$request->auditor_id,
                'audit_id'=>$request->audit_id,
                'is_assigned'=>1,
            ]);
            return ['message'=>'Audit has been assigned successfully.','code'=>200];
        }
        else {
            return ['message'=>'Audit has already been assigned.','code'=>422];
        }
    }
    public function resendMail(Request $request){
        $audit_auditor= AuditAuditor::where(['audit_id'=>$request->id,'finished'=>0])->with('auditor')->get();
        $audit=Audit::where('id',$request->id)->first();
        foreach ($audit_auditor as $key => $item) {
            # code...
            $new_auditor = [
                'token'=>$item->token,
                'audit_id'=>$item->audit_id,
                'auditor_id'=>$item->auditor['id'],
                'name'=>$item->auditor['name'],
                'email'=>$item->auditor['email']];
            dispatch(new SendAuditEmailJob($new_auditor,$audit,null,null));
        }

        return response()->json(['message'=>'Audit resend mail has been sended successfully.','audit'=>$audit]);
    }
}
