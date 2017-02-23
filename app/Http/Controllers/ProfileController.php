<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ahli;
use App\Perjawatan;

class ProfileController extends Controller
{
    public function profile($id) {

    	$ahli = Ahli::where('id', $id)->first();

    	$perjawatan = Perjawatan::where('noPekerja', $ahli->noPekerja)->first();

    	return view('members.keahlian.profile', compact('ahli', 'perjawatan'));
    }
}
