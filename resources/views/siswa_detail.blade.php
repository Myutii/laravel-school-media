@extends('adminlte::page')

@section('title', 'Detail Siswa')

@section('content_header')
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                      <h1 class="text-dark">Detail Siswa</h1>
                      <a href="/siswa" class="btn btn-secondary mb-3">
                        Kembali
                      </a>
                    </div>
                    

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <td colspan="2" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{$data->nama_siswa}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{$data->tanggal_lahir}}</td>
                            </tr>
                            <tr> 
                                <th>Kelas</th>
                                <td>{{$data->kelas->nama_kelas}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$data->alamat}}</td>
                            </tr>
                            <tr>
                                <th>No. Telpon</th>
                                <td>{{$data->tlp}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$data->email}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop