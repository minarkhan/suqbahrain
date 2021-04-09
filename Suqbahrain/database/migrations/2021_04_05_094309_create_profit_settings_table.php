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
            $table->double('suqbahrain_comission', 8, 2 )->nullable();
            $table->double('bdo_comission', 8, 2)->nullable();
            $table->double('distributor_comission', 8, 2)->nullable();
            $table->double('marchant_comission', 8, 2)->nullable();
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
