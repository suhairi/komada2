<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ahli;
use App\Yuran;
use App\BayaranYuran;

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
			$this->tka($temp->noPekerja);


			// 3 - Bayaran Sumbangan

		}

 		return $request->all();
 	}





 	// HELPER FUNCTIONS
 	protected function tka($noPekerja) {
 		
 	}







}
