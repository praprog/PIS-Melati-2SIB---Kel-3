{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data siswa Berkebutuhan Khusus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $data->id_murid) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')



                            <div class="form-group">
                                <label class="font-weight-bold">nis</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $data->nis }}">
                                @error('nis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label class="font-weight-bold">nama_murid</label>
                                <input type="text" class="form-control @error('nama_murid') is-invalid @enderror"
                                    name="nama_murid" value="{{ $data->nama_murid }}">
                                @error('nama_murid')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">tanggal_lahir</label>
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Selanjutnya, tambahkan form-group dan input untuk alamat, data_khusus_murid, riwayat_medis_murid -->

                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ $data->alamat }}">
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ $data->semester }}">
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">jenis_kelamin</label>
                                <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Akhir form-group dan input -->

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html> --}}



@extends('layout')
@section('title', 'Edit Data Siswa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('siswa.update', $data->id_murid) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis"
                                    value="{{ $data->nis }}">
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Murid</label>
                                <input type="text" class="form-control @error('nama_murid') is-invalid @enderror"
                                    name="nama_murid" value="{{ $data->nama_murid }}">
                                @error('nama_murid')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ $data->alamat }}">
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" name="kelas" required value={{ $data->id_kelas }}>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->id_kelas == $item->id ? 'selected' : '' }}>{{ $item->tingkat }} -
                                            {{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"{{ $data->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan"{{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kebutuhan Khusus</label>
                                <select class="form-control" name="data_khusus_murid" required>
                                    <option value="">Pilih Kebutuhan Khusus</option>
                                    @foreach ($kebutuhan as $item)
                                        <option value="{{ $item->Jenis_kebutuhan }}">{{ $item->Jenis_kebutuhan }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control @error('data_khusus_murid') is-invalid @enderror"
                                    name="data_khusus_murid" placeholder="Data Khusus Murid"
                                    value="{{ $data->data_khusus_murid }}">
                                @error('data_khusus_murid')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Riwayat Medis Murid</label>
                                <input type="text"
                                    class="form-control @error('riwayat_medis_murid') is-invalid @enderror"
                                    name="riwayat_medis_murid" placeholder="Riwayat Medis Murid"
                                    value="{{ $data->riwayat_medis_murid }}">
                                @error('riwayat_medis_murid')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="location.href='{{ route('siswa.index') }}'"
                                class="btn btn-md btn-warning">Back</button>

                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@stop
