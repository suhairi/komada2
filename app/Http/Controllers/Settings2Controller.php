<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\settings2\Profile;
use App\Ahli;
use App\Perjawatan;
use App\Yuran;

use Carbon\Carbon;

class Settings2Controller extends Controller
{
    public function profile() {

    	$ahli = Ahli::get();

    	foreach($ahli as $temp)
    		$temp->delete();

    	$profiles = Profile::all();

    	// dd($profiles);

    	foreach($profiles as $profile) {
    		
    		$ahli = new Ahli;
    		$ahli->noPekerja 	= $profile->no_gaji;
    		$ahli->noAhli 		= $profile->no_anggota;
    		$ahli->nama 		= $profile->nama;
    		$ahli->nokp 		= $profile->nokp;
    		if($profile->jantina_id == 1)
    			$ahli->jantina = 'LELAKI';
			else
				$ahli->jantina = 'WANITA';

			$ahli->alamat1 		= $profile->alamat1;
			$ahli->alamat2 		= $profile->alamat2;
			$ahli->tarikhAhli 	= $profile->tarikh_ahli;
			$ahli->status 		= $profile->status;
			$ahli->save();			
    	}

    	Session::flash('success', 'Berjaya. Migrate Profile Selesai.');

		return back();
    }

    public function perjawatan() {

        $perjawatan = Perjawatan::get();

        foreach($perjawatan as $temp)
            $temp->delete();

        $profiles = Profile::all();

        foreach($profiles as $profile) {

            $perjawatan = new Perjawatan;

            $perjawatan->noPekerja      = $profile->no_gaji;

            if($profile->tarikh_khidmat <= 0)
                $perjawatan->tarikhKhidmat = Carbon::today();
            else
                $perjawatan->tarikhKhidmat  = $profile->tarikh_khidmat;
            $perjawatan->jawatan        = $profile->jawatan;
            $perjawatan->tarafJawatan   = $profile->taraf_jawatan;
            $perjawatan->zonGaji_id     = (int)$profile->zon_gaji_id;
            $perjawatan->save();
        }

        Session::flash('success', 'Berjaya. Migrate Perjawatan Selesai!');
        return back();
    }

    public function yuran() {

        $perjawatan = Yuran::get();

        foreach($perjawatan as $temp)
            $temp->delete();

        $profiles = Profile::all();

        foreach($profiles as $profile) {

            $yuran = new Yuran;

            $yuran->noPekerja      = $profile->no_gaji;
            $yuran->jumlah         = $profile->jumlah_yuran_bulanan;
            $yuran->save();
        }

        Session::flash('success', 'Berjaya. Migrate Perjawatan Selesai!');
        return back();
    }


}
