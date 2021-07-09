<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentariops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario',45);
            $table->string('descripcion', 2500);
            $table->unsignedBigInteger('program_id');
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentariops');
    }
}
