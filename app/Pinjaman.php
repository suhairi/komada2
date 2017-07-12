<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table 	= 'pinjaman';
    protected $id 		= 'id';
    protected $fillable = ['noPekerja', 'jumlah', 'kadar', 'tempoh', 'insurans', 'bayaran_proses', 'ansuran', 'baki', 'status', 'perkhidmatan_id'];

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }

    public function perjawatan() {
    	return $this->belongsTo('App\Perjawatan', 'noPekerja', 'noPekerja');
    }

    public function yuran() {
        return $this->belongsTo('App\Yuran', 'noPekerja', 'noPekerja');
    }

    public function perkhidmatan() {
    	return $this->belongsTo('App\Perkhidmatan');
    }



}
