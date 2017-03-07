<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerkhidmatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkhidmatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kod'); // PWT, bukusekolah, kecemasan, tayarbateri, roadtax, insurans, pertaruhan
            $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perkhidmatan');
    }
}
