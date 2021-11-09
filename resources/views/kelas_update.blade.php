@extends('adminlte::page')

@section('title', 'Edit kelas')

@section('content_header')
    <h1 class="m-0 text-dark">Edit kelas</h1>
@stop

@section('content')
    <form action="{{route('kelas.update', $kelas)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleInputName" placeholder="Nama" name="nama_kelas" value="{{$kelas->nama_kelas ?? old('nama_kelas')}}">
                        @error('nama_kelas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kelas.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop