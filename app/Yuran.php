<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yuran extends Model
{
    protected $table 	= 'yuran';
    protected $id 		= 'id';
    protected $fillable = ['noPekerja', 'jumlah'];

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }
}
