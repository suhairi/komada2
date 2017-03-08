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
use App\Pinjaman;
use App\Perkhidmatan;
use App\BayaranTunai;


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

 		$ahli = $this->checkAhli($request->noPekerja);

 		if(!$ahli)
 			return back();

 		// set tahun awal kepada tahun 2016
 		$startYear = 2016;

 		$years = Array();

 		for($i=$startYear; $i<=date('Y'); $i++) {
 			$years[$i] = $i;
 		}

 		// 1 - PWT
		// 2 - Buku Sekolah
		// 3 - Kecemasan
		// 4 - Tayar Bateri
		// 5 - Cukai Jalan
		// 6 - Insurans
		// 7 - Pertaruhan
		$pinjaman 	= Pinjaman::where('noPekerja', $request->noPekerja)
						->where('status', 1)
						->get();

		if($pinjaman == null){
			Session::flash('error', 'Gagal. Tiada maklumat pinjaman.');
			return back();
		}

 		return view('members.bayaran.tunaiPost', compact('ahli', 'years', 'pinjaman'));
 	}

 	public function prosesBayaran(Request $request) {

 		$pinjaman = Pinjaman::where('noPekerja', $request->noPekerja)
 					->where('id', $request->id)
 					->where('status', 1)
 					->first();

		if($pinjaman != null) {

			if($request->jumlah <= $pinjaman->baki) {
				$bayaran = new BayaranTunai;
		 		$bayaran->noPekerja 		= $request->noPekerja;
		 		$bayaran->month 			= $request->month;
		 		$bayaran->year 				= $request->year;
		 		$bayaran->jumlah 			= $request->jumlah;
		 		$bayaran->perkhidmatan_id 	= $pinjaman->perkhidmatan_id;

		 		if($bayaran->save()){
		 			$pinjaman->baki = $pinjaman->baki - $request->jumlah;
		 			$pinjaman->save();

		 			Session::flash('success', 'Berjaya. Bayaran telah diproses.');
		 			return back();
		 		}


			} else {
				Session::flash('error', 'Gagal. Jumlah bayaran melebihi baki.');
				return back();
			}			
		} else {
			Session::flash('error', 'Gagal. Tiada maklumat pinjaman.');
			return back();
		}

 		

 		return $request->all();
 	}


 	// HELPER FUNCTIONS
 	protected function checkAhli($noPekerja) {

 		$ahli = Ahli::where('noPekerja', $noPekerja)->first();

		if($ahli == null) {
 			Session::flash('error', 'Gagal. No Pekerja ini tiada dalam database.');
 			return false;
 		} else
 			return $ahli;
 	}

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
