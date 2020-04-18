<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdtransaksi extends Model
{
    protected $table        = "transaksi";
    protected $primaryKey   = "transaksi_id";

    function kecamatan(){
        return $this->belongsTo(mdKecamatan::class,'kecamatan_id');
    }

    function penduduk(){
        return $this->belongsTo(mdPenduduk::class,'penduduk_id');
    }
}
