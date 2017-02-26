<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noPekerja');
            $table->string('noAhli');
            $table->string('nama');
            $table->string('nokp');
            $table->string('jantina')->nullable();
            $table->string('bangsa')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('tarikhAhli')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('ahli');
    }
}
