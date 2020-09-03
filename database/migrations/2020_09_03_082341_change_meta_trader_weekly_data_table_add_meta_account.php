<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMetaTraderWeeklyDataTableAddMetaAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_trader_weekly_data', function (Blueprint $table) {
            $table->string('meta_trader_account', 255)->nullable();
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
