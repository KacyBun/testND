<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailEmployeAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailempadd',function(Blueprint $table)
        {
            $table->increments('id_detailempadd');
            $table->integer('id_employee')->unsigned();
            $table->integer('id_address')->unsigned();
            $table->foreign('id_employee')->references('id_employee')->on('employee');
            $table->foreign('id_address')->references('id_address')->on('address');
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
        Schema::drop('detailempadd');
    }
}
