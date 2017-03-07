<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;
use App\Yuran;
use App\BayaranYuran;
use App\Tka;
use App\BayaranTka;
use App\Sumbangan;
use App\BayaranSumbangan;
use App\Pwt;


class BayaranController extends Controller
{
 	public function yuran() {

 		// set tahun awal kepada tahun 2016
 		$current = 2016;

 		$years = Array();

 		for($i=$current; $i<=date('Y'); $i++) {
 			$years[$i] = $i;
 		}

 		return view('members.bayaran.yuran', compact('years'));
 	}

 	public function yuranPost(Request $request) {

		$yuran = Yuran::all();

		foreach($yuran as $temp) {

			$bayaran_yuran = BayaranYuran::where('noPekerja', $temp->noPekerja)
								->where('month', $request->get('month'))
								->where('year', $request->get('year'))
								->get();

			if($bayaran_yuran != null) {
				foreach($bayaran_yuran as $temp2)
					$temp2->delete();
			}

			// 1 - Bayaran Yuran
			$bayaran_yuran = new BayaranYuran;
			$bayaran_yuran->month 		= $request->get('month');
			$bayaran_yuran->year 		= $request->get('year');
			$bayaran_yuran->noPekerja	= $temp->noPekerja;
			$bayaran_yuran->jumlah 		= $temp->jumlah;
			$bayaran_yuran->save();

			// 2 - Bayaran TKA
			$this->tka($temp->noPekerja, $request->get('month'), $request->get('year'));

			// 3 - Bayaran Sumbangan
			$this->sumbangan($temp->noPekerja, $request->get('month'), $request->get('year'));

		}

		Session::flash('success', 'Berjaya. Bayaran yuran bulanan, tka, sumbangan telah dikemaskini.');

 		return back();
 	}

 	public function tunai() {

 		return view('members.bayaran.tunai');
 	}

 	public function tunaiPost(Request $request) {

 		// set tahun awal kepada tahun 2016
 		$current = 2016;

 		$years = Array();

 		for($i=$current; $i<=date('Y'); $i++) {
 			$years[$i] = $i;
 		}

 		$pwt = Pwt::where('noPekerja', $request->noPekerja)
 				->where('status', 1)
 				->get();

		// dd($pwt);

 		return view('members.bayaran.tunaiPost', compact('years', 'pwt'));
 	}


 	// HELPER FUNCTIONS
 	protected function tka($noPekerja, $month, $year) {
 		$bayaran_tka = BayaranTka::where('noPekerja', $noPekerja)
 						->where('month', $month)
 						->where('year', $year)
 						->get();

		if($bayaran_tka != null) {
			foreach($bayaran_tka as $temp)
				$temp->delete();
		}

		$tka = Tka::where('status', 1)->first();

		if($tka != null) {
			$bayaran_tka = new BayaranTka;
			$bayaran_tka->month 	= $month;
			$bayaran_tka->year 		= $year;
			$bayaran_tka->noPekerja	= $noPekerja;
			$bayaran_tka->jumlah 	= $tka->jumlah;
			$bayaran_tka->save();
		}
 	}

 	protected function sumbangan($noPekerja, $month, $year) {
 		$bayaran_sumbangan = BayaranSumbangan::where('noPekerja', $noPekerja)
 		 						->where('month', $month)
 		 						->where('year', $year)
 		 						->get();

		if($bayaran_sumbangan != null) {
			foreach($bayaran_sumbangan as $temp)
				$temp->delete();
		}

		$sumbangan = Sumbangan::where('month', $month)
						->where('year', $year)
						->get();

		if($sumbangan != null) {

			foreach($sumbangan as $temp) {
				$bayaran_sumbangan = new BayaranSumbangan;
				$bayaran_sumbangan->month 		= $month;
				$bayaran_sumbangan->year 		= $year;
				$bayaran_sumbangan->noPekerja	= $noPekerja;
				$bayaran_sumbangan->jumlah 		= $temp->jumlah;
				$bayaran_sumbangan->catatan 	= $temp->catatan;
				$bayaran_sumbangan->save();
			}			
		}
 	}



}
