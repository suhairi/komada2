<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;
use App\Yuran;

class YuranController extends Controller
{
    public function update($id) {

    	$ahli = Ahli::where('noPekerja', $id)->first();

    	if($ahli == null) {
    		Session::flash('error', 'Ralat. Tiada maklumat.');
    		return back();
    	}

    	$yuran = Yuran::where('noPekerja', $id)->first();

    	if($yuran == null)
    		return view('members.yuran.update', compact('ahli'));
    	else
    		return view('members.yuran.update2', compact('ahli', 'yuran'));

    }

    public function updatePost(Request $request, $id) {

    	$yuran = Yuran::where('noPekerja', $id)->first();

    	if($yuran == null)
    		$yuran = new Yuran;

    	$yuran->noPekerja	= $request->get('noPekerja');
    	$yuran->jumlah 		= $request->get('jumlah');

    	if($yuran->save())
    		Session::flash('success', 'Berjaya. Maklumat Yuran telah dikemaskini.');
    	else
    		Session::flash('error', 'Gagal. Maklumat Yuran gagal dikemaskini.');


    	return redirect()->route('profileAhli', ['id' => $yuran->ahli->id]);

    	return $request->all();
    }
}
