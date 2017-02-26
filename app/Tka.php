<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tka extends Model
{
    protected $table 	= 'tka';
    protected $id 		= 'id';
    protected $fillable = ['jumlah', 'status'];
    
}
