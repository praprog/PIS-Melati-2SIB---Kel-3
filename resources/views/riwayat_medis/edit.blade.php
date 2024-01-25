{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Riwayat Medis</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('riwayat_medis.update', $data->id_rm) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="keterangan">Keterangan:</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
    </div>
    <div class="form-group">
        <label for="NIS">NIS:</label>
        <input type="text" class="form-control" id="NIS" name="NIS" value="{{ $data->NIS }}">
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
    <title>Edit Data Riwayat Medis - Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('riwayat_medis.update', $data->id_rm) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $data->keterangan }}</textarea>
                                <!-- error message untuk keterangan -->
                                @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>
                                <input type="number" class="form-control @error('NIS') is-invalid @enderror" name="NIS" placeholder="Masukkan NIS" value="{{ $data->NIS }}">
                                <!-- error message untuk NIS -->
                                @error('NIS')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Tambahkan kolom sesuai kebutuhan -->
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
@section('title', 'Edit Riwayat Medis')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Riwayat Medis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('riwayat_medis.update', $data->id_rm) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $data->keterangan }}</textarea>
                            <!-- error message untuk keterangan -->
                            @error('keterangan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">NIS</label>
                            <input type="number" class="form-control @error('NIS') is-invalid @enderror" name="NIS" placeholder="Masukkan NIS" value="{{ $data->NIS }}">
                            <!-- error message untuk NIS -->
                            @error('NIS')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" onclick="location.href='{{ route('riwayat_medis.index') }}'" class="btn btn-md btn-warning">Back</button>

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
@stop