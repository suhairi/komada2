<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayaranSumbangan extends Model
{
    protected $table 	= 'bayaran_sumbangan';
    protected $id 		= 'id';
    protected $fillable = ['month', 'year', 'noPekerja', 'jumlah', 'catatan'];

    public function setCatatanAttribute($value) {
    	return $this->attributes['catatan'] = $value;
    }

    public function ahli() {
    	$this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }
}
