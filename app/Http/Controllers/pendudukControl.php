<?php

namespace App\Http\Controllers;

use App\model\mdPenduduk;
use Illuminate\Http\Request;

class pendudukControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'GetPendudukByNik'){
           return self::GetPendudukByNik($r);
        }
    }

    function GetPendudukByNik(Request $r){
        $data = $r->get("penduduk");

        $penduduk =  mdPenduduk::with('kecamatan')->where("nik", $data['nik'])->get();

        if(count($penduduk) > 0){
            return array(
                "code" => "200",
                "data" => $penduduk
            );
        }
        else{
            return array(
                "title"     => "Info",
                "type"      => "error",
                "message"   => "NO. KTP : ".$data["nik"]." tidak di temukan",
                "code"      => "500"
            ); 
        }
    }

}
