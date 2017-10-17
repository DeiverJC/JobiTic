<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_datas', function (Blueprint $table) {
            $table->increments('id');

            //BasicData
            $table->string('business_name', 100);                                   //Razon social
            $table->string('legal_repre');                                          //Representante legal
            $table->string('type_company', 50)->nullable();                         #Cambiar a enum despues.
            $table->enum('hierarchy', ['principal', 'sucursal']);                   //Jerarquia
            $table->string('economic_activity');                                    #Cambiar a enum despues.
            $table->integer('num_workers');                                         //Número de trabajadores
            $table->enum('nature', ['privada', 'pública', 'mixta'])->nullable();    //Naturaleza

            //Foreign Key
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('basic_datas');
    }
}