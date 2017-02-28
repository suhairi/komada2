<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayaranYuran extends Model
{
    protected $table 	= 'bayaran_yuran';
    protected $id 		= 'id';
    protected $fillable = ['month', 'year', 'noPekerja', 'jumlah'];

    public function ahli() {
    	return $this->belongsTo('app\Ahli', 'noPekerja', 'noPekerja');
    }
}
