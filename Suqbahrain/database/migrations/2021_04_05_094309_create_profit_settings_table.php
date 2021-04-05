<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('suqbahrain_comission')->nullable();
            $table->integer('bdo_comission')->nullable();
            $table->integer('distributor_comission')->nullable();
            $table->integer('marchant_comission')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('profit_settings');
    }
}
