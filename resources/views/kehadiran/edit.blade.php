{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Formulir - Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route(
                            'kehadiran.update',
                        
                            $data->id_kehadiran,
                        ) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">

                                <!-- error message untuk title -->
                                @error('photo')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>

                                <input type="int" class="form-control @error('nis') is-invalid @enderror"
                                    name="nis" placeholder="Nis

                                    kehadiran"
                                    value="{{ $data->NIS }}">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KEHADIRAN</label>

                                <input type="date"
                                    class="form-control @error('tanggal_kehadiran') is-invalid @enderror"
                                    name="tanggal_kehadiran"
                                    placeholder="Tanggal_Kehadiran

                                    kehadiran"
                                    value="{{ $data->tanggal_kehadiran }}">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>

                                <textarea class="form-control
@error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Konten

Formulir">{{ $data->deskripsi }}</textarea>

                                <!-- error message untuk description

-->

                                @error('deskripsi')
                                    <div class="alert alert-danger

mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md

btn-primary">SIMPAN</button>

                            <button type="reset" class="btn btn-md

btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
    js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
    .min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html> --}}



@extends('layout')
@section('title', 'Edit Data Kehadiran')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kehadiran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kehadiran.update', $data->id_kehadiran) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="kelas" value={{ $data->kelas }}>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>

                                <input type="int" class="form-control @error('nis') is-invalid @enderror" name="nis"
                                    placeholder="Nis" value="{{ $data->NIS }}">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KEHADIRAN</label>

                                <input type="date" class="form-control @error('tanggal_kehadiran') is-invalid @enderror"
                                    name="tanggal_kehadiran" placeholder="Tanggal_Kehadiran"
                                    value="{{ $data->tanggal_kehadiran }}">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{-- <label class="font-weight-bold">DESKRIPSI</label>

                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Konten Formulir">{{ $data->deskripsi }}</textarea>

                                <!-- error message untuk description-->

                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Kehadiran</label>
                                            <select class="form-control" name="deskripsi" required>
                                                <option value="">Pilih Kehadiran</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Alpha">Alpha</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" onclick="location.href='{{ route('kehadiran.index') }}'"
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace('deskripsi');
    </script>
@stop
