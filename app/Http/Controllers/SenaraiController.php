<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Zongaji;
use App\Ahli;
use App\Perjawatan;

class SenaraiController extends Controller
{
    public function zongaji() {

    	$zones = Zongaji::pluck('nama', 'id');

    	return view('members.senarai.zongaji', compact('zones'));
    }

    public function zongajiPost(Request $request) {

    	$perjawatan = Perjawatan::where('zongaji_id', $request->get('zongaji'))->get();

    	return view('members.senarai.zongajiresult', compact('perjawatan'));
    }

}
