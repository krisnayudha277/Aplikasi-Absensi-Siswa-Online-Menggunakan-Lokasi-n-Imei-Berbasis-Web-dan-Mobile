<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Absensi;
class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $jadwal =\App\JadwalMatkul::all();
      
        return view('/absensi/jadwalmatkul',['jadwal'=>$jadwal]);
    }

        public function index2()
    {
        //
          $kehadiran =\App\Absensi::all();
      
        return view('/absensi/kehadiran',['kehadiran'=>$kehadiran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                  
            return view('/absensi/absensi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           $rules = [
            'nama' => 'required|min:3',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min:3' => ':attribute terlalu pendek'
        ];

        $validasi = Validator::make($request->all(), $rules, $message);

        if ($validasi->fails()) {

            return redirect()->route('absensi')->withErrors($validasi->errors())->withInput($request->all());

        } else {

            $insert = Absensi::create ([
                'id' => $request->id,
                'mata_kuliah' => $request->mata_kuliah,
                'nama' => $request->nama,
                'nim' => $request->nim,
                'absensi' => $request->absensi,
                'imei' => $request->imei
            ]);

            if ($insert) {
                return redirect()->route('jadwalmatkul')->with('success', 'Berhasil menambah kategori.');
            } else{
                return redirect()->route('absensi')->with('error', 'Gagal menambah data kategori.');

        }
        // \App\JenisObat::create($request->all());
        // return redirect('/jenis')->with('sukses','Data berhasil ditambah');
    }
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
         $detailobat = Obat::find($id);
        // dd($data->)
        return view("/admincrud/detail_data_obat", compact("detailobat"));
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
         $obat2=\App\Obat::find($id);
        return view('admincrud/edit',['obat2'=>$obat2]);
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
         \App\Obat::where("id", $id)->update($request->except("_token", "_method"));
        return redirect('/home')->with('sukses','Data berhasil diupdate');
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
    }

}
