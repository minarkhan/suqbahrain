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
            $table->double('point_per_doller' , 8, 2)->nullable();
            $table->double('customer_point' , 8, 2)->nullable();
            $table->double('marchant_point' , 8, 2)->nullable();
            $table->double('distributor_point' , 8, 2)->nullable();
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
