@extends('layout')
@section('title', 'Edit Data Kelas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kelas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kelas.update', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label>Tingkat</label>
                                <select class="form-control" name="deskripsi" required>
                                    <option value="">Pilih Tingka</option>
                                    <option value="Sekolah Dasar">Sekolah Dasar</option>
                                    <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                </select>
                            </div> --}}
                            <input type="hidden" name="tingkat" value="{{ $data->tingkat }}">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Kelas" value="{{ $data->kelas }}" required>
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

@stop
