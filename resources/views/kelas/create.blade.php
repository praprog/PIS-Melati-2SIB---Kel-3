@extends('layout')
@section('title', 'Tambah Data Kelas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kelas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kelas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label>Tingkat</label>
                                <select class="form-control" name="deskripsi" required>
                                    <option value="">Pilih Tingkat</option>
                                    <option value="Sekolah Dasar">Sekolah Dasar</option>
                                    <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                </select>
                            </div> --}}
                            <input type="hidden" name="tingkat" value="{{ $tingkat }}">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Kelas" required>
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

@stop
