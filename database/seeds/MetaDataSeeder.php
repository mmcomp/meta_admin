<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meta_data')->insert([
            'field_name' => "MetaTraderOpens",
            'field_persian_name' => "تعداد باز در متاتریدر",
            'field_type' => 'int',
            'field_value' => '0'
        ]);

        DB::table('meta_data')->insert([
            'field_name' => "SystemOpens",
            'field_persian_name' => "تعداد باز در سیستم",
            'field_type' => 'int',
            'field_value' => '0'
        ]);
    }
}
