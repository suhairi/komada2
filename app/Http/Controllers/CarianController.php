<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;

class CarianController extends Controller
{
    public function index() {

    	return view('members.carian');
    }

    public function indexPost(Request $request) {

    	$members = Ahli::where('noPekerja', 'like', '%' . $request->get('noPekerja') . '%')->get();

    	if($members == null) {
    		Session::flash('error', 'Tiada dalam database.');
    		return back();
    	}

    	return view('members.carianResult', compact('members'));


    }
}
