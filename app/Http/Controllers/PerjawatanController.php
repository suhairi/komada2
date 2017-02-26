<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Ahli;
use App\Perjawatan;
use App\ZonGaji;

class PerjawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($noPekerja)
    {
        $zones      = ZonGaji::pluck('nama', 'id');
        $ahli       = Ahli::where('noPekerja', $noPekerja)->first();
        $perjawatan = Perjawatan::where('noPekerja', $noPekerja)->first();

        // dd($perjawatan);

        if($perjawatan == null)
            return view('members.perjawatan.update', compact('ahli', 'zones'));
        else
            return view('members.perjawatan.update2', compact('ahli', 'perjawatan', 'zones'));
    }

    public function update(Request $request)
    {

        // dd($request->all());
        // 1. Check if maklumat perjawatan already exist
        //    Check by No Pekerja
        $perjawatan = Perjawatan::where('noPekerja', $request->get('noPekerja'))->first();

        if($perjawatan == null)
            $perjawatan = new Perjawatan;

        $perjawatan->noPekerja      = $request->get('noPekerja');
        $perjawatan->tarikhKhidmat  = $request->get('tarikhKhidmat');
        $perjawatan->jawatan        = $request->get('jawatan');
        $perjawatan->tarafJawatan   = $request->get('tarafJawatan');
        $perjawatan->zonGaji_id     = $request->get('zonGaji_id');

        if($perjawatan->save())
            Session::flash('success', 'Berjaya. Maklumat Perjawatan telah dikemaskini.');
        else
            Session::flash('error', 'Gagal. Maklumat Perjawatan gagal dikemaskini.');

        return redirect()->route('profileAhli', ['id' => $perjawatan->ahli->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
