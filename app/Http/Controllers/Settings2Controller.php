<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\settings2\Profile;
use App\settings2\AkaunPotongan;
use App\settings2\Yuran as Yuran2;
use App\Ahli;
use App\Perjawatan;
use App\Yuran;
use App\Pinjaman;

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

    public function yuranTerkumpul() {

        return 'here';
    }

    public function loan() {

        $pinjaman = Pinjaman::get();

        foreach($pinjaman as $temp) {
            $temp->delete();
        }

        $akaunpotongan = AkaunPotongan::all();

        foreach($akaunpotongan as $temp) {

            $pinjaman                   = new Pinjaman;
            $pinjaman->noPekerja        = $temp->no_gaji;
            $pinjaman->jumlah           = $temp->jumlah;
            $pinjaman->kadar            = $temp->kadar;
            $pinjaman->tempoh           = $temp->tempoh;
            $pinjaman->insurans         = $temp->insurans;
            $pinjaman->bayaran_proses   = $temp->caj_proses;
            $pinjaman->ansuran          = $temp->bulanan;
            $pinjaman->baki             = $temp->baki;
            $pinjaman->status           = $temp->status;
            $pinjaman->perkhidmatan_id  = $temp->perkhidmatan_id;
            $pinjaman->save();
        }

        Session::flash('success', 'Berjaya. Data Pinjaman telah dimigrate.');
        return back();
    }

    public function kemaskiniBaki($pinjaman_id) {

        $pinjaman = Pinjaman::where('id', $pinjaman_id)->first();

        if($pinjaman == null) {
            Session::flash('error', 'Gagal. Tiada dalam database.');
            return back();
        }

        return view('members.settings.kemaskiniBaki', compact('pinjaman'));       
    }

    public function kemaskiniBakiPost(Request $request, $pinjaman_id) {

        if($request->ansuran == 'Infinity') {
            Session::flash('error', 'Ralat. Baki Pinjaman mesti kurang dari Jumlah Pinjaman.');
            return back();
        }

        $pinjaman = Pinjaman::where('id', $request->pinjaman_id)
                    ->where('status', 1)
                    ->first();

        if($pinjaman == null) {
            Session::flash('error', 'Gagal. Maklumat Pinjaman tiada dalam database..');
            return back();
        }

        $pinjaman->jumlah           = $request->jumlah;
        $pinjaman->baki             = $request->baki;
        $pinjaman->tempoh           = $request->tempoh;
        $pinjaman->insurans         = $request->insurans;
        $pinjaman->bayaran_proses   = $request->bayaran_proses;
        $pinjaman->ansuran          = $request->ansuran;

        if($pinjaman->save())
            Session::flash('success', 'Berjaya. Maklumat Pinjaman telah dikemaskini.');
        else
            Session::flash('error', 'Gagal. Maklumat Pinjaman gagal dikemaskini.');

        return back();
    }

}
