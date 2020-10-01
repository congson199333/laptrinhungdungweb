<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\SanBay;
use App\TuyenBay;
use App\ChuyenBay;
use App\MayBay;
use App\KhachHang;
use App\VeChuyenBay;
use Carbon\Carbon;
use App\HoaDon;
use App\TaiKhoanDangNhap;
class MyController extends Controller
{
    public function Xinchao()
    {
    	echo "Xin Chao Cac Ban!";
    }

    public function KhoaHoc($ten)
    {
    	echo "Khoa Hoc: ".$ten;
    	return redirect()->route('MyRoute');
    }
    public function GetURL(Request $request){
    	//return $request->url();
    	/*if ($request -> isMethod('get')) {
    		echo "Phuong thuc Get";
    	}
    	else {
    		echo "Khong phai phuong thuc Get";
    	}*/
    	if($request -> is('My*'))
    		echo "Co My";
    	else
    		echo "Khong co My";
    }
    
    public function Hanhlyxachtay()
    {
        return view('DoAnLayouts.Hanhlyxachtay');
    }
    public function Hanhlymiencuoc()
    {
        return view('DoAnLayouts.Hanhlymiencuoc');
    }
    public function Hanhlydehuhong(){
        return view('DoAnLayouts.Hanhlydehuhong');
    }
    public function Hanhlynguyhiem(){
        return view('DoAnLayouts.Hanhlynguyhiem');
    }
    public function Phunumangthai(){
        return view('DoAnLayouts.Phunumangthai');
    }
    public function Nguoikhuyettat(){
        return view('DoAnLayouts.Nguoikhuyettat');
    }
    public function Yeucaugiaytotuythan(){
        return view('DoAnLayouts.Yeucaugiaytotuythan');
    }
    public function Phuongthucthanhtoan(){
        return view('DoAnLayouts.Phuongthucthanhtoan');
    }
    public function Muathemhanhly(){
        return view('DoAnLayouts.Muathemhanhly');
    }






    public function myView()
    {
    	return view('view.Congson');
    }

    public function Time($t)
    {
    	return view('myView',['time'=>$t]);
    }
    public function blade($str)
    {
        $khoahoc = "<b>Laravel - Cong son</b>"; 
        if($str == 'laravel')
            return view('pages.Laravel',['khoahoc'=>$khoahoc]);
        elseif($str == 'php')
            return view('pages.php',['khoahoc'=>$khoahoc]);
    }

    public function ShowDatVe()
    {
        return view('DoAnLayouts.DatVe');
    }
    //Truyền biến cho view
    public function getDanhSachNoiDi(){
        $noidi = SanBay::where('MaSanBay','!=','ALL')->get();
        $noiden = SanBay::where('MaSanBay','!=','ALL')->get();
        return view('DoAnLayouts.DatVe',['noidip'=>$noidi,'noidenp'=>$noiden]);
    }
    public function Dangnhap(){
        return view('DoAnLayouts.DangNhap');
    }
    public function PostDangNhap(Request $request){
        $noidi = SanBay::where('MaSanBay','!=','ALL')->get();
        $noiden = SanBay::where('MaSanBay','!=','ALL')->get();

        $TaiKhoanDangNhap = TaiKhoanDangNhap::where([['Username',$request->Tendangnhap],['Password',$request->Matkhau]])->get();
        
        foreach ($TaiKhoanDangNhap as $tkdn) {
            $LoaiTK=$tkdn->LoaiTK;
        }
        
        foreach ($TaiKhoanDangNhap as $key) {
            if ($key->Username == $request->Tendangnhap && $key->Password ==$request->Matkhau && $LoaiTK=='admin') {
                return view('DoAnLayouts.Adminload',['Username'=>$key->Username,'Password'=>$key->Password]);
            }
            if ($key->Username == $request->Tendangnhap && $key->Password ==$request->Matkhau && $LoaiTK=='nhanvien') {
                return view('DoAnLayouts.DatVe',['noidip'=>$noidi,'noidenp'=>$noiden]);
            }
            
        }
        return redirect('DangNhap')->with('ThongBao','Sai tài khoản hoặc mật khẩu!');
    }

    public function Admin2(){
        return view('DoAnLayouts.Admin');
    }
    public function Admin(Request $request){
        return view('DoAnLayouts.Admin');
    }

    public function Add(Request $request){
        $cbalive = ChuyenBay::where('MaChuyenBay',$request->Machuyenbaytext)->get();
        foreach ($cbalive as $key) {
            if($key->MaChuyenBay != "")
                {
                    return redirect('Admin')->with('Thongbao','Mã chuyến bay đã tồn tại!');

                }
            }

            $cb = new ChuyenBay;
            $cb->MaChuyenBay = $request->Machuyenbaytext;
            $cb->ThoiGianDi = $request->Thoigianditext;
            $cb->ThoiGianDen = $request->Thoigiandentext;
            $cb->NgayDi = $request->Ngayditext;
            $cb->NgayDen = $request->Ngaydentext;
            $cb->SoLuongGheHang1 = $request->Soghehang1;
            $cb->SoLuongGheHang2 = $request->Soghehang2;
            $cb->MaTuyenBay = $request->Danhsachtuyen;
            $cb->MaMayBay = $request->Danhsachmaybay;
            $cb->save();
            return redirect('Admin')->with('Thongbao','Thêm thành công!');

        
    }

    public function Delete(Request $request)
    {
        $Thongtinchuyenbay = ChuyenBay::where('MaChuyenBay',$request->machuyenbayxoa)->get();
        foreach ($Thongtinchuyenbay as $key) {
            $Macb = $key->MaChuyenBay;
            $Thoigiandi=$key->ThoiGianDi;
            $Thoigianden=$key->ThoiGianDen;
            $Ngaydi = $key->NgayDi;
            $Ngayden = $key->NgayDen;
            $Matb = $key->MaTuyenBay;
            $Mamb = $key->MaMayBay;
        }
        
        //Xóa database
        ChuyenBay::where('MaChuyenBay','=',$Macb)->delete();
        
        
        return redirect('Admin')->with('ThongBaoXoaThanhCong','Xóa chuyến bay thành công!');
    }


    public function Update(Request $request)
    {
        //update trong database
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['MaTuyenBay' => $request->tuyenbaysend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['MaMayBay' => $request->mabaysend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['ThoiGianDi' => $request->thoigiandisend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['ThoiGianDen' => $request->thoigiandensend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['NgayDi' => $request->ngaydisend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['NgayDen' => $request->ngaydensend]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['SoLuongGheHang1' => $request->soluongghehang1send]);
        ChuyenBay::where('MaChuyenBay',$request->chuyenbaysend)->update(['SoLuongGheHang2' => $request->soluongghehang2send]);

       
        return redirect('Admin')->with('ThongBaoSuaThanhCong','Sửa chuyến bay thành công!');
    }








    // Post KQ đặt vé qua page mới
    public function postForm(Request $request){
        if ($request -> has('HoTen'))
            echo $request->HoTen;
        else
            echo "HoTen_Null";
    }

    public function Cachangveview(){
        return view('DoAnLayouts.Cachangve');
    }

    public function Thongtinchonchongoiview(){
        return view('DoAnLayouts.Thongtinchonchongoi');
    }

    public function Chonthoigian(Request $request){
        $tuyenbay2 = TuyenBay::select(['MaTuyenBay'])->where([['MaSanBayDen', $request->NoiDen],['MaSanBayDi', $request->NoiDi]])->get();
        $noidi = SanBay::where('MaSanBay',$request->NoiDi)->get();
        $noiden = SanBay::where('MaSanBay',$request->NoiDen)->get();
        foreach ($tuyenbay2 as $key) {
             $chuyenbay2 = ChuyenBay::where([['MaTuyenBay',$key->MaTuyenBay],['NgayDi',$request->Lichdi]])->get();
             
        }
        foreach ($chuyenbay2 as $cb ) {
            $tenmaybay1 = MayBay::select('TenMayBay')->where('MaMayBay',$cb->MaMayBay)->get();
            break;
        }
        foreach ($chuyenbay2 as $cb) {
            $tenmaybay2 = MayBay::select('TenMayBay')->where('MaMayBay',$cb->MaMayBay)->get();
        }


        $tuyenbay1 = TuyenBay::select(['MaTuyenBay'])->where([['MaSanBayDi',$request->NoiDen],['MaSanBayDen',$request->NoiDi]])->get();
        foreach ($tuyenbay1 as $key1) {
            $chuyenbay1 = ChuyenBay::where([['MaTuyenBay',$key1->MaTuyenBay],['NgayDi',$request->Lichve1]])->get();
        }
        foreach ($chuyenbay1 as $cb) {
            $tenmaybayve1 = MayBay::select('TenMayBay')->where('MaMayBay',$cb->MaMayBay)->get();
            break;
        }
        foreach ($chuyenbay1 as $cb) {
            $tenmaybayve2 = MayBay::select('TenMayBay')->where('MaMayBay',$cb->MaMayBay)->get();
        }
       

        if($request->Lichve1!="")
        {
            //Khứ hồi
            $Loai ="1";
            
            return view('DoAnLayouts.Chongiobay',['Noidisend'=>$noidi,'Noidensend' => $noiden,'Lichdisend'=>$request->Lichdi,'Loaisend'=>$Loai,'Tuyenbaysend'=>$tuyenbay2,'Chuyenbaysend'=>$chuyenbay2,'Tenmaybay1send'=>$tenmaybay1,'Tenmaybay2send'=>$tenmaybay2 ]);
        }
        else
        {
            //Một chiều
            $Loai ="2";
            
            return view('DoAnLayouts.Chongiobay',['Noidisend'=>$noidi,'Noidensend' => $noiden,'Lichdisend'=>$request->Lichdi,'Loaisend'=>$Loai,'Tuyenbaysend'=>$tuyenbay2,'Chuyenbaysend'=>$chuyenbay2,'Tenmaybay1send'=>$tenmaybay1,'Tenmaybay2send'=>$tenmaybay2 ]);
        }
    }

    public function Thongtinhanhkhach(Request $request){
        $Machuyenbaynhanduoc1 = $request->MaChuyenBay1;
        $Machuyenbaynhanduoc2 = $request->MaChuyenBay2;
        $chuyenbaynhanduoc1 = ChuyenBay::where('MaChuyenBay',$Machuyenbaynhanduoc1)->get();
        $chuyenbaynhanduoc2 = ChuyenBay::where('MaChuyenBay',$Machuyenbaynhanduoc2)->get();
        

        if($request->CB =="Truoc")
        {
            return view('DoAnLayouts.Thongtinhanhkhach',['Giatiensend'=>$request->Gia,'Chuyenbaysend'=>$chuyenbaynhanduoc1,'Noidisend'=>$request->Noidihidden,'Noidensend'=>$request->Noidenhidden,'Loaisend'=>$request->Loaihidden,'Ngaydisend'=>$request->Ngaydihidden,'Tuyenbaysend'=>$request->Tuyenbayhidden,'Tenhangvesend'=>$request->TenHangVehidden,'Tenmaybaysend'=>$request->Tenmaybayhidden]);
        }   
        else
        {
            return view('DoAnLayouts.Thongtinhanhkhach',['Giatiensend'=>$request->Gia,'Chuyenbaysend'=>$chuyenbaynhanduoc2,'Noidisend'=>$request->Noidihidden,'Noidensend'=>$request->Noidenhidden,'Loaisend'=>$request->Loaihidden,'Ngaydisend'=>$request->Ngaydihidden,'Tuyenbaysend'=>$request->Tuyenbayhidden,'Tenhangvesend'=>$request->TenHangVehidden,'Tenmaybaysend'=>$request->Tenmaybayhidden]);
        }
    }

    public function Dichvubosung(Request $request){

        $Machuyenbaynhanduoc =$request->Machuyenbayhidden;
        $chuyenbaynhanduoc = ChuyenBay::where('MaChuyenBay',$Machuyenbaynhanduoc)->get();
         
        return view('DoAnLayouts.Dichvubosung',['Tendemvatensend'=>$request->Tendemvaten,'Hosend'=>$request->Ho,'Ngaysinhsend'=>$request->Ngaysinh,'Quoctichsend'=>$request->Quoctich,'TendemvatenLHsend'=>$request->TendemvatenLH,'HoLHsend'=>$request->HoLH,'EmailLHsend'=>$request->EmailLH,'SodienthoaiLHsend'=>$request->SodienthoaiLH,'TenduongLHsend'=>$request->TenduongLH,'ThanhphoLHsend'=>$request->ThanhphoLH,'Noidisend'=>$request->Noidihidden,'Noidensend'=>$request->Noidenhidden,'Giatiensend' =>$request->Giatienhidden,'Ngaydisend'=>$request->Ngaydihidden,'Ngaydensend'=>$request->Ngaydenhidden,'Thoigiandisend'=>$request->Thoigiandihidden,'Thoigiandensend'=>$request->Thoigiandenhidden,'Tenhangvesend'=>$request->Tenhangvehidden,'Tenmaybaysend'=>$request->Tenmaybayhidden,'Loaisend'=>$request->Loaihidden,'Chuyenbaysend'=>$chuyenbaynhanduoc,'CMNDsend'=>$request->CMND]);
    
    }

    public function Thanhtoan(Request $request){
        $Machuyenbaynhanduoc =$request->Machuyenbayhidden;
        $chuyenbaynhanduoc = ChuyenBay::where('MaChuyenBay',$Machuyenbaynhanduoc)->get();

        $Masanbaydi = SanBay::where('TenSanBay',$request->Noidihidden)->get();
        $Masanbayden = SanBay::where('TenSanBay',$request->Noidenhidden)->get();
        return view('DoAnLayouts.Thanhtoan',['Chuyenbaysend'=>$chuyenbaynhanduoc,'Giagocsend'=>$request->Giagochidden,'Giadichvusend'=>$request->Giahanhly,'Ngaykhoihanhsend'=>$request->Ngaykhoihanhhidden,'Ngaydensend'=>$request->Ngaydenhidden,'Noidisend'=>$request->Noidihidden,'Noidensend'=>$request->Noidenhidden,'Thoigiandisend'=>$request->Thoigiandihidden,'Thoigiandensend'=>$request->Thoigiandenhidden,'Tenhangvesend'=>$request->Tenhangvehidden,'Loaisend'=>$request->Loaihidden,'Tenmaybaysend'=>$request->Tenmaybayhidden,'Tendemvatensend'=>$request->Tendemvatenhidden,'Hosend'=>$request->Hohidden,'Ngaysinhsend'=>$request->Ngaysinhhidden,'Quoctichsend'=>$request->Quoctichhidden,'TendemvatenLHsend'=>$request->TendemvatenLHhidden,'HoLHsend'=>$request->HoLHhidden,'EmailLHsend'=>$request->EmailLHhidden,'SodienthoaiLHsend'=>$request->SodienthoaiLHhidden,'TenduongLHsend'=>$request->TenduongLHhidden,'ThanhphoLHsend'=>$request->ThanhphoLHhidden,'CMNDsend'=>$request->CMNDhidden,'Tenloaihanhlysend'=>$request->Tenloaihanhlyhidden,'Masanbaydisend'=>$Masanbaydi,'Masanbaydensend'=>$Masanbayden]);
    }
    
    public function Insert(Request $request){
        // $this->validate($request,[]); Soát lỗi
        //Insert KhachHang
        $Khachhangsave = new KhachHang;
        $Khachhangsave->CMND = $request->CMNDhidden;
        $Khachhangsave->TenKhachHang = $request->Tenkhachhanghidden;
        $Khachhangsave->DienThoai = $request->SodienthoaiLHhidden;
        $Khachhangsave->Email = $request->EmailLHhidden;
        $tempKH = "$request->CMNDhidden$request->Tenkhachhanghidden";

        $Khachhangsave->MaKhachHang = $tempKH;
        
        //Insert VeChuyenBay
        $Vechuyenbaysave = new VeChuyenBay;
        $Vechuyenbaysave->TinhTrangVe = "OK";
        $Vechuyenbaysave->SoGheDat = 1;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        // echo $dt->toDateString(); 
        $Vechuyenbaysave->NgayDatVe = $dt->toDateString();
        if ($request->Giagochidden == "600000") {
             $Vechuyenbaysave->MaDonGia = "Eco";
        }
        else{
            $Vechuyenbaysave->MaDonGia = "Bussiness";
        }
        $Vechuyenbaysave->MaHangVe = $request->Tenhangvehidden;
        $Vechuyenbaysave->MaChuyenBay = $request->Machuyenbayhidden;
        $tempVCB = "$request->CMNDhidden$request->Tenkhachhanghidden$request->Machuyenbayhidden;";
        $Vechuyenbaysave->MaVeChuyenBay = $tempVCB;
        $Vechuyenbaysave->MaKhachHang = $tempKH;


        $Hoadonsave = new HoaDon;
        $Hoadonsave->NgayHoaDon = $dt->toDateString();
        $Hoadonsave->Thanhtien = $request->Thanhtienhidden;
        $Hoadonsave->MaKhachHang = $tempKH;
        $tempHD = "$request->CMNDhidden$request->Tenkhachhanghidden$Hoadonsave->NgayHoaDon";
        $Hoadonsave->MaHoaDon = $tempHD;
        $Khachhangsave->save();
        $Hoadonsave->save();
        $Vechuyenbaysave->save();
        return redirect('HoaDon')->with('Tenkhachhangsend',$Khachhangsave->TenKhachHang)->with('Thongbao2',"Đặt vé thành công!")->with('Thongbao3',"Cảm ơn quý khách đã lựa chọn TSFly!")->with('Ngaydatvesend', $Vechuyenbaysave->NgayDatVe)->with('CMNDsend',$Khachhangsave->CMND)->with('Thanhtiensend',$Hoadonsave->Thanhtien);             
            
        }

    public function HoaDon(){
             
        return view('DoAnLayouts.HoaDon');
    }

    
}
