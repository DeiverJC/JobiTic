<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('city_id')->unsigned();
            $table->integer('location_data_id')->unsigned()->nullable();
            $table->integer('job_offer_id')->unsigned()->nullable();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');

            $table->foreign('location_data_id')
                ->references('id')
                ->on('location_datas')
                ->onDelete('cascade');

            $table->foreign('job_offer_id')
                ->references('id')
                ->on('job_offers')
                ->onDelete('cascade');

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
        Schema::dropIfExists('locations');
    }
}
