<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjawatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjawatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noPekerja');
            $table->string('tarikhKhidmat')->nullable();
            $table->string('jawatan')->nullable();
            $table->string('tarafJawatan')->nullable();
            $table->string('zonGaji_id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perjawatan');
    }
}
