<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;
use App\Pinjaman;

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

    public function pinjamanProses(Request $request) {

        $pinjaman = new Pinjaman;
        $pinjaman->noPekerja         = $request->noPekerja;
        $pinjaman->jumlah            = $request->jumlah;
        $pinjaman->kadar             = $request->kadar;
        $pinjaman->tempoh            = $request->tempoh;
        $pinjaman->insurans          = $request->insurans;
        $pinjaman->bayaran_proses    = $request->bayaran_proses;
        $pinjaman->ansuran           = $request->ansuran;
        $pinjaman->baki              = $request->jumlah_pinjaman;
        $pinjaman->status            = 1;
        $pinjaman->perkhidmatan_id   = $request->perkhidmatan_id;

        if($pinjaman->save())
            Session::flash('success', 'Berjaya. ' . $pinjaman->perkhidmatan->nama . ' telah diproses.');
        else
            Session::flash('error', 'Gagal. ' . $pinjaman->perkhidmatan->nama . ' gagal diproses.');

    	return back();
    }
}
