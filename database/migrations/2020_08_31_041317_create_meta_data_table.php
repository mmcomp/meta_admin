<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_data', function (Blueprint $table) {
            $table->id();
            $table->string('field_name', 255);
            $table->string('field_persian_name', 255)->nullable();
            $table->enum('field_type', ['string', 'int', 'float'])->default('string');
            $table->string('field_value', 255)->nullable();
            $table->integer('users_id')->nullable();
            $table->boolean('is_systemic')->default(true);
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('meta_data');
    }
}
