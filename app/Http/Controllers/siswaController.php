<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM siswa"));
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'nis' => 'required',
            'nama_murid' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'semester' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        DB::table('siswa')->insert([
            'id_murid' => Str::uuid(),
            'nis' => $request->nis,
            'nama_murid' => $request->nama_murid,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_murid
     * @return \Illuminate\Http\Response
     */
    public function edit($id_murid)
    {
        $data = DB::table('siswa')->where('id_murid', $id_murid)->first();
        return view('siswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_murid)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_murid' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'semester' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        DB::table('siswa')
            ->where('id_murid', $id_murid)
            ->update([
                'nis' => $request->nis,
                'nama_murid' => $request->nama_murid,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'semester' => $request->semester,
                'jenis_kelamin' => $request->jenis_kelamin
            ]);

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_murid)
    {
        DB::table('siswa')->where('id_murid', $id_murid)->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
