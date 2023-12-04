<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "ok";
        $data=DB::select(DB::raw("select * from Users"));
        return view('Users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
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
            'nama' =>'required',
            'role'  =>'required',
            'username'  =>'required',
            'password' =>'required'
             ]);
            
            DB::insert("INSERT INTO `Users`(`id_user`, `nama`, `role`, `username`, `password`) VALUES (uuid(),?,?,?,?)",
            [$request->nama,$request->role, $request->username, $request->password]);
            return redirect()->route('Users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $data=DB::table('Users')->where('id_user', $id_user)->first();
        return view('Users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $this->validate($request, [
            'nama' =>'required',
            'role'  =>'required',
            'username'  =>'required',
            'password' =>'required'
             ]);

            {
             DB::update("UPDATE Users SET `nama`=?,`role`=?, `username`=?, `password`=? WHERE id_user=?",
             [$request->nama,$request->role, $request->username, $request->password,$id_user]);
            }
            return redirect()->route('Users.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        DB::table('Users')->where('id_user', $id_user)->delete();

        //redirect to index
        return redirect()->route('Users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}