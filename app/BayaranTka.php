<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayaranTka extends Model
{
    protected $table 	= 'bayaran_tka';
    protected $id 		= 'id';
    protected $fillable = ['month', 'year', 'noPekerja', 'jumlah'];


    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }
}
