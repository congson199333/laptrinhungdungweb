<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MayBay extends Model
{
       //
    protected $table = "maybay";
    public $timestamps=false;

    public function chuyenbay(){
    	return $this->hasMany('App\ChuyenBay','MaMayBay','MaMayBay');
    }
}
