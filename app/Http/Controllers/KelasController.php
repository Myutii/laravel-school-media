<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Gate;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::where('nama_kelas','NOT LIKE',"%-%")->get();

        return view('kelas', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas_create',[
            "title" => "Tambah Data Kelas",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas'=>'required|min:5',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success_message', 'Berhasil menambah kelas baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $ids
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswas = Siswa::all();

        return view('kelas_detail',[
            'data' => Kelas::find($id),
            'siswa' => Siswa::with(['kelas'])->get()->where('kelas_id',$id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) return redirect()->route('kelas.index')
            ->with('error_message', 'Kelas dengan id'.$id.' tidak ditemukan');
        return view('kelas_update', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        
        $kelas->save();
        return redirect()->route('kelas.index')
            ->with('success_message', 'Berhasil mengubah data kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        if ($kelas) $kelas->delete();
        return redirect()->route('kelas.index')
            ->with('success_message', 'Berhasil menghapus kelas');
    }
}
