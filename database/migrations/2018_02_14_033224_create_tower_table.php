<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pengelola');
            $table->string('site');
            $table->string('jenis_menara');
            $table->text('lokasi_menara');
            $table->string('luas_lokasi');
            $table->string('status_lokasi');
            $table->double('lat');
            $table->double('lng');
            $table->integer('tinggi_menara');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('tower');
    }
}
