<?php

namespace App\Http\Controllers;

use App\model\mdKecamatan;
use Illuminate\Http\Request;

class kecamatanControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'GetByAktif'){
           return self::GetByAktif($r);
        }   
    }

    function GetByAktif(Request $r){
        $kategori = mdKecamatan::with('jadwal')->where('is_active','true')->get();

        return $kategori;
    }
}
