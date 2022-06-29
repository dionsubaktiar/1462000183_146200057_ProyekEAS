<?php

namespace App\Http\Controllers;

use App\Models\HpModel;
use App\Models\MerkModel;
use App\Models\PegawaiModel;
use App\Models\PetugasModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $hp = HpModel::all();
       return view('stock.stock',['hp'=>$hp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.tambah');
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
        $save_hp= new \App\Models\HpModel;
        $save_hp->nama_hp=$nama_hp;
        $save_hp->jumlah=$jumlah;
        $save_hp->save();
        $id_hp= \App\Models\HpModel::where('id',$save_hp->id)->first();
        $nama_pegawai= $request->get('nama_pegawai');
        $save_pegawai = new \App\Models\PegawaiModel;
        $save_pegawai->nama_pegawai=$nama_pegawai;
        $save_pegawai->save();
        $id_pegawai = \App\Models\PegawaiModel::where('id',$save_pegawai->id)->first();
        $nama_merk=$request->get('nama_merk');
        $lokasi_rak=$request->get('lokasi_rak');
        $save_merk= new \App\Models\MerkModel;
        $save_merk->nama_merk=$nama_merk;
        $save_merk->lokasi_rak=$lokasi_rak;
        $save_merk->hp_model_id=$id_hp->id;
        $save_merk->pegawai_model_id=$id_pegawai->id;
        $save_merk->save();
        return redirect('/stock');
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
        $edit_hp = MerkModel::findOrFail($id);
        return view ('stock.edit',['edit_hp'=>$edit_hp]);
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
        DB::table('hp')->where('id',$id)->update([
            'nama_hp'=>$request->nama_hp,
            'jumlah'=>$request->jumlah
        ]);
        DB::table('merk')->where('id',$id)->update([
            'nama_merk'=>$request->nama_merk,
            'lokasi_rak'=>$request->lokasi_rak
        ]);
        DB::table('pegawai')->where('id',$id)->update([
            'nama_pegawai'=>$request->nama_pegawai
        ]);
        return redirect('/stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HpModel::where('id',$id)->delete();
        MerkModel::where('id',$id)->delete();
        PegawaiModel::where('id',$id)->delete();
        return redirect('stock');
    }
}
