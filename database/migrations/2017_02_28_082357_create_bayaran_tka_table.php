<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayaranTkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayaran_tka', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month', 2);
            $table->string('year', 4);
            $table->string('noPekerja', 10);
            $table->float('jumlah', 7, 2);
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
        Schema::dropIfExists('bayaran_tka');
    }
}
