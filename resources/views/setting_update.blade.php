@extends('adminlte::page')

@section('title', 'Ubah Data user')

@section('content_header')
    <h1 class="m-0 text-dark">Ubah Data user</h1>
@stop

@section('content')
    <form action="{{route('settings.update', $user)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="nama_user" value="{{$user->name ?? old('nama_user')}}">
                        @error('nama_user') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat" name="alamat">{{$user->password ?? old('alamat')}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Email" name="email" value="{{$user->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('settings.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop