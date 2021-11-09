@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                      <h1 class="text-dark">Data Sekolah</h1>
                      <a href="{{route('sekolah.edit', 1)}}" class="btn btn-primary mb-3">
                        Ubah Data
                      </a>
                    </div>
                    

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <td colspan="2" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $sekolah)
                            <tr>
                                <th>Nama</th>
                                <td>{{$sekolah->nama_sekolah}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Berdiri</th>
                                <td>{{$sekolah->tanggal_berdiri}}</td>
                            </tr>
                            <tr> 
                                <th>Visi Misi</th>
                                <td>{{$sekolah->visi_misi}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$sekolah->alamat}}</td>
                            </tr>
                            <tr>
                                <th>No. Telpon</th>
                                <td>{{$sekolah->tlp}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop