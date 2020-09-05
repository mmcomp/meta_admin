<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\MetaTraderWeeklyData;
use App\MetaTraderCharge;
use App\MetaData;
use Morilog\Jalali\CalendarUtils;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reports = MetaTraderWeeklyData::where('remain_charge', '!=', null)->get();

        return view('reports.index',[
            'reports' => $reports,
            'msg_success' => request()->session()->get('msg_success'),
            'msg_error' => request()->session()->get('msg_error')
        ]);
    }

    public function create(Request $request){
        $startWeek = date("Y-m-d");
        if(date("w")!=1){
            $startWeek = date("Y-m-d", strtotime("last monday"));
        }

        $report = MetaTraderWeeklyData::where('start_of_week', $startWeek . ' 00:00:00')->first();
        // dd($report);
        if($report && $report->remain_charge!=null) {
            $request->session()->flash("msg_error", "گزارش هفته گذشته ثبت شده است!");
            return redirect()->route('reports');
        }

        if($report == null) {
            $remaining = MetaTraderCharge::where('meta_trader_account', 'default')->sum('amount');
            $report = new MetaTraderWeeklyData;
            $report->start_charge = $remaining;
            $report->start_of_week = $startWeek;
            $report->meta_trader_account = 'default';
            $report->save();
        }
        if($request->getMethod()=='GET'){
            return view('reports.create', [
                "report"=>$report,
            ]);
        }

        $report->remain_charge = $request->input('remain_charge');
        $report->cost_and_benefit_rial = $request->input('cost_and_benefit_rial');
        $report->dollar_to_rial = $request->input('dollar_to_rial');
        $report->users_id = Auth::user()->id;
        $report->save();

        $request->session()->flash("msg_success", "گزارش با موفقیت افزوده شد.");
        return redirect()->route('reports');
    }

    //----------------API-----------------
    public function metaTraderOpens(Request $request) {
        $count = $request->input('count');
        if($count==null)
            return ["status"=>false];

        $metaTraderOpens = MetaData::where('field_name', 'MetaTraderOpens')->first();
        if($metaTraderOpens==null) {
            $metaTraderOpens = new MetaData;
            $metaTraderOpens->field_name = 'MetaTraderOpens';
            $metaTraderOpens->field_persian_name = 'تعداد باز در متاتریدر';
            $metaTraderOpens->field_type = 'int';
        }
        $metaTraderOpens->field_value = $count;
        $metaTraderOpens->save();

        return ["status"=>true];
    }
}
