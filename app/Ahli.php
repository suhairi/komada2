<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahli extends Model
{
    protected $table 	= 'ahli';
    protected $id 		= 'id';
    protected $fillable	= ['noPekerja', 'noAhli', 'nama', 'nokp', 'jantina', 'agama', 'bangsa', 'agama', 'email', 'alamat1', 'alamat2', 'tarikhAhli', 'status'];
    protected $date 	= ['tarikhAhli', 'created_at', 'updated_at'];

    // SETTINGS
    public function setNamaAttribute($value) {
    	$this->attributes['nama'] = strtoupper($value);
    }

    public function setAlamat1Attribute($value) {
    	$this->attributes['alamat1'] = strtoupper($value);
    }

    public function setAlamat2Attribute($value) {
    	$this->attributes['alamat2'] = strtoupper($value);
    }


    // RELATIONSHIPS
    public function perjawatan() {
        return $this->hasOne('App\Perjawatan', 'noPekerja', 'noPekerja');
    }

    public function yuran() {
        return $this->hasOne('App\Yuran', 'noPekerja', 'noPekerja');
    }

    public function yuranTerkumpul() {
        return $this->hasOne('App\YuranTerkumpul', 'noPekerja', 'noPekerja');
    }

    public function Pinjaman() {
        return $this->hasMany('App\Pinjaman', 'noPekerja', 'noPekerja');
    }




}
