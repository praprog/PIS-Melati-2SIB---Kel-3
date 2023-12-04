<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KemajuanController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
 {
 $data=DB::select(DB::raw("select * from kemajuan"));
 return view('kemajuan.index', compact('data'));
 }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function create()
 {
 return view('kemajuan.create');
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
 'deskripsi'=> 'required'
]);
 
//upload image
 
 
 DB::insert("INSERT INTO `kemajuan`(`id_kemajuan`, `nis`, `deskripsi`) VALUES (uuid(),?,?)",
 [$request->nis,$request->deskripsi]);
 return redirect()->route('kemajuan.index')->with(['success' => 'Data Berhasil Disimpan!']);
 }

 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function show($id_kemajuan)
 {
//
 }

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function edit($id_kemajuan)
 {
$data=DB::table('kemajuan')->where('id_kemajuan', $id_kemajuan)->first();
 return view('kemajuan.edit', compact('data'));
}

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, $id_kemajuan)
 {
 $this->validate($request, [
'nis' =>'required',
'deskripsi'=>'required'
]);

//cek update foto atau tidak
if($request->file('photo')){

DB::update("UPDATE kemajuan SET ,nis=?,deskripsi=? WHERE id_kemajuan=?",
[$image->hashName(),$request->nis,$request->deskripsi,$id_kemajuan]);
}else{
DB::update("UPDATE kemajuan SET nis=?,deskripsi=? WHERE id_kemajuan=?",
[$request->nis,$request->deskripsi,$id_kemajuan]);
 }
 return redirect()->route('kemajuan.index')->with(['success'=>'Data Berhasil Diupdate!']);
 }

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id_kemajuan)
 {
 DB::table('kemajuan')->where('id_kemajuan', $id_kemajuan)->delete();

//redirect to index
 return redirect()->route('kemajuan.index')->with(['success' => 'Data Berhasil Dihapus!']);
 }
}