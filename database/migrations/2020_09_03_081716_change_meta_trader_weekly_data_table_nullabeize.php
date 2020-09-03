<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMetaTraderWeeklyDataTableNullabeize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_trader_weekly_data', function (Blueprint $table) {
            $table->float('remain_charge')->nullable()->change();
            $table->integer('cost_and_benefit_rial')->nullable()->change();
            $table->float('dollar_to_rial')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_trader_weekly_data', function (Blueprint $table) {
            //
        });
    }
}
