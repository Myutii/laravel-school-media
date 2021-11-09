@extends('adminlte::page')

@section('title', 'Ubah Data Sekolah')

@section('content_header')
    <h1 class="m-0 text-dark">Ubah Data Sekolah</h1>
@stop

@section('content')
    <form action="{{route('sekolah.update', $sekolah)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Sekolah</label>
                        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="nama_sekolah" value="{{$sekolah->nama_sekolah ?? old('nama_sekolah')}}">
                        @error('nama_sekolah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputtanggal_berdiri">Tanggal Berdiri</label>
                        <input type="date" class="form-control @error('tanggal_berdiri') is-invalid @enderror" id="exampleInputtanggal_berdiri" placeholder="Masukkan Tanggal Lahir" name="tanggal_berdiri" value="{{$sekolah->tanggal_berdiri ?? old('tanggal_berdiri')}}">
                        @error('tanggal_berdiri') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputvisi_misi" >Visi Misi</label>
                        <textarea style="min-height: 160px " type="text" class="form-control @error('visi_misi') is-invalid @enderror" id="exampleInputvisi_misi" placeholder="visi_misi" name="visi_misi">{{$sekolah->visi_misi ?? old('visi_misi')}}</textarea>
                        @error('visi_misi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat" name="alamat">{{$sekolah->alamat ?? old('alamat')}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTlp">No. Telpon</label>
                        <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="exampleInputTlp" placeholder="No. Telpon" name="tlp" value="{{$sekolah->tlp ?? old('tlp')}}">
                        @error('tlp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('sekolah.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop