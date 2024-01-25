<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Riwayat_medisController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw("select * from riwayat_medis"));
        return view('riwayat_medis.index', compact('data'));
    }

    public function create()
    {
        return view('riwayat_medis.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'NIS' => 'required',
        ]);

        DB::insert("INSERT INTO `riwayat_medis` (`id_rm`, `keterangan`, `NIS`) values (uuid(), ?, ?)",
            [$request->keterangan, $request->NIS]);
        return redirect()->route('riwayat_medis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = DB::table('riwayat_medis')->where('id_rm', $id)->first();
        return view('riwayat_medis.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'NIS' => 'required|integer',
        ]);

        DB::update("UPDATE `riwayat_medis` SET `keterangan`=?, `NIS`=? where id_rm=?",
            [$request->keterangan, $request->NIS, $id]);

        return redirect()->route('riwayat_medis.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        DB::table('riwayat_medis')->where('id_rm', $id)->delete();

        return redirect()->route('riwayat_medis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
