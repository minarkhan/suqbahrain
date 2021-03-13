<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_infos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('ac_holder')->nullable();
            $table->string('ac_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban_number')->nullable();
            $table->text('address')->nullable();
            $table->integer('routing_no')->nullable();
            $table->enum('status', ['primary', 'secondary'])->nullable();
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
        Schema::dropIfExists('bank_infos');
    }
}
