<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;
use App\Pwt;

class PinjamanController extends Controller
{
    public function pwt() {

    	return view('members.pinjaman.pwt');
    }

    public function pwtPost(Request $request) {

    	$ahli = Ahli::where('noPekerja', $request->noPekerja)-> first();

    	if($ahli == null) {
    		Session::flash('error', 'Gagal. No Pekerja ini tiada dalam database');
    		return back();
    	}

    	return view('members.pinjaman.pwtPost', compact('ahli'));
    }

    public function pwtProses(Request $request) {

        $pwt = new Pwt;
        $pwt->noPekerja         = $request->noPekerja;
        $pwt->jumlah            = $request->jumlah;
        $pwt->kadar             = $request->kadar;
        $pwt->tempoh            = $request->tempoh;
        $pwt->insurans          = $request->insurans;
        $pwt->bayaran_proses    = $request->bayaran_proses;
        $pwt->ansuran           = $request->ansuran;
        $pwt->baki              = $request->jumlah_pinjaman;
        $pwt->status            = 1;

        if($pwt->save())
            Session::flash('success', 'Berjaya. Pinjaman PWT telah diproses.');
        else
            Session::flash('error', 'Berjaya. Pinjaman PWT telah diproses.');

    	return back();
    }
}
