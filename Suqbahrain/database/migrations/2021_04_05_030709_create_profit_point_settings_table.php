<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitPointSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_point_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('point_per_doller')->nullable();
            $table->integer('marchant_point')->nullable();
            $table->integer('distributor_point')->nullable();
            $table->integer('customer_point')->nullable();
            $table->date('point_start')->nullable();
            $table->date('point_end')->nullable();
            $table->integer('marchant_profit')->nullable();
            $table->integer('distributor_profit')->nullable();
            $table->integer('customer_profit')->nullable();
            $table->integer('bdo_profit')->nullable();
            $table->date('profit_start')->nullable();
            $table->date('profit_end')->nullable();
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
        Schema::dropIfExists('profit_point_settings');
    }
}
