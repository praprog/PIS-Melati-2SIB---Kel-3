<!DOCTYPE html>
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
                        <a href="{{ route('kehadiran.create') }}" class="btn btn-md btn-success mb-3">TAMBAH FORMULIR</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NIS</th>
                                    <th scope="col">TANGGAL KEHADIRAN</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kehadiran)
                                <tr>
                                  
                                   <td>{{ $kehadiran->NIS
 
}} </td>
                                    <td>{{ $kehadiran->tanggal_kehadiran
 
}}</td>
                                    <td>{!!

                                        $kehadiran->deskripsi !!}</td>

                                    <td class="text-center">
                                        <form onsubmit="return

confirm('Apakah Anda Yakin ?');" action="{{
route('kehadiran.destroy', $kehadiran->id_kehadiran) }}" method="post">
                                            <a href="{{

route('kehadiran.edit', $kehadiran->id_kehadiran) }}" class="btn

btn-sm btn-primary">EDIT</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data kehadiran belum

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

</html>