<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateArchivosTable extends Migration
{
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formulario_id');
            $table->string('archivo');
            $table->string('nombre_original');
            $table->string('mime_type');
            $table->timestamps();

            $table->foreign('formulario_id')->references('id')->on('formularios')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}

?>