<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawab_essays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detail_soal_esay');
            $table->integer('id_user');
            $table->longText('jawab');
            $table->decimal('score');
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
        Schema::dropIfExists('jawab_essays');
    }
}
