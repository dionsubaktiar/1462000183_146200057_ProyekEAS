<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HpModel extends Model
{
    protected $table = 'hp';
    protected $fillable = ['jumlah','nama_hp'];
    protected $hidden;

    public function merk (){
        return $this -> hasOne(MerkModel::class);
    }
    public function laporan (){
        return $this -> hasOne(LaporanModel::class);
    }
}
