@extends('adminlte::page')

@section('title', 'Data User')

@section('content_header')
    
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                      <h1 class="text-dark">Data User</h1>
                      <a href="{{route('settings.edit', Auth::user()->email)}}" class="btn btn-primary mb-3">
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
                            <tr>
                                <th>Nama</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    @if(Auth::user()->role==2)
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <td colspan="2" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>No. Telpon</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop