<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 200);
            $table->text('descripcion');
            $table->string('icono', 200);
            $table->string('portada', 200);
            $table->string('video_url', 200);
            $table->string('etiquetas', 200);
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
