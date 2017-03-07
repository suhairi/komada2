<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkhidmatan extends Model
{
    protected $table 	= 'perkhidmatan';
    protected $id 		= 'id';
    protected $fillable = ['kod', 'nama'];
    public $timestamps 	= false;
}
