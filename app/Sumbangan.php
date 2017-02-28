<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    protected $table 	= 'sumbangan';
    protected $id 		= 'id';
    protected $fillable = ['month', 'year', 'jumlah', 'catatan'];

}
