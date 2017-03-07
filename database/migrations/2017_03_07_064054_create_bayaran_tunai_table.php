<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayaranTunaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayaran_tunai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noPekerja', 10);
            $table->string('month');
            $table->string('year');
            $table->float('jumlah', false, false);
            $table->string('perkhidmatan_id'); // PWT, tayarbateri, insurans, roadtax, kecemasan, pertaruhan
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
        Schema::dropIfExists('bayaran_tunai');
    }
}
