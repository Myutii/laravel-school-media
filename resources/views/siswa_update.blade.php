@extends('adminlte::page')

@section('title', 'Ubah Data Siswa')

@section('content_header')
    <h1 class="m-0 text-dark">Ubah Data Siswa</h1>
@stop

@section('content')
    <form action="{{route('siswa.update', $siswa)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="nama_siswa" value="{{$siswa->nama_siswa ?? old('nama_siswa')}}">
                        @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputtanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputtanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="{{$siswa->tanggal_lahir ?? old('tanggal_lahir')}}">
                        @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat" name="alamat">{{$siswa->alamat ?? old('alamat')}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTlp">No. Telpon</label>
                        <input type="text" class="form-control @error('tlp') is-invalid @enderror" id="exampleInputTlp" placeholder="No. Telpon" name="tlp" value="{{$siswa->tlp ?? old('tlp')}}">
                        @error('tlp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Email" name="email" value="{{$siswa->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputKelas">Kelas</label>
                        <select id="exampleInputKelas" class="form-control" name="kelas_id">
                          @foreach($kelas as $s)
                           @if($siswa->kelas_id == $s->id)
                           <option value="{{ $s->id }}" selected>{{ $s->nama_kelas }}</option>
                           @else
                           <option value="{{ $s->id }}" >{{ $s->nama_kelas }}</option>
                           @endif
                          @endforeach
                        </select>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('siswa.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop