<!-- resources/views/riwayat_medis/index.blade.php

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Daftar Riwayat Medis</h2>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Riwayat</th>
                            <th>Keterangan</th>
                            <th>NIS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id_rm }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->NIS }}</td>
                                <td>
                                    <a href="{{ route('riwayat_medis.edit', $item->id_rm) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('riwayat_medis.destroy', $item->id_rm) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('riwayat_medis.create') }}" class="btn btn-success">Tambah Riwayat Medis Baru</a>
            </div>
        </div>
    </div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Riwayat Medis - Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('riwayat_medis.create') }}" class="btn btn-md btn-success mb-3">Tambah Riwayat Medis Baru</a>
                        @if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID Riwayat</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
<tr>
                                        <td>{{ $item->id_rm }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->NIS }}</td>
                                        <td>
                                            <a href="{{ route('riwayat_medis.edit', $item->id_rm) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('riwayat_medis.destroy', $item->id_rm) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                        @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data riwayat medis belum tersedia.</td>
                                    </tr>
@endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>
</html> -->

@extends('layout')
@section('title', 'Riwayat Medis')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data @yield('title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background: #FAEF5D;">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">ID Riwayat</th>
                                    <th class="text-center" scope="col">Keterangan</th>
                                    <th class="text-center" scope="col">NIS</th>
                                    @if(auth()->user()->role=='admin')
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->id_rm }}</td>
                                        <td class="text-center">{{ $item->keterangan }}</td>
                                        <td class="text-center">{{ $item->NIS }}</td>
                                        @if(auth()->user()->role=='admin')

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('riwayat_medis.destroy', $item->id_rm) }}" method="post">
                                                <a href="{{ route('riwayat_medis.edit', $item->id_rm) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kebutuhan belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('script')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            if ('{{ auth()->user()->role }}' == 'admin') {
                $("#data").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": [{
                        text: "Tambah Riwayat Medis Baru",
                        className: "btn btn-success",
                        action: function() {
                            window.location.href = "{{ route('riwayat_medis.create') }}";
                        }
                    }]
                }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
            } else {
                $("#data").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                });

            }
        });
    </script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('
                                success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('
                                error ') }}', 'GAGAL!');
        @endif
    </script>
@stop
