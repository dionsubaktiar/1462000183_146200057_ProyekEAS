<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $fillable = ['bulan','jumlah_masuk','terjual'];
    protected $hidden;

    public function hp(){
        return $this -> belongsTo('\App\Models\HpModel','hp_model_id','id');
    }
    public function pegawai(){
        return $this -> belongsTo('\App\Models\PegawaiModel','pegawai_model_id','id');
    }
    public function merk(){
        return $this -> belongsTo('\App\Models\MerkModel','merk_model_id','id');
    }
}
