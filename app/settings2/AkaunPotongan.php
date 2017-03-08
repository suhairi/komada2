<?php

namespace App\settings2;

use Illuminate\Database\Eloquent\Model;

class AkaunPotongan extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'akaunpotongan';
    protected $id 			= 'id';
    protected $fillable 	= ['no_gaji', 'perkhidmatan_id', 'jumlah', 'tempoh', 'kadar', 'caj_prose', 'bayaran_perkhidmatan', 'insurans', 'jumlah_keseluruhan', 'baki', 'bulanan', 'status'];
}
