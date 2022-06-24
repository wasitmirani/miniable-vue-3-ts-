<?php

namespace App\Http\Controllers\backend\api\audit;

use App\Models\Audit;
use App\Models\Auditor;
use App\Models\AuditDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{
    //
    public function index(Request $request){
        $q=request('query');
        $audits =Audit::latest()->where('title', 'like', '%' . $q . '%')
                         ->with('auditdates','status:id,name')
                         ->paginate((int)env('PER_PAGE'));
        $auditors =Auditor::orderBy('name','ASC')->get();
        return response()->json(['audits'=>$audits,'auditors'=>$auditors]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'min:6','max:255'],
            'description' => ['required', 'string', 'min:20','max:255'],
        ]);

        $audit =Audit::create([
            'title'=>$request->title,
            'company'=>$request->company,
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
        // Auditors
        return response()->json(['message'=>'Audit has been created successfully.','audit'=>$audit]);
    }
}
