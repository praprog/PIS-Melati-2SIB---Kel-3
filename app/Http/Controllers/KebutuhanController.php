<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KebutuhanController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw("select * from kebutuhan"));
        return view('kebutuhan.index', compact('data'));
    }

    public function create()
    {
        return view('kebutuhan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Jenis_kebutuhan' => 'required',
            'keterangan' => 'required'
        ]);

        DB::insert("INSERT INTO `kebutuhan` (`id_kebutuhan`, `Jenis_kebutuhan`, `keterangan`) values (uuid(), ?, ?)",
            [$request->Jenis_kebutuhan, $request->keterangan]);

        return redirect()->route('kebutuhan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id_kebutuhan)
    {
        $data = DB::table('kebutuhan')->where('id_kebutuhan', $id_kebutuhan)->first();
        return view('kebutuhan.edit', compact('data'));
    }

    public function update(Request $request, $id_kebutuhan)
    {
        $this->validate($request, [
            'Jenis_kebutuhan' => 'required',
            'keterangan' => 'required',
        ]);

        DB::update("UPDATE `kebutuhan` SET `Jenis_kebutuhan`=?, `keterangan`=? where id_kebutuhan=?",
            [$request->Jenis_kebutuhan, $request->keterangan, $id_kebutuhan]);

        return redirect()->route('kebutuhan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id_kebutuhan)
    {
        DB::table('kebutuhan')->where('id_kebutuhan', $id_kebutuhan)->delete();

        return redirect()->route('kebutuhan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
