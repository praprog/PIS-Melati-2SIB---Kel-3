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
 $data=DB::select(DB::raw("select * from kehadiran"));
 return view('kehadiran.index', compact('data'));
 }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
 {
 return view('kehadiran.create');
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
 'deskripsi'=> 'required'
]);
 
//upload image
 
 
 DB::insert("INSERT INTO `kehadiran`(`id_kehadiran`, `nis`, `tanggal_kehadiran`, `deskripsi`) VALUES (uuid(),?,?,?)",
 [$request->nis,$request->tanggal_kehadiran,$request->deskripsi]);
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
$data=DB::table('kehadiran')->where('id_kehadiran', $id_kehadiran)->first();
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
'nis' =>'required',
'tanggal_kehadiran' =>'required',
'deskripsi'=>'required'
]);

//cek update foto atau tidak
if($request->file('photo')){

DB::update("UPDATE kehadiran SET ,nis=?,tanggal_kehadiran=?,deskripsi=? WHERE id_kehadiran=?",
[$image->hashName(),$request->nis,$request->tanggal_kehadiran,$request->deskripsi,$id_kehadiran]);
}else{
DB::update("UPDATE kehadiran SET nis=?,tanggal_kehadiran=?,deskripsi=? WHERE id_kehadiran=?",
[$request->nis,$request->tanggal_kehadiran,$request->deskripsi,$id_kehadiran]);
 }
 return redirect()->route('kehadiran.index')->with(['success'=>'Data Berhasil Diupdate!']);
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