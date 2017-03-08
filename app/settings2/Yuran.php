<?php

namespace App\settings2;

use Illuminate\Database\Eloquent\Model;

class Yuran extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'yuran';
    protected $id 			= 'id';
    protected $fillable 	= ['no_gaji', 'jumlah'];
}
