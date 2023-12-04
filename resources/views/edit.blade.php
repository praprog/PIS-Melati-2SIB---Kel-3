<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data siswa Berkebutuhan Khusus/title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('dosen_25.update',

$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                           

                                    
                            
                            <div class="form-group">
                                <label class="font-weight-bold">id_murid</label>

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Biaya

dosen_25" value="{{ $data->id_murid }}">

                                <!-- error message untuk nama -->
                                @error('id_murid')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">

                                    nama_murid</label>

                                <input type="text" class="form-control
@error('prodi') is-invalid @enderror" name="prodi" value="{{ $data->prodi }}">
                                <!-- error message untuk prodi

-->

                                @error('nama_murid')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">tanggal_lahir</label>

                                <textarea class="form-control
@error('deskripsi') is-invalid @enderror" name="tanggal_lahir" rows="5" placeholder="Masukkan Konten

dosen_25">{{ $data->deskripsi }}</textarea>
<div class="form-group">
                                <label class="font-weight-bold">

                                    alamat</label>

                                <input type="text" class="form-control
@error('prodi') is-invalid @enderror" name="alamat" value="{{ $data->prodi }}">
                                <!-- error message untuk prodi

-->

                                @error('alamat')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>    <div class="form-group">
                                <label class="font-weight-bold">

                                    data_khusus_murid</label>

                                <input type="text" class="form-control
@error('data_khusus_murid') is-invalid @enderror" name="data_khusus_murid" value="{{ $data->data_khusus_murid }}">
                                <!-- error message untuk prodi

-->

                                @error('nama_murid')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">

                                    riwayat_medis_murid</label>

                                <input type="text" class="form-control
@error('riwayat_medis_murid') is-invalid @enderror" name="riwayat_medis_murid" value="{{ $data->riwayat_medis_murid }}">
                                <!-- error message untuk prodi

-->

                                @error('riwayat_medis_murid')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                                <!-- error message untuk deskripsi

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

</html>