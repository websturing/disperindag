<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class mdjadwal extends Model
{
    protected $table        = "jadwal";
    protected $primaryKey   = "jadwal_id";

    protected $appends = [
            'id',
            'startDate',
            'endDate',
            'title',
            'classes'
    ];

    function getidAttribute(){
      return $this->jadwal_id;
   }
    function getstartDateAttribute(){
       return $this->tanggal;
    }
    function getendDateAttribute(){
        return $this->tanggal;
     }
     function gettitleAttribute(){
        return $this->status;
     }
     function getclassesAttribute(){
        return $this->status;
     }
}
