<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
       //
    protected $table = "khachhang";
    public $timestamps=false;

    public function vechuyenbay(){
    	return $this->hasMany('App\VeChuyenBay','MaKhachHang','MaKhachHang');
    }
}
