<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayaranTunai extends Model
{
    protected $table 	= 'bayaran_tunai';
    protected $id 		= 'id';
    protected $fillable = ['noPekerja', 'month', 'year', 'jumlah', 'perkhidmatan_id'];

    public function perkhidmatan() {
    	return $this->belongsTo('App\Perkhidmatan');
    }
}
