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

            //LocationData
            $table->string('country', 100);                                         #Despúes Crear DB paises para relacionar.
            $table->string('departament', 100)->nullable();                         #Despúes Crear DB paises para relacionar.
            $table->string('municipality', 100)->nullable();                        #Despúes Crear DB paises para relacionar.
            $table->string('address', 100)->nullable();                             //Dirección
            $table->Integer('phone_indic')->nullable();                                         //Indicativo del telefono
            $table->Integer('phone_num');                                           //Número de Teléfono
            $table->Integer('phone_ext')->nullable();                               //Extensión del telefono
            $table->Integer('phone2_indic')->nullable();                            //Indicativo del telefono 2
            $table->Integer('phone2_num')->nullable();                              //Número de Teléfono 2
            $table->Integer('phone2_ext')->nullable();                              //Extensión del telefono 2
            $table->bigInteger('celphone')->nullable();                                //Celular
            $table->string('website')->nullable();                                  //Página Web

            //Foreign Key
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
