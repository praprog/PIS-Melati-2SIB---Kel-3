<!-- resources/views/kebutuhan/edit.blade.php -->

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Kebutuhan</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('kebutuhan.update', $data->id_kebutuhan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Jenis_kebutuhan">Jenis Kebutuhan:</label>
                        <input type="text" class="form-control" id="Jenis_kebutuhan" name="Jenis_kebutuhan" value="{{ $data->Jenis_kebutuhan }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Kebutuhan - Judul Aplikasi Anda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('kebutuhan.update', $data->id_kebutuhan) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">JENIS KEBUTUHAN</label>
                                <input type="text"
                                    class="form-control @error('Jenis_kebutuhan') is-invalid @enderror"
                                    name="Jenis_kebutuhan" placeholder="Jenis Kebutuhan"
                                    value="{{ $data->Jenis_kebutuhan }}">
                                @error('Jenis_kebutuhan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">KETERANGAN</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5"
                                    placeholder="Keterangan">{{ $data->keterangan }}</textarea>
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
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
</body>

</html> --}}


@extends('layout')
@section('title', 'Edit Data Kebutuhan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kebutuhan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kebutuhan.update', $data->id_kebutuhan) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">JENIS KEBUTUHAN</label>
                                <input type="text" class="form-control @error('Jenis_kebutuhan') is-invalid @enderror"
                                    name="Jenis_kebutuhan" placeholder="Jenis Kebutuhan"
                                    value="{{ $data->Jenis_kebutuhan }}">
                                @error('Jenis_kebutuhan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">KETERANGAN</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5"
                                    placeholder="Keterangan">{{ $data->keterangan }}</textarea>
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="location.href='{{ route('kebutuhan.index') }}'"
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
        CKEDITOR.replace('deskripsi');
    </script>
@stop
