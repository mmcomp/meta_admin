<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTraderWeeklyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_trader_weekly_data', function (Blueprint $table) {
            $table->id();
            $table->double('start_charge');
            $table->double('remain_charge');
            $table->integer('cost_and_benefit_rial');
            $table->double('dollar_to_rial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_trader_weekly_data');
    }
}
