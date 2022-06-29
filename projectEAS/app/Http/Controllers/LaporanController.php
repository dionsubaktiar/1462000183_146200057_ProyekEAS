<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\HpModel;
use App\Models\MerkModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan=LaporanModel::all();
        return view('laporan.laporan',['laporan'=>$laporan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $lapcoba = MerkModel::where('id',$id)->get();
        // dd($lapcoba[0]->merk->nama_merk);
        return view('laporan.tambah',['lapcoba'=>$lapcoba]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_hp=$request->get('nama_hp');
        $jumlah=$request->get('jumlah');
        $nama_merk=$request->get('nama_merk');
        $lokasi_rak=$request->get('lokasi_rak');
        $nama_pegawai= $request->get('nama_pegawai');
        $bulan = $request->get('bulan');
        $terjual = $request->get('terjual');
        $jumlah_masuk = $request->get('jumlah_masuk');
        $id_hp = \App\Models\HpModel:: where([['nama_hp', $nama_hp]])->get();
        $id_merk = \App\Models\MerkModel:: where([['nama_merk', $nama_merk]])->get();
        $id_pegawai = \App\Models\PegawaiModel:: where([['nama_pegawai', $nama_pegawai]])->get();
        $save_laporan = new \App\Models\LaporanModel;
        $save_laporan -> bulan=$bulan;
        $save_laporan -> terjual=$terjual;
        $save_laporan -> jumlah_masuk=$jumlah_masuk;
        $save_laporan -> hp_model_id=$id_hp[0]->id;
        $save_laporan -> pegawai_model_id=$id_pegawai[0]->id;
        $save_laporan -> merk_model_id=$id_merk[0]->id;
        $save_laporan->save();
        return redirect('/laporan');
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
        $edit_laporan = HpModel::findOrFail($id);
        return view ('laporan.edit',['edit_laporan'=>$edit_laporan]);
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
