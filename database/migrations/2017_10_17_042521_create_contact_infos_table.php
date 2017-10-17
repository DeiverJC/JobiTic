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

            //Contact Information of HHRR
            $table->string('name', 25);                                         //Nombre
            $table->string('surnames', 50);                                     //Apellidos
            $table->enum('position', ['presidente', 'director', 'gerente',
                                      'jefe', 'coordinador', 'analista']);      //Cargo
            $table->string('email')->nullable();                                //Correo
            $table->integer('phone_indic_hr');                                  //Indicativo del telefono HR
            $table->integer('phone_num_hr');                                    //Número de Teléfono HR
            $table->integer('phone_ext_hr')->nullable();                        //Extensión del telefono HR
            $table->integer('phone2_indic_hr')->nullable();                     //Indicativo del telefono 2 HR
            $table->integer('phone2_num_hr')->nullable();                       //Número de Teléfono 2 HR
            $table->integer('phone2_ext_hr')->nullable();                       //Extensión del telefono 2 HR

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
        Schema::dropIfExists('contact_infos');
    }
}
