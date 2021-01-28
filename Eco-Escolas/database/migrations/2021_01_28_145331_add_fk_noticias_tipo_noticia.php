<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkNoticiasTipoNoticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noticias', function (Blueprint $table)
        {
            $table->bigInteger('tipo_noticia_id')->unsigned();
            $table->foreign('tipo_noticia_id')->references('id')->on('tipo_noticia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
