<?php

namespace App\Http\Controllers;

use App\model\mdjadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jadwalcontrol extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'insertEvent'){
           return self::insertEvent($r);
        }
        elseif($type == 'JadwalById'){
            return self::JadwalById($r);
        }
        elseif($type == 'updateEvent'){
            return self::UpdateEvent($r);
        }
        elseif($type == 'deleteEvent'){
            return self::deleteEvent($r);
        }   
    }

    function insertEvent(Request $r){
        $data = $r->get("data");

        $toDB = array(
            "tanggal" => date("Y-m-d", strtotime($data["tanggal"])),
            "status" => $data["status"],
            "kecamatan_id" => $data["kecamatan_id"],
        );
        mdjadwal::insert($toDB);
        $jadwal_id = DB::getPdo()->lastInsertId();
        return self::JadwalById($jadwal_id);
    }

    function UpdateEvent(Request $r){
        $data = $r->get("data");

        $toDB = array(
            "status" => $data["status"],
        );
        mdjadwal::where("jadwal_id", $data["jadwal_id"])->update($toDB);
        return self::JadwalById($data["jadwal_id"]);
    }

    function deleteEvent($id){
        $id = $id;
        mdjadwal::where("jadwal_id", $id)->delete();

    }
    function JadwalById($id){
        return mdjadwal::where("jadwal_id", $id)->get();
    }
}
