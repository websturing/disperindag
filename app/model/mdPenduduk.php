<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdPenduduk extends Model
{
    protected $table        = "penduduk";
    protected $primaryKey   = "penduduk_id";

    function kecamatan(){
        return $this->belongsTo(mdKecamatan::class,'kecamatan_id');
    }
}
