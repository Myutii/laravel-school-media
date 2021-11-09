@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                      <h1 class="text-dark">Data Siswa</h1>
                      <a href="{{route('siswa.create')}}" class="btn btn-primary mb-3">
                        Tambah
                      </a>
                    </div>
                    

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No. Telpon</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $siswa)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$siswa->nama_siswa}}</td>
                                <td>{{$siswa->tanggal_lahir}}</td>
                                <td>{{$siswa->alamat}}</td>
                                <td>{{$siswa->tlp}}</td>
                                <td>{{$siswa->email}}</td>
                                <td>{{$siswa->kelas->nama_kelas}}</td>
                                <td>
                                    <a href="{{route('siswa.show', $siswa)}}" class="btn btn-success btn-xs">
                                        Detail
                                    </a>
                                    <a href="{{route('siswa.edit', $siswa)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('siswa.destroy', $siswa)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush