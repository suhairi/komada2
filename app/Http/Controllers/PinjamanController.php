<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;

class PinjamanController extends Controller
{
    public function pwt() {

    	return view('members.pinjaman.pwt');
    }

    public function pwtPost(Request $request) {

    	$ahli = Ahli::where('noPekerja', $request->noPekerja)-> first();

    	return view('members.pinjaman.pwtPost', compact('ahli'));
    }
}
