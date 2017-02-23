<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjawatan extends Model
{
    protected $table	= 'perjawatan';
    protected $id		= 'id';
    protected $fillable = ['noPekerja', 'tarikhKhidmat', 'jawatan', 'tarafJawatan', 'zonGaji_id'];

    protected $dates 	= ['tarikhKhidmat'];

    public function ahli() {
    	return $this->belongsTo('App\Ahli', 'noPekerja', 'noPekerja');
    }
}
