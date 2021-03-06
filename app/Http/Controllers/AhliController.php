<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;

class AhliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Ahli::latest()->take(15)->get();

        return view('members.keahlian.index', compact('members'));
    }

    public function store(Request $request)
    {

        // return $request->all();

        // Check if the ahli already exist
        $ahli = Ahli::where('noPekerja', $request->get('noPekerja'))->first();

        if($ahli != null) {
            Session::flash('error', 'Ralat. No Pekerja ini telah wujud.');
            return redirect()->back();
        }

        // return $request->all();

        $ahli = new Ahli;
        $ahli->noPekerja    = $request->get('noPekerja');
        $ahli->noAhli       = $request->get('noAhli');
        $ahli->nama         = $request->get('nama');
        $ahli->nokp         = $request->get('nokp');
        $ahli->jantina      = $request->get('jantina');       
        $ahli->email        = $request->get('email');
        $ahli->alamat1      = $request->get('alamat1');
        $ahli->alamat2      = $request->get('alamat2');
        $ahli->tarikhAhli   = $request->get('tarikhAhli');
        $ahli->status       = 1;

        if($ahli->save()) 
            Session::flash('success', 'Berjaya. Ahli ini telah didaftarkan.');
        else
            Session::flash('error', 'Gagal. Ahli ini gagal didaftarkan.');

        return redirect()->route('daftarAhli');

    }

    public function edit($noPekerja)
    {
        $ahli = Ahli::where('noPekerja', $noPekerja)->first();

        if($ahli != null)
            return view('members.keahlian.update', compact('ahli'));
        else {
            Session::flash('error', 'Ralat.');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $ahli = Ahli::where('id', $id)->first();

        $ahli->noPekerja    = $request->get('noPekerja');
        $ahli->noAhli       = $request->get('noAhli');
        $ahli->nama         = $request->get('nama');
        $ahli->nokp         = $request->get('nokp');
        $ahli->jantina      = $request->get('jantina');
        $ahli->bangsa       = $request->get('bangsa'); 
        $ahli->email        = $request->get('email');
        $ahli->alamat1      = $request->get('alamat1');
        $ahli->alamat2      = $request->get('alamat2');
        $ahli->tarikhAhli   = $request->get('tarikhAhli');
        $ahli->status       = $request->get('status');


        if($ahli->save())
            Session::flash('success', 'Berjaya');
        else
            Session::flash('error', 'Gagal.');

        return back();
    }

}
