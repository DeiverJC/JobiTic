<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_datas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('address', 100)->nullable();
            $table->Integer('phone_indic')->nullable();
            $table->Integer('phone_num');
            $table->Integer('phone_ext')->nullable();
            $table->Integer('phone2_indic')->nullable();
            $table->Integer('phone2_num')->nullable();
            $table->Integer('phone2_ext')->nullable();
            $table->bigInteger('celphone')->nullable();
            $table->string('website')->nullable();

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('location_datas');
    }
}
