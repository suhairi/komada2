<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamanPwtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman_pwt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noPekerja', 10);
            $table->float('jumlah', 7, 2);
            $table->float('kadar', 3, 2);
            $table->tinyInteger('tempoh', false, false);
            $table->float('insurans', 7, 2);
            $table->float('bayaran_proses', 7, 2);
            $table->float('ansuran', 7, 2);
            $table->float('baki', 7, 2);
            $table->tinyInteger('status', false, false);
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
        Schema::dropIfExists('pinjaman_pwt');
    }
}
