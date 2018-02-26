<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 25);
            $table->string('surnames', 50);
            $table->enum('position', ['presidente', 'director', 'gerente', 'jefe', 'coordinador', 'analista']);
            $table->string('email')->unique();
            $table->integer('phone_indic_hr')->nullable();
            $table->integer('phone_num_hr');
            $table->integer('phone_ext_hr')->nullable();
            $table->integer('phone2_indic_hr')->nullable();
            $table->integer('phone2_num_hr')->nullable();
            $table->integer('phone2_ext_hr')->nullable();


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
        Schema::dropIfExists('contact_infos');
    }
}
