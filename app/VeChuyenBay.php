<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VeChuyenBay extends Model
{
       //
    protected $table = "vechuyenbay";
    public $timestamps=false;

    public function chuyenbay(){
    	return $this->belongsTo('App\ChuyenBay','MaChuyenBay','MaVeChuyenBay');
    }
    public function khachhang(){
    	return $this->belongsTo('App\KhachHang','MaKhachHang','MaVeChuyenBay');
    }

}
