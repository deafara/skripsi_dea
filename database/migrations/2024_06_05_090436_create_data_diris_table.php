<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDirisTable extends Migration
{
    public function up()
    {
        Schema::create('data_diris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('no_telp');
            $table->string('address');
            $table->string('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_diris');
    }
}
