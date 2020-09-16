<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\MetaTraderCharge;
use Morilog\Jalali\CalendarUtils;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public static function request($url, $payload) {
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        try{
          $result = json_decode($result, true);
        }catch(Exception $error) {
          $result = null;
        }
        return $result;
    }

    public function edit(Request $request)
    {
        $setting = Setting::first();
        if($request->getMethod()=='GET'){
            return view('settings.create', [
                "setting"=>$setting,
            ]);
        }

        $setting->enabled = ($request->input('enabled'))?1:0;
        $setting->time = (int)$request->input('time');
        $setting->price = (float)$request->input('price');
        $setting->number = (int)$request->input('number');
        $setting->type = $request->input('type');
        $setting->save();

        $settingArray = $setting->toArray();
        unset($settingArray["id"]);
        unset($settingArray["created_at"]);
        unset($settingArray["updated_at"]);

        $payload = json_encode($settingArray);
        SettingController::request(env('META_SYSTEM_SETTING_SEND_URL'), $payload);


        $request->session()->flash("msg_success", "تنظیمات با موفقیت افزوده شد.");
        return view('settings.create', [
            "setting"=>$setting,
        ]);
    }

    public function test(Request $request)
    {
        return $request->all();
    }
}
