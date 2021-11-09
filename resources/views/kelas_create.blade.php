@extends('adminlte::page')

@section('title', 'SchoolMedia')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kelas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>
                      Tambah Data Kelas
                    </h1>
                    <div class="container">
                      
                        <form class="row g-3" action="/kelas/posts" method="post">
                            @csrf
                          <div class="col-md-12">
                            <label for="input" class="form-label">Nama</label>
                            <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="input" name="nama_kelas" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
