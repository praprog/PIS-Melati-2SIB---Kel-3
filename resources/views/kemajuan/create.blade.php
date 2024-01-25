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
                        <form action="{{ route('kemajuan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                    name="nis" placeholder="NIS">

                                <!-- error message untuk cost -->
                                @error('nis')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                           
                    <div class="form-group">
                        <label class="font-weight-bold">DESKRIPSI</label>

                        <textarea class="form-control
@error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Konten

kemajuan">{{ old('deskripsi') }}</textarea>

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
@section('title', 'Edit Data Kemajuan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kemajuan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kemajuan.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">

                                <!-- error message untuk title -->
                                @error('photo')
                                    <div class="alert alert-danger mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>

                                <input type="int" class="form-control @error('nis') is-invalid @enderror" name="nis"
                                    placeholder="Nis">

                                <!-- error message untuk cost -->
                                @error('cost')
                                    <div class="alert alert-danger mt-2">

                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Konten Formulir"></textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="location.href='{{ route('kemajuan.index') }}'" class="btn btn-md btn-warning">Back</button>

                        </div>
                    </form>
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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@stop
