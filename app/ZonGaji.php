<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonGaji extends Model
{
    protected $table 	= 'zongaji';
    protected $id 		= 'id';
    protected $fillable = ['kod', 'nama'];
    public $timestamps 	= false;
}
