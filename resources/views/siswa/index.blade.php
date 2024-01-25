{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa Berkebutuhan Khusus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">Tambah siswa</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Murid</th>
                                    <th scope="col">Tanggal lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $siswa)
                                <tr>
                                    <td>{{ $siswa->nama_murid }}</td>
                                    <td>{{ $siswa->tanggal_lahir }}</td>
                                    <td>{!! $siswa->alamat !!}</td>
                                    <td>{{ $siswa->semester }}</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id_murid) }}" method="post">
                                            <a href="{{ route('siswa.edit', $siswa->id_murid) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data siswa belum Tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html> --}}


@extends('layout')
@section('title', 'Siswa')

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
                                    <th class="text-center" scope="col">Nama Murid</th>
                                    <th class="text-center" scope="col">Tanggal lahir</th>
                                    <th class="text-center" scope="col">Alamat</th>
                                    <th class="text-center" scope="col">Tingkat</th>
                                    <th class="text-center" scope="col">Kelas</th>
                                    <th class="text-center" scope="col">Jenis Kelamin</th>
                                    <th class="text-center" scope="col">Kebutuhan Khusus</th>
                                    <th class="text-center" scope="col">Riwayat Medis Murid</th>
                                    @if (auth()->user()->role == 'admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $siswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $siswa->nis }}</td>
                                        <td class="text-center">{{ $siswa->nama_murid }}</td>
                                        <td class="text-center">{{ $siswa->tanggal_lahir }}</td>
                                        <td class="text-center">{!! $siswa->alamat !!}</td>
                                        <td class="text-center">{{ $siswa->tingkat }}</td>
                                        <td class="text-center">{{ $siswa->kelas }}</td>
                                        <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                        <td class="text-center">{{ $siswa->data_khusus_murid }}</td>
                                        <td class="text-center">{{ $siswa->riwayat_medis_murid }}</td>
                                        @if (auth()->user()->role == 'admin')
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('siswa.destroy', $siswa->id_murid) }}" method="post">
                                                    <a href="{{ route('siswa.edit', $siswa->id_murid) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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
                    "sScrollX": "100%",
                    "sScrollXInner": "110%",
                    "buttons": [{
                        text: "Tambah Siswa",
                        className: "btn btn-success",
                        action: function() {
                            window.location.href = "{{ route('siswa.create') }}";
                        }
                    }]
                }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
            } else {
                $("#data").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "sScrollX": "100%",
                    "sScrollXInner": "110%",
                });

            }
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session()->has('success'))
                toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif (session()->has('error'))
                toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif

        });
    </script>
@stop
