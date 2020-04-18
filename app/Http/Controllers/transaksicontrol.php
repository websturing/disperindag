<?php

namespace App\Http\Controllers;

use App\model\mdKecamatan;
use App\model\mdtransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksicontrol extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'insert'){
           return self::insertPendaftaran($r);
        }
        
        elseif($type = "GetTransaksiByid"){
            return self::GetTransaksiByid($r);
        }
        elseif($type = "sendSMSPendaftaran"){
            return self::sendSmsPendaftaran($r);
        }
    }

    function insertPendaftaran(Request $r){
        date_default_timezone_set("Asia/Bangkok");
        $data = $r->get('data');
        $today = date("Ymd", strtotime($data["tanggal"]));
        $code = $today;
        $pegawaiCode =  mdtransaksi::where('nomor', 'like', '%' . $code . '%')->max('nomor');
        $idmax1 = $pegawaiCode;
        $nourut1 = (int) substr($idmax1, 8,5);
        $nourut1++;
        $permohonan_code = $code . sprintf("%05s", $nourut1);
        
        $tanggal = date("Y-m-d", strtotime($data["tanggal"]));
        $jam = date("H:i", strtotime("+1 hours"));
        
        $toDB = array(
            "nomor"     => $permohonan_code,
            "tanggal" => $tanggal,
            "jam" => $jam,
            "penduduk_id" => $data["penduduk"]["penduduk_id"],
            "kecamatan_id" => $data["penduduk"]["kecamatan_id"],
            "hp" => str_replace("-","",$data["hp"]),
            "kategori" => "pendaftar",
            "status" => "progress",
        );

        mdtransaksi::insert($toDB);
        $transaksi_id = DB::getPdo()->lastInsertId();

        $lokasi = mdKecamatan::where("kecamatan_id",$data["penduduk"]["kecamatan_id"])->get();


        self::sendSmsPendaftaran($r,$permohonan_code,$lokasi[0]->kecamatan,$jam);
        return $transaksi_id;

    }
    function sendSmsPendaftaran(Request $r,$permohonan_code,$lokasi,$jam){
        date_default_timezone_set("Asia/Bangkok");
        $data = $r->get('data');
        $phonenumber = str_replace("-","",$data["hp"]);
        ob_start(); 
        // setting 
        $apikey        = 'e5d9f84a824e7a06b00a1514247ec907'; 
        // api key 
        $urlendpoint = 'https://sms114.xyz/sms/api_sms_masking_send_json.php'; 
        // url endpoint api 
        $callbackurl = 'http://inilahkepri.id'; 
        // url callback get status sms 
        // create header json  
        $senddata = array( 'apikey' => $apikey,  'callbackurl' => $callbackurl, 'datapacket'=>array() );
        // create detail data json 
        // data 1 
        $number1='62'.$phonenumber; 
        $message1='Pendaftaran No '.$permohonan_code.', lokasi kecamatan'.$lokasi.', jam'.$jam; 
        $sendingdatetime1 =""; array_push($senddata['datapacket'],array( 
                        'number' => trim($number1), 
                        'message' => urlencode(stripslashes(utf8_encode($message1))), 
                        'sendingdatetime' => $sendingdatetime1));

        // send sms 
        $data=json_encode($senddata); 
        $curlHandle = curl_init($urlendpoint); 
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST"); 
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data)) ); 
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5); curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5); $responjson = curl_exec($curlHandle); 
        curl_close($curlHandle); header('Content-Type: application/json'); 
    }

    function GetTransaksiByid(Request $r){
        $id = $r->get("id");
        return mdtransaksi::with('kecamatan',"penduduk")->where("transaksi_id", $id)->get();

    }

}
