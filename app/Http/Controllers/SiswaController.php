<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();

        return view('siswa', [
            'data' => $siswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa_create',[
            "title" => "Tambah Data Siswa",
            "kelas" => Kelas::where('nama_kelas','NOT LIKE',"%-%")->get()
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
            'nama_siswa'=>'required|min:5',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
            'tlp'=>'required|min:12',
            'kelas_id'=>'required',
            'email' => 'required',
        ]);

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success_message', 'Berhasil menambah siswa baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('siswa_detail',[
            "title" => "Detail Siswa",
            "data" => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) return redirect()->route('siswa.index')
            ->with('error_message', 'siswa dengan id'.$id.' tidak ditemukan');
        return view('siswa_update', [
            'siswa' => $siswa,
            'kelas' => Kelas::where('nama_kelas','NOT LIKE',"%-%")->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
            'tlp'=>'required|min:12',
            'kelas_id'=>'required',
            'email' => 'required',
        ]);

        $siswa = Siswa::find($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->tlp = $request->tlp;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->email = $request->email;

        $siswa->save();

        return redirect()->route('siswa.index')->with('success_message', 'Berhasil mengubah data siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) $siswa->delete();
        return redirect()->route('siswa.index')
            ->with('success_message', 'Berhasil menghapus siswa');
    }
}
