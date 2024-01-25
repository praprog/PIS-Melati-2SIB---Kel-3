<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $tingkat = $request->tingkat;
        return view('kelas.create', compact('tingkat'));
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
            'tingkat' => 'required',
            'nama' => 'required',
        ]);

        DB::insert(
            "INSERT INTO `kelas`(`id`, `tingkat`, `kelas`, `deskripsi`) VALUES (NULL,?,?,?)",
            [$request->tingkat, $request->nama, $request->nama]
        );
        return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DB::table('kelas')->where('id', $id)->first();
        return view('kelas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tingkat' => 'required',
            'nama' => 'required',
        ]);

        //cek update foto atau tidak
        DB::update(
            "UPDATE kelas SET kelas=?,deskripsi=? WHERE id=?",
            [$request->nama, $request->nama, $id]
        );
        return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('kelas')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
