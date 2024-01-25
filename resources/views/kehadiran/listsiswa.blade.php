<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Formulir - Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.c
ss">
</head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('kehadiran.create') }}" class="btn btn-md btn-success mb-3">TAMBAH FORMULIR</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NIS</th>
                                    <th scope="col">TANGGAL KEHADIRAN</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kehadiran)
<tr>
                                  
                                   <td>{{ $kehadiran->NIS }} </td>
                                    <td>{{ $kehadiran->tanggal_kehadiran }}</td>
                                    <td>{!! $kehadiran->deskripsi !!}</td>

                                    <td class="text-center">
                                        <form onsubmit="return
confirm('Apakah Anda Yakin ?');" action="{{ route('kehadiran.destroy', $kehadiran->id_kehadiran) }}" method="post">
                                            <a href="{{ route('kehadiran.edit', $kehadiran->id_kehadiran) }}" class="btn

btn-sm btn-primary">EDIT</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data kehadiran belum

                                    Tersedia.

                                </div>
@endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
    js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
    .min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
    "></script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error ') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html> -->
@extends('layout')
@section('title', 'Kehadiran')

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
                        <form action="{{ route('kehadiran.create') }}" id="formcreate" method="get">
                            <input type="hidden" name="kelas" value="{{ $kelas }}">
                            @if(count($data)<=0)
                                <button class="btn btn-success" type="submit">Tambah Formulir</button>
                            @endif
                        </form>
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background: #FAEF5D;">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">NIS</th>
                                    <th class="text-center" scope="col">Tanggal Kehadiran</th>
                                    <th class="text-center" scope="col">Kelas</th>
                                    <th class="text-center" scope="col">Deskripsi</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kehadiran)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $kehadiran->NIS }}</td>
                                        <td class="text-center">{{ $kehadiran->tanggal_kehadiran }}</td>
                                        <td class="text-center">{{ $kehadiran->kelas }}</td>
                                        <td class="text-center">{!! $kehadiran->deskripsi !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kehadiran.destroy', $kehadiran->id_kehadiran) }}"
                                                method="post">
                                                <input type="hidden" name="kelas" value="{{ $kehadiran->kelas }}">
                                                <a href="{{ route('kehadiran.edit', $kehadiran->id_kehadiran) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Kebutuhan belum Tersedia.</td>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            $("#data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [[2, 'asc']],
                "columnDefs": [{ goals: [1]  }],
                "buttons": [{
                    text: "Tambah Formulir",
                    className: "btn btn-success",
                    action: function() {
                        // window.location.href = "{{ route('kehadiran.create') }}";
                        $('#formcreate').submit();
                    }
                }]
            }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@stop
