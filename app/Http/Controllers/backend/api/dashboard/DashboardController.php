<?php

namespace App\Http\Controllers\backend\api\dashboard;

use App\Models\User;
use App\Models\Audit;
use App\Models\Auditor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function setDateFilter($val){

        switch ($val) {
            case 'Weekly':
                return date('Y-m-d', strtotime('-20 days'));
            break;
            case 'Daily':
                return date('Y-m-d');
            break;
            case 'Monthly':
                return  date('Y-m-d', strtotime('-30 days'));
            break;
            case 'Yearly':
                return  date('Y-m-d', strtotime('-360 days'));
            break;
            default:
                # code...
                break;
        }
        }
    public function getDashboard(Request $request)
    {
        $audits=Audit::query();
        // query()
        $startDate=date('Y-m-d');
        // $startDate = Carbon::parse(date('Y-m-d', strtotime( $startDate)));

        // if(!empty($request->date_range)){
        //     $endDate=$this->setDateFilter($request->date_range);
        //     $endDate = Carbon::parse(date('Y-m-d', strtotime( $endDate)));

        //     $audits= $audits->whereBetween('created_at', [$endDate, $startDate]);
        // }
        // else {
        //     $endDate=$this->setDateFilter("Weekly");
        //     // $endDate = Carbon::parse(date('Y-m-d', strtotime( $endDate)));
        //     $audits= $audits->whereBetween('created_at', [$endDate, $startDate]);

        // }

        $audits= $audits->select(
            array(
                DB::raw('COUNT(*) as total'),
                DB::raw("SUM(CASE
                    WHEN status_id = '1' THEN 1 ELSE 0 END) AS created"),
                DB::raw("SUM(CASE
                    WHEN status_id = '2' THEN 1 ELSE 0 END) AS inproccess"),
               DB::raw("SUM(CASE
                    WHEN status_id = '3' THEN 1 ELSE 0 END) AS completed"),
              DB::raw(" DATE_FORMAT(updated_at, '%D-%M-%Y') date")
            )
        )->groupBy('date')->get();
        $users=User::all()->count();
        $auditor=Auditor::all()->count();
        $q=request('query');
        $active_audits=Audit::latest()->whereNotIn('status_id',[3])
        ->with('auditdates','status:id,name','auditors')
        ->paginate((int)env('PER_PAGE'));
        // query()
        return response()->json(['active_audits'=>$active_audits,'audit_stats'=>$audits,'total_users'=>$users,'total_auditors'=>$auditor]);
    }
}
