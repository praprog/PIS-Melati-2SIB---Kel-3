<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KehadiranController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
  {
    // $datakelas = [
    //   array(
    //     "title" => "SD",
    //     "data" => [
    //       "1A",
    //       "1B",
    //       "2A",
    //       "2B",
    //       "3A",
    //       "3B",
    //       "4A",
    //       "4B",
    //       "5A",
    //       "5B",
    //       "6A",
    //       "6B",
    //     ]
    //   ), array(
    //     "title" => "SMP",
    //     "data" => [
    //       "VII A",
    //       "VII B",
    //       "VIII A",
    //       "VIII B",
    //       "IX A",
    //       "IX B",
    //     ]
    //   )
    // ];
    $datasd = DB::select(DB::raw("select * from kelas where tingkat = 'Sekolah Dasar'"));
    $datasmp = DB::select(DB::raw("select * from kelas where tingkat = 'Sekolah Menengah pertama'"));
    return view('kehadiran.index', compact('datasd', 'datasmp'));
  }

  public function listsiswa(Request $request)
  {
    $kelas = $request->kelas;
    $data = DB::select(DB::raw("select * from kehadiran where kelas='$kelas'"));
    return view('kehadiran.listsiswa', compact('data', 'kelas'));
  }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create()
  {
    $kelas = $_GET['kelas'];
    return view('kehadiran.create', compact('kelas'));
  }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    $this->validate($request, [
      'nis' => 'required',
      'tanggal_kehadiran' => 'required',
      'deskripsi' => 'required'
    ]);

    //upload image


    DB::insert(
      "INSERT INTO `kehadiran`(`id_kehadiran`, `nis`, `tanggal_kehadiran`, `deskripsi`, `kelas`) VALUES (uuid(),?,?,?,?)",
      [$request->nis, $request->tanggal_kehadiran, $request->deskripsi, $request->kelas]
    );
    return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Disimpan!']);
  }

  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($id_kehadiran)
  {
    //
  }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function edit($id_kehadiran)
  {
    $data = DB::table('kehadiran')->where('id_kehadiran', $id_kehadiran)->first();
    return view('kehadiran.edit', compact('data'));
  }

  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $id_kehadiran)
  {
    $this->validate($request, [
      'nis' => 'required',
      'tanggal_kehadiran' => 'required',
      'deskripsi' => 'required'
    ]);

    //cek update foto atau tidak
    if ($request->file('photo')) {

      DB::update(
        "UPDATE kehadiran SET ,nis=?,tanggal_kehadiran=?,deskripsi=?,kelas=? WHERE id_kehadiran=?",
        [$image->hashName(), $request->nis, $request->tanggal_kehadiran, $request->deskripsi, $id_kehadiran, $request->kelas]
      );
    } else {
      DB::update(
        "UPDATE kehadiran SET nis=?,tanggal_kehadiran=?,deskripsi=? WHERE id_kehadiran=?",
        [$request->nis, $request->tanggal_kehadiran, $request->deskripsi, $id_kehadiran]
      );
    }
    return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Diupdate!']);
  }

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id_kehadiran)
  {
    DB::table('kehadiran')->where('id_kehadiran', $id_kehadiran)->delete();

    //redirect to index
    return redirect()->route('kehadiran.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }
}
