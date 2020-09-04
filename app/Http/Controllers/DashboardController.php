<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\MetaData;
use Morilog\Jalali\CalendarUtils;

class DashboardController extends Controller
{
    public static function fixDateDigits($inp){
        $out = explode('-', $inp);
        if(count($out)!=3){
            return $inp;
        }
        if((int)$out[1]<10){
            $out[1] = '0' . $out[1];
        }
        if((int)$out[2]<10){
            $out[2] = '0' . $out[2];
        }
        return implode('-', $out);
    }

    public function index(){
        $metaDatas = MetaData::all();
        $metas = [];
        foreach($metaDatas as $metaData) {
            $value = $metaData->field_value;
            if($metaData->field_type=='int') {
                $value = (int)$value;
            }else if($metaData->field_type=='float') {
                $value = (float)$value;
            }
            $metas[$metaData->field_name] = $value;
        }
        // dd($metas);

        $result = file_get_contents(env("META_SYSTEM_OPEN_URL"));
        $result = @json_decode($result);
        if($result->code == 200){
            $systemOpens = MetaData::where('field_name', 'SystemOpens')->first();
            if($systemOpens==null){
                $metas['SystemOpens'] = $result->data->number;
                $systemOpens = new MetaData;
                $systemOpens->field_name = 'SystemOpens';
                $systemOpens->field_persian_name = 'تعداد باز در سیستم';
                $systemOpens->field_type = 'int';
            }
            $systemOpens->field_value = $result->data->number;
            $systemOpens->save();
        }
        // dd($metas);
        return view('dashboard.admin', [
            "metas"=> $metas
        ]);
    }
}
