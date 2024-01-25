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
                        <a href="{{ route('kemajuan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH FORMULIR</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NIS</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kemajuan)
<tr>
                                  
                                    <td>{{ $kemajuan->NIS }}</td>

                                    <td>{!! $kemajuan->deskripsi !!}</td>

                                    <td class="text-center">
                                        <form onsubmit="return

confirm('Apakah Anda Yakin ?');" action="{{ route('kemajuan.destroy', $kemajuan->id_kemajuan) }}" method="post">
                                            <a href="{{ route('kemajuan.edit', $kemajuan->id_kemajuan) }}" class="btn

btn-sm btn-primary">EDIT</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
            @empty
                                <div class="alert alert-danger">
                                    Data Kemajuan belum

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
@section('title', 'Kemajuan')

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
                                    <th class="text-center" scope="col">NIS</th>
                                    <th class="text-center" scope="col">Deskripsi</th>
                                    @if (auth()->user()->role == 'admin')
                                        <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->NIS }}</td>
                                        <td class="text-center">{!! $item->deskripsi !!}</td>
                                        @if (auth()->user()->role == 'admin')
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('kemajuan.destroy', $item->id_kemajuan) }}"
                                                    method="post">
                                                    <a href="{{ route('kemajuan.edit', $item->id_kemajuan) }}"
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            if ('{{ auth()->user()->role }}' == 'admin') {
                $("#data").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": [{
                        text: "Tambah Formulir",
                        className: "btn btn-success",
                        action: function() {
                            window.location.href = "{{ route('kemajuan.create') }}";
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
            toastr.success('{{ session('success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error ') }}', 'GAGAL!');
        @endif
    </script>
@stop
