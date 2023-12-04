<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class HarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM harian"));
        return view('harian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nis'       => 'required',
            'tanggal'   => 'required|date',
            'deskripsi' => 'required',
        ]);

        DB::insert("INSERT INTO `harian`(`nis`, `tanggal`, `deskripsi`) VALUES (uuid(), ?, ?, ?)",
            [$request->nis, $request->tanggal, $request->deskripsi]);

        return redirect()->route('harian.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id_harian
     * @return \Illuminate\Http\Response
     */
    public function edit($id_harian)
    {
        $data = DB::table('harian')->where('id_harian', $id_harian)->first();
        return view('harian.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id_harian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_harian)
    {
        $this->validate($request, [
            'nis'       => 'required',
            'tanggal'   => 'required|date',
            'deskripsi' => 'required',
        ]);

        DB::update("UPDATE harian SET nis=?, tanggal=?, deskripsi=? WHERE id_harian=?",
            [$request->nis, $request->tanggal, $request->deskripsi, $id_harian]);

        return redirect()->route('harian.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id_harian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_harian)
    {
        DB::table('harian')->where('id_harian', $id_harian)->delete();

        return redirect()->route('harian.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
