<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjawatan extends Model
{
    protected $table	= 'perjawatan';
    protected $id		= 'id';
    protected $fillable = ['noPekerja', 'tarikhKhidmat', 'jawatan', 'tarafJawatan', 'zonGaji_id'];

    protected $dates 	= ['tarikhKhidmat'];

    public $timestamps  = false;

    public function setJawatanAttribute($value) {
        $this->attributes['jawatan'] = strtoupper($value);
    }

    public function setTarafjawatanAttribute($value) {
    	$this->attributes['tarafJawatan'] = strtoupper($value);
    }

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }

    public function yuran() {
        return $this->belongsTo('App\Yuran', 'noPekerja', 'noPekerja');
    }



    public function zongaji() {
        return $this->belongsTo('App\ZonGaji', 'zonGaji_id', 'id');
    }
    
}
