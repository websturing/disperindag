<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdKecamatan extends Model
{
    protected $table        = "kecamatan";
    protected $primaryKey   = "kecamatan_id";

    function jadwal(){
        return $this->hasMany(mdjadwal::class,'kecamatan_id');
    }
}
