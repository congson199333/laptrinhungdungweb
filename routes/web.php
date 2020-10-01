<?php

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('KhoaHoc',function(){
	return "Xin chao cac ban";
});
Route::get('KhoaHoc/Laravel', function(){
	echo "<h1>Khoa Hoc - Laravel</h1>";
});

//Truyen tham so 
Route::get('HoTen/{ten}',function($ten){
	echo "Ten cua ban la: ".$ten;
});

//Dat dieu kien cho tham so voi phuong thuc where 

Route::get('Ngay/{ngay}',function($ngay){
	echo "Cong Son: ".$ngay;
}) -> where(['ngay'=>'[a-zA-Z]+']);

//Dinh danh cho Route

Route::get('Route1',['as'=>'MyRoute',function(){
	echo "Xin chao cac ban";
}]);

Route::get('Route2',function(){
	echo "Day la Route2";
})->name('MyRoute2');

Route::get('Goiten',function(){
	return redirect()->route('MyRoute2');
});

//Group Route

Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
});

//Goi controller
Route::get('hu','MyController@Thoadg');
Route::get('Goicontroller','MyController@Xinchao');

Route::get('Thamso/{ten}','MyController@KhoaHoc');

//URL
Route::get('MyRequest','MyController@GetURL');


//Gui nhan du lieu voi request

Route::get('getForm',function(){
	return view('postForm');
});

Route::post('postForm',['as' => 'postForm','uses'=> 'MyController@postForm']);


//View 
Route::get('myView','MyController@myView');

//Truyen tham so tren view

Route::get('Time/{t}','MyController@Time');

View::share('KhoaHoc','Laravel');


//blade template

Route::get('blade',function(){
	return view('pages.php');
});

Route::get('DatVe','MyController@ShowDatVe');

Route::get('BladeTemplate/{str}','MyController@blade');

//Query Builder - Lay du lieu

Route::get('qb/get',function(){
	$data = DB::table('sanbay')->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

// select * from sanbay where masanbay="HAN";

Route::get('qb/where',function(){
	$data = DB::table('sanbay')->where('MaSanBay','=','HAN')->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

// select TenSanBay from sanbay where MaSanBay="DAD";

Route::get('qb/select',function(){
	$data = DB::table('sanbay')->select(['tensanbay'])->where('maSanBay','DAD')->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//Select TenSanBay as Tên Sân Bay from sanbay
Route::get('qb/raw',function(){
	$data = DB::table('sanbay')->select(DB::raw('TenSanBay as "Tên Sân Bay"'))->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.":".$value."<br>";
		}
		echo "<hr>";
	}
});



//model
Route::get('model/query',function(){
	$CacSanBay = App\SanBay::where('MaSanBay','DAD')->get()->toArray();
	echo $CacSanBay[0]['TenSanBay'];
});


Route::get('DatVe','MyController@getDanhSachNoiDi');
Route::get('Hanhlyxachtay','MyController@Hanhlyxachtay');
Route::get('Hanhlymiencuoc','MyController@Hanhlymiencuoc');
Route::get('Hanhlydehuhong','MyController@Hanhlydehuhong');
Route::get('Hanhlynguyhiem','MyController@Hanhlynguyhiem');
Route::get('Phunumangthai','MyController@Phunumangthai');
Route::get('Nguoikhuyettat','MyController@Nguoikhuyettat');
Route::get('Yeucaugiaytotuythan','MyController@Yeucaugiaytotuythan');
Route::get('Phuongthucthanhtoan','MyController@Phuongthucthanhtoan');
Route::get('Muathemhanhly','MyController@Muathemhanhly');



Route::group(['prefix'=>'ajax'],function(){
	Route::get('noiden/{idNoiDi}','AjaxController@getNoiDen');
	Route::get('noidi/{idNoiDen}','AjaxController@getNoiDi');
	Route::get('reset/{idreset}','AjaxController@ResetDi');
	Route::get('reset/{idreset}','AjaxController@ResetDen');
	Route::get('resetlichdi','AjaxController@ResetLichdi');
	Route::get('xem','AjaxController@Xemchuyenbay');
	Route::get('them','AjaxController@Themchuyenbay');
	Route::get('sua','AjaxController@Suachuyenbay');
	Route::get('xoa','AjaxController@Xoachuyenbay');
	Route::get('tim/{MaChuyenBay}','AjaxController@getdataChuyenbay');
	Route::get('timsua/{MaChuyenBay}','AjaxController@getdataChuyenbaytoUpdate');
});

Route::get('Cachangve','MyController@Cachangveview');
Route::get('Thongtinchonchongoi','MyController@Thongtinchonchongoiview');
Route::get('DangNhap','MyController@Dangnhap');

Route::post('Chonthoigian',['as' => 'Chonthoigian','uses'=> 'MyController@Chonthoigian']);

Route::post('Thongtinhanhkhach',['as'=>'Thongtinhanhkhach','uses'=>'MyController@Thongtinhanhkhach']);

Route::post('Dichvubosung',['as'=>'Dichvubosung','uses'=>'MyController@Dichvubosung']);

Route::post('Thanhtoan',['as'=>'Thanhtoan','uses'=>'MyController@Thanhtoan']);

Route::post('Insert','MyController@Insert');

Route::get('HoaDon','MyController@HoaDon');


Route::post('DatVe',['as'=>'PostDangNhap','uses'=>'MyController@PostDangNhap']);

Route::post('Admin',['as'=>'Admin','uses'=>'MyController@Admin']);

Route::get('Admin','MyController@Admin2');

Route::post('Save',['as'=>'Save','uses'=>'MyController@Add']);

Route::post('Update',['as'=>'Update','uses'=>'MyController@Update']);

Route::post('Delete',['as'=>'Delete','uses'=>'MyController@Delete']);
