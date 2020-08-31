<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\MetaTraderCharge;
use Morilog\Jalali\CalendarUtils;
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

        $charge->meta_trader_account = $request->input('meta_trader_account');
        $charge->amount = $request->input('amount');
        $charge->description = $request->input('description');
        $charge->users_id = Auth::user()->id;
        $charge->save();

        $request->session()->flash("msg_success", "تراکنش با موفقیت افزوده شد.");
        return redirect()->route('charges');
    }
}
