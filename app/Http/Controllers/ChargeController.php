<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\MetaTraderCharge;
use Morilog\Jalali\CalendarUtils;
use App\MetaTraderWeeklyData;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function index(){
        $charges = MetaTraderCharge::where('id', '>', 0)->get();

        return view('charges.index',[
            'charges' => $charges,
            'msg_success' => request()->session()->get('msg_success'),
            'msg_error' => request()->session()->get('msg_error')
        ]);
    }

    public function create(Request $request)
    {
        $charge = new MetaTraderCharge;
        if($request->getMethod()=='GET'){
            return view('charges.create', [
                "charge"=>$charge,
            ]);
        }

        $charge->meta_trader_account = 'default';
        $charge->amount = $request->input('amount');
        $charge->description = $request->input('description');
        $charge->users_id = Auth::user()->id;
        $charge->save();

        $remaining = MetaTraderCharge::where('meta_trader_account', $charge->meta_trader_account)->sum('amount');

        $startWeek = date("Y-m-d");
        if(date("w")!=1){
            $startWeek = date("Y-m-d", strtotime("last monday"));
        }

        // $report = MetaTraderWeeklyData::where('created_at', '>=', $startWeek . ' 00:00:00')->where('created_at', '<=', $startWeek . ' 23:59:59')->first();
        // if($report == null) {
        //     $report = new MetaTraderWeeklyData;
        //     $report->start_charge = $remaining;
        //     $report->start_of_week = $startWeek;
        //     $report->meta_trader_account = $charge->meta_trader_account;
        //     $report->save();
        // }

        $request->session()->flash("msg_success", "تراکنش با موفقیت افزوده شد.");
        return redirect()->route('charges');
    }
}
