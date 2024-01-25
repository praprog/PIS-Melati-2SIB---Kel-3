{{-- <!DOCTYPE html>
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Daftar Kebutuhan</h2>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table">
    <thead>
        <tr>

            <th>Jenis Kebutuhan</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>

            <td>{{ $item->Jenis_kebutuhan }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>
                <a href="{{ route('kebutuhan.edit', $item->id_kebutuhan) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('kebutuhan.destroy', $item->id_kebutuhan) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('kebutuhan.create') }}" class="btn btn-success">Tambah Kebutuhan Baru</a>
</div>
</div>
</div>
@endsection --}}

{{-- <body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('kebutuhan.create') }}" class="btn btn-md btn-success mb-3">Tambah Kebutuhan
                            Baru</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Kebutuhan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kebutuhan)
                                    <tr>
                                        <td>{{ $kebutuhan->Jenis_kebutuhan }}</td>
                                        <td>{{ $kebutuhan->keterangan }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kebutuhan.destroy', $kebutuhan->id_kebutuhan) }}"
                                                method="post">
                                                <a href="{{ route('kebutuhan.edit', $kebutuhan->id_kebutuhan) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kebutuhan belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html> --}}
@extends('layout')
@section('title', 'Kebutuhan')

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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Jenis Kebutuhan</th>
                                    <th class="text-center">Keterangan</th>
                                    @if(auth()->user()->role=='admin')
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kebutuhan)
                                    <tr>
                                        <td class="text-centere">{{ $loop->iteration }}</td>
                                        <td class="text-centere">{{ $kebutuhan->Jenis_kebutuhan }}</td>
                                        <td class="text-centere">{{ $kebutuhan->keterangan }}</td>
                                        @if(auth()->user()->role=='admin')
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kebutuhan.destroy', $kebutuhan->id_kebutuhan) }}"
                                                method="post">
                                                <a href="{{ route('kebutuhan.edit', $kebutuhan->id_kebutuhan) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            if ('{{ auth()->user()->role}}' == 'admin') {
            $("#data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    text: "Tambah Kebutuhan Baru",
                    className: "btn btn-success",
                    action: function() {
                        window.location.href = "{{ route('kebutuhan.create') }}";
                    }
                }]
            }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
        }else{
            $("#data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        }
        });
    </script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@stop
