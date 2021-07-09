<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',45);
            $table->string('descripcion', 2500);
            $table->string('portada',45);
            $table->string('slug',105);
            $table->unsignedBigInteger('categoriep_id');
            $table->timestamps();

            $table->foreign('categoriep_id')->references('id')->on('categorieps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
