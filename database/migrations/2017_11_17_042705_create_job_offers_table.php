<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->enum('type_offer', ['Medio tiempo', 'Timepo completo', 'Proyecto']);
            $table->enum('remote', ['Si', 'No']);
            $table->integer('salary_from');
            $table->integer('salary_until');
            $table->string('cunrrency');
            $table->enum('type_salary', ['Anual', 'Mensual']);

            //ADD SKILLS RELATIONSHIP MANY_TO_MANY

            $table->text('description');
            $table->text('restrictions');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('job_offers');
    }
}
