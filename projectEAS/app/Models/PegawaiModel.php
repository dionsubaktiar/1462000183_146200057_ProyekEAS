<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['nama_pegawai'];
    protected $hidden;

    public function laporan (){
        return $this -> hasOne(LaporanModel::class);
    }
    public function merk(){
        return $this -> hasOne(MerkModel::class);
    }
}
