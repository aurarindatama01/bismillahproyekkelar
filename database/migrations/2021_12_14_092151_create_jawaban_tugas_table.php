<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_mapel')->unsigned();
            $table->bigInteger('id_exercise')->unsigned();
            $table->longText('isi');
            $table->string('file');
            $table->bigInteger('user_id_student')->unsigned();
            $table->timestamps();

            $table->foreign('id_mapel')->references('id')->on('mata_pelajaran');
            $table->foreign('id_exercise')->references('id')->on('exercise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_tugas');
    }
}
