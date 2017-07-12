<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YuranTerkumpul extends Model
{
    protected $table 	= 'yuran_terkumpul';
    protected $id 		= 'id';
    protected $fillable = ['noPekerja', 'jumlah'];

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }
}
