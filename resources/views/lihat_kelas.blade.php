@extends('adminlte::page')

@section('title', 'Data kelas')

@section('content_header')
    
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                      <h1 class="text-dark">Data Kelas</h1>
                    </div>
                    

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelas as $key => $kelas)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$kelas->nama_kelas}}</td>
                                <td>
                                    <a href="{{route('kelas_detail.show', $kelas)}}" class="btn btn-success btn-xs">
                                        Detail
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