<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index()
    {
        $jadwal =\App\JadwalMatkul::all();
      
        return view('home',['jadwal'=>$jadwal]);
    }

       public function update(Request $request, $id)
    {
        //
         $user= \App\User::find($id);
        $user->update($request->all());
        return redirect('/absensi/jadwalmatkul')->with('sukses','Data berhasil diupdate');
    }
}
