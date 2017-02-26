<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Tka;

class SettingsController extends Controller
{
    public function tka() {

    	$tka = Tka::where('status', 1)->first();

    	return view('members.settings.tka', compact('tka'));
    }

    public function tkaPost(Request $request) {

    	$tka = Tka::where('status', 1)->update(['status' => 0]);

    	$tka = new Tka;
    	$tka->jumlah = $request->get('jumlah');
    	$tka->status = 1;


    	if($tka->save())
    		Session::flash('success', 'Berjaya. Nilai TKA telah dikemaskini.');
    	else
    		Session::flash('error', 'Gagal. Nilai TKA gagal dikemaskini.');

    	return back();
    }

}
