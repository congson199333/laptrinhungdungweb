<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanBay extends Model
{
    //
    protected $table = "sanbay";
    public $timestamps=false;

    public function sanbaydi(){
    	return $this->hasMany('App\TuyenBay','MaSanBayDi','MaSanBay');
    }
    public function sanbayden(){
    	return $this->hasMany('App\TuyenBay','MaSanBayDen','MaSanBay');
    }
    
}
