<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerkModel extends Model
{
    protected $table = 'merk';
    protected $fillable = ['nama_merk','lokasi_rak'];
    protected $hidden;

    public function hp (){
        return $this -> belongsTo('\App\Models\HpModel', 'hp_model_id', 'id');
    }
    public function pegawai(){
        return $this -> belongsTo('\App\Models\PegawaiModel','pegawai_model_id','id');
    }
    public function laporan (){
        return $this -> hasOne(LaporanModel::class);
    }

}

