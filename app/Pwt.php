<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pwt extends Model
{
    protected $table 	= 'pinjaman_pwt';
    protected $id 		= 'id';
    protected $fillable = ['noPekerja', 'jumlah', 'kadar', 'tempoh', 'insurans', 'bayaran_proses', 'ansuran', 'baki', 'status'];

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }

    public function perjawatan() {
    	return $this->belongsTo('App\Perjawatan', 'noPekerja', 'noPekerja');
    }

    public function yuran() {
    	return $this->belongsTo('App\yuran', 'noPekerja', 'noPekerja');
    }
}
