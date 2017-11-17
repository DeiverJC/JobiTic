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

            $table->string('business_name', 100);
            $table->string('legal_repre');
            $table->enum('type_company', [
                'anonima', 'cooperativa', 'comandita', 'empresa asociativa',
                'empresa unipersonal', 'sociedad colectiva', 'persona natural',
                'otra', 'no definida'
            ])->nullable();
            $table->enum('hierarchy', ['principal', 'sucursal'])->nullable();
            $table->string('economic_activity');     // Change by ENUM after.
            $table->integer('num_workers');
            $table->enum('nature', ['privada', 'pública', 'mixta'])->nullable();

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
        Schema::dropIfExists('basic_datas');
    }
}
