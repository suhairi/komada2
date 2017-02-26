<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function tka() {

    	$tka = Tka::where('status', 1)->first();

    	return view('members.settings.tka', compact('tka'));
    }
}
