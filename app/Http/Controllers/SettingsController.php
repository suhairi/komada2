<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Tka;
use App\Sumbangan;

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

    public function sumbangan() {

        // set tahun awal kepada tahun 2016
        $current = 2016;

        $years = Array();

        for($i=$current; $i<=date('Y'); $i++) {
            $years[$i] = $i;
        }

        $sumbangans = Sumbangan::get();

        dd($sumbangans);

        return view('members.settings.sumbangan', compact('years', 'sumbangans'));
    }

    public function sumbanganPost(Request $request) {

        $sumbangan = Sumbangan::where('month', $request->get('month'))
                        ->where('year', $request->get('year'))
                        ->get();

        foreach($sumbangan as $temp) {
            $temp->delete();
        }

        $sumbangan = new Sumbangan;
        $sumbangan->month   = $request->get('month');
        $sumbangan->year    = $request->get('year');
        $sumbangan->jumlah  = $request->get('jumlah');

        if($sumbangan->save())
            Session::flash('success', 'Berjaya. Maklumat Sumbangan telah dikemaskini.');
        else
            Session::flash('error', 'Gagal. Maklumat Sumbangan gagal dikemaskini.');

        return back();
    }

}
