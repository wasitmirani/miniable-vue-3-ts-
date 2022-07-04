<?php

namespace App\Http\Controllers\backend\api\dashboard;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function setDateFilter($val){

        switch ($val) {
            case 'week':
                return date('Y-m-d', strtotime('-7 days'));
            break;
            case 'today':
                return date('Y-m-d');
            break;
            case 'monthly':
                return  date('Y-m-d', strtotime('-1 days'));
            break;
            case 'yearly':
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
        $startDate = Carbon::parse(date('Y-m-d', strtotime( $startDate)));

        if(!empty($request->date_range)){
            $endDate=$this->setDateFilter($request);
            $audits= $audits->where('created_at','>=',$endDate." 00:00:00")->where('created_at','<=',$startDate." 23:59:59");
        }
        else {
            $endDate=$this->setDateFilter("week");
            $endDate = Carbon::parse(date('Y-m-d', strtotime( $endDate)));
            $audits= $audits->whereBetween('created_at', [$endDate, $startDate]);

        }

        $audits= $audits->select(
            array(
                DB::raw('COUNT(*) as total'),
                DB::raw("SUM(CASE
                    WHEN status_id = '1' THEN 1 ELSE 0 END) AS created"),
                DB::raw("SUM(CASE
                    WHEN status_id = '2' THEN 1 ELSE 0 END) AS inproccess"),
               DB::raw("SUM(CASE
                    WHEN status_id = '3' THEN 1 ELSE 0 END) AS completed"),
              DB::raw(" DATE_FORMAT(updated_at, '%d-%m-%Y') date")
            )
        )->groupBy('date')->get();
        // ->selectRaw(
        //         "SUM((CASE WHEN status_id = 1 THEN 1 ELSE 0 END)) AS created,
        //         SUM((CASE WHEN status_id = 2 THEN 1 ELSE 0 END)) AS inproccess,
        //         SUM((CASE WHEN status_id = 3 THEN 1 ELSE 0 END)) AS completed,
        //          DATE_FORMAT(updated_at, '%d-%m-%Y') date")
        return response()->json(['audit_stats'=>$audits]);
    }
}
