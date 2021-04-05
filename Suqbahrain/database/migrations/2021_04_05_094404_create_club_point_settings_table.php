<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubPointSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_point_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('point_per_doller')->nullable();
            $table->integer('customer_point')->nullable();
            $table->integer('marchant_point')->nullable();
            $table->integer('distributor_point')->nullable();
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
        Schema::dropIfExists('club_point_settings');
    }
}
