<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenBay extends Model
{
       //
    protected $table = "chuyenbay";
    public $timestamps=false;

    public function tuyenbay(){
    	return $this->belongsTo('App\TuyenBay','MaTuyenBay','MaChuyenBay');
    }
    public function maybay(){
    	return $this->belongsTo('App\MayBay','MaMayBay','MaChuyenBay');
    }
    public function vechuyenbay(){
    	return $this->hasMany('App\VeChuyenBay','MaChuyenBay','MaChuyenBay');
    }
}
