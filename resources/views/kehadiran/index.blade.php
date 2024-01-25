{{-- 
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error ') }}', 'GAGAL!');
        @endif
    </script> --}}

@extends('layout')
@section('title', 'Kehadiran')

@section('content')

        <h2>Sekolah Dasar</h2>
        <form action="{{ route('kelas.create') }}" method="post">
            @csrf
        <input type="hidden" name="tingkat" value="Sekolah Dasar">
        <button type="submit" class="btn btn-sm btn-success col-md-4" style="width: 380px;">Tambah Kelas</button>
        </form>
        {{-- <a href="{{ route('kelas.create') }}"class="btn btn-sm btn-success col-md-4">Tambah</a> --}}
        <div class="mt-3">
            <div class="row">
                @foreach ($datasd as $item)
                    <div class="col-lg-4 col-4">
                        <div onclick="gotolist('{{ $item->kelas }}')">
                            <input type="hidden" name="kelas" id="kelas" value="{{ $item->kelas }}">
                            <div class="small-box bg-warning">
                                <div class="inner justify-content-center">
                                    <h5 class="text-center">{{ $item->kelas }}</h5>
                                    <div class="text-center row-md-6">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('kelas.destroy', $item->id) }}" method="post">
                                            <input type="hidden" name="kelas" value="{{ $item->kelas }}">
                                            <a href="{{ route('kelas.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary col-md-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger col-2"onclick=" onclick="gotolist(this)">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @empty
                <div class="alert alert-danger">
                    Data kehadiran belum Tersedia.
                </div> --}}
            </div>
            <!-- /.row -->
        </div>
        <h2>Sekolah Menengah Pertama</h2>
        {{-- <a href="{{ route('kehadiran.edit', '1A') }}"class="btn btn-sm btn-success col-md-4">Tambah</a> --}}
        <form action="{{ route('kelas.create') }}" method="post">
            @csrf
        <input type="hidden" name="tingkat" value="Sekolah Menengah Pertama">
        <button type="submit" class="btn btn-sm btn-success col-md-4" style="width: 380px;">Tambah Kelas</button>
        </form>
        <div class="mt-3">
            <div class="row">
                @foreach ($datasmp as $item)
                    <div class="col-lg-4 col-4">
                        <div onclick="gotolist('{{ $item->kelas }}')">
                            <input type="hidden" name="kelas" id="kelas" value="{{ $item->kelas }}">
                            <div class="small-box bg-warning">
                                <div class="inner justify-content-center">
                                    <h5 class="text-center">{{ $item->kelas }}</h5>
                                    <div class="text-center row-md-6">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelas.destroy', $item->id) }}" method="post">
                                            <input type="hidden" name="kelas" value="{{ $item->kelas }}">
                                            <a href="{{ route('kelas.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary col-md-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger col-2" onclick="gotolist(this)">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @empty
                <div class="alert alert-danger">
                    Data kehadiran belum Tersedia.
                </div> --}}
            </div>
            <!-- /.row -->
        </div>
@stop

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function gotolist(form) {
            if (event.target.tagName.toLowerCase() !== 'button') {
                window.location.href="{{ route('listsiswa') }}?kelas="+form
            }
        }
        $(function() {
            $("#data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    text: "Tambah Formulir",
                    className: "btn btn-success",
                    action: function() {
                        window.location.href = "{{ route('kehadiran.create') }}";
                    }
                }]
            }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
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
