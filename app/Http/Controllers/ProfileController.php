<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ahli;
use App\Perjawatan;
use App\Pinjaman;

class ProfileController extends Controller
{
    public function profile($id) {

    	$ahli = Ahli::where('id', $id)->first();
    	$loans = Pinjaman::where('noPekerja', $ahli->noPekerja)->get();
    	// dd($loans);

    	return view('members.keahlian.profile', compact('ahli', 'loans'));
    }
}
