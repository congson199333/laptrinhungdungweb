<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
       //
    protected $table = "hoadon";
    public $timestamps=false;

     public function khachhang(){
    	return $this->belongsTo('App\KhachHang','MaKhachHang','MaHoaDon');
    }
}
