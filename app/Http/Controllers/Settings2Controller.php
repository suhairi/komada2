<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\settings2\Profile;
use App\Ahli;

class Settings2Controller extends Controller
{
    public function profile() {

    	$profiles = Profile::where('id', '<', 10)->get();

    	foreach($profiles as $profile) {
    		$ahli = new Ahli;
    	}





    }
}
