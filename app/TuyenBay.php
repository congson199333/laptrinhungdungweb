<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyenBay extends Model
{
       //
    protected $table = "tuyenbay";
    public $timestamps=false;

    public function sanbaydi(){
    	return $this->belongsTo('App\SanBay','MaSanBayDi','MaTuyenBay');
    }
    public function sanbayden(){
    	return $this->belongsTo('App\SanBay','MaSanBayDen','MaTuyenBay');
    }
    public function chuyenbay(){
    	return $this->hasMany('App\ChuyenBay','MaTuyenBay','MaTuyenBay');
    }
}
