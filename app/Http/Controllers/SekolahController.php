<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('school',[
            "title" => "Data Sekolah",
            "data" => Sekolah::all()
        ]);
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
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        if (!$sekolah) return redirect()->route('sekolah.index')
            ->with('error_message', 'sekolah dengan id'.$id.' tidak ditemukan');
        return view('school_update', [
            'sekolah' => $sekolah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'tanggal_berdiri'=>'required',
            'visi_misi'=>'required',
            'tlp'=>'required|min:12',
            'alamat'=>'required',
        ]);

        $sekolah = Sekolah::find($id);
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->tanggal_berdiri = $request->tanggal_berdiri;
        $sekolah->visi_misi = $request->visi_misi;
        $sekolah->tlp = $request->tlp;
        $sekolah->alamat = $request->alamat;

        $sekolah->save();

        return redirect()->route('sekolah.index')->with('success_message', 'Berhasil mengubah data sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        //
    }
}
