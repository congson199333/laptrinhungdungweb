<?php
use Carbon\Carbon;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\TuyenBay;
use App\SanBay;
use App\MayBay;
use App\ChuyenBay;

class AjaxController extends Controller
{
    public function getNoiDen($idNoiDi)
    {
        $idnoiden = TuyenBay::select(['MaSanBayDen'])->where([['MaSanBayDi', '=', $idNoiDi],['MaSanBayDen', '!=', 'ALL']])->get();
        foreach ($idnoiden as $nd) {
            $tennoiden = SanBay::where('MaSanBay',$nd->MaSanBayDen)->get();
            foreach ($tennoiden as $tnd) {
                 echo "<option value='".$tnd->MaSanBay."'>".$tnd->TenSanBay."</option>";
            }
           
        }
    }

    public function getNoiDi($idNoiDen)
    {

        $idnoidi = TuyenBay::select(['MaSanBayDi'])->where([['MaSanBayDen', '=', $idNoiDen],['MaSanBayDi', '!=', 'ALL']])->get();
        foreach ($idnoidi as $nd) {
            $tennoidi = SanBay::where('MaSanBay',$nd->MaSanBayDi)->get();
            foreach ($tennoidi as $tnd) {
                 echo "<option value='".$tnd->MaSanBay."'>".$tnd->TenSanBay."</option>";
            }
           
        }
    }

    public function ResetDen($idreset)
    {
        $idnoiden = TuyenBay::select(['MaSanBayDen'])->where('MaSanBayDi',$idreset)->get();
        foreach ($idnoiden as $nd) {
            $tennoiden = SanBay::where('MaSanBay',$nd->MaSanBayDen)->get();
            foreach ($tennoiden as $tnd) {
                 echo "<option value='".$tnd->MaSanBay."'>".$tnd->TenSanBay."</option>";
            }
           
        }
    }

    public function ResetDi($idreset)
    {
        $idnoidi = TuyenBay::select(['MaSanBayDi'])->where('MaSanBayDen',$idreset)->get();
        foreach ($idnoidi as $nd) {
            $tennoidi = SanBay::where('MaSanBay',$nd->MaSanBayDi)->get();
            foreach ($tennoidi as $tnd) {
                 echo "<option value='".$tnd->MaSanBay."'>".$tnd->TenSanBay."</option>";
            }
           
        }
    }

    public function ResetLichdi()
    {
        echo '<input name="Lichdi" type="date" min="2020-01-01" max="2020-01-31">';

    }
    public function Xemchuyenbay()
    {
        $chuyenbay = ChuyenBay::get();
        echo '<table border="1" style="  background-color: rgba(0, 255, 255, 0.2);">
                <tr>
                    <th style="background-color:#184785;color:white;">Mã chuyến bay</th>
                    <th style="background-color:#184785;color:white;">Thời gian đi</th>
                    <th style="background-color:#184785;color:white;">Thời gian đến</th>
                    <th style="background-color:#184785;color:white;">Ngày đi</th>
                    <th style="background-color:#184785;color:white;">Ngày đến</th>
                    <th style="background-color:#184785;color:white;">Mã tuyến bay</th>
                    <th style="background-color:#184785;color:white;">Mã máy bay</th>
                    <th style="background-color:#184785;color:white;">Ghế hạng 1(Bussiness)</th>
                    <th style="background-color:#184785;color:white;">Ghế hạng 2(Eco)</th>
                </tr>';
        foreach($chuyenbay as $cb){
            echo '
                <tr>
                    <th>'.$cb->MaChuyenBay.'</th>
                    <th>'.$cb->ThoiGianDi.'</th>
                    <th>'.$cb->ThoiGianDen.'</th>
                    <th>'.$cb->NgayDi.'</th>
                    <th>'.$cb->NgayDen.'</th>
                    <th>'.$cb->MaTuyenBay.'</th>
                    <th>'.$cb->MaMayBay.'</th>
                    <th>'.$cb->SoLuongGheHang1.'</th>
                    <th>'.$cb->SoLuongGheHang2.'</th>
                </tr>';
        }
        echo '</table>';
    }




    public function Themchuyenbay(){

        $Tuyenbay = TuyenBay::where([['MaSanBayDi','!=','ALL'],['MaSanBayDen','!=','ALL']])->get();
        $Maybay = MayBay::get();

        echo '
                <table border="1" style="margin: 0px auto;">
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;"width="500px">Mã chuyến bay</th>
                        <td><input type = "text" name = "Machuyenbaytext"></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;"width="500px">Thời gian đi</th>
                        <td><input type = "time" name = "Thoigianditext"></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;"width="500px">Thời gian đến</th>
                        <td><input type = "time" name = "Thoigiandentext"></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;"width="500px">Ngày đi</th>
                        <td><input type = "date" name = "Ngayditext"></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;"width="500px">Ngày đến</th>
                        <td><input type = "date" name = "Ngaydentext"></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Mã tuyến bay</th>
                        <td><input list="listtb" name="Danhsachtuyen">
                            <datalist id="listtb">';

                        foreach ($Tuyenbay as $tb) {
                            echo'<option value='.$tb->MaTuyenBay.'>';
                        }


                        echo '  </datalist>  </td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Mã máy bay</th>
                        <td><input list="listmb" name="Danhsachmaybay">
                            <datalist id="listmb">';
                            foreach ($Maybay as $mb) {
                                echo'<option value='.$mb->MaMayBay.'>';
                            }

                            echo '</datalist></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Ghế hạng 1(Bussiness)</th>
                        <td><input type="number" name="Soghehang1" value="" placeholder=""></td>
                    </tr>
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Ghế hạng 2(Eco)</th>
                        <td><input type="number" name="Soghehang2" value="" placeholder=""></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align:center;"> <input type="submit" name="submitbt" value="Thêm" style=" background-color:#184785;color:white;font-size:20px;"> </th>
                    </tr>
                </table>';
    }
    public function Suachuyenbay(){
        $Chuyenbay = ChuyenBay::get();
        echo '<table  border="1" style="margin: 0px auto;">
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Mã chuyến bay cần sửa:</th>
                        <td>
                            <input list="listcb" id ="machuyenbayxoa">
                            <datalist id="listcb">';
                            foreach ($Chuyenbay as $cb) {
                                 echo '<option value='.$cb->MaChuyenBay.'></option>';
                            }
                               
                            echo'</datalist>
                        </td>
                    </tr>                        
                </table>';
    }



    public function Xoachuyenbay(){
        $Chuyenbay = ChuyenBay::get();
        echo '<table  border="1" style="margin: 0px auto;">
                    <tr>
                        <th style="background-color:#50A625;color:white;text-align:center;" width="500px">Mã chuyến bay cần xóa:</th>
                        <td>
                            <input list="listcb" id ="machuyenbayxoa">
                            <datalist id="listcb">';
                            foreach ($Chuyenbay as $cb) {
                                 echo '<option value='.$cb->MaChuyenBay.'></option>';
                            }
                               
                            echo'</datalist>
                        </td>
                    </tr>                        
                </table>';
    }

    public function getdataChuyenbay($temp){
        $chuyenbay = ChuyenBay::where('MaChuyenBay',$temp)->get();

        echo '<table style=" margin:0px auto ;background-color: rgba(0, 255, 255, 0.2);border-radius: 5px;border-collapse: collapse; border:2px solid black;">
                <tr>
                    <th style="background-color:#184785;color:white;">Mã chuyến bay</th>
                    
                    <th style="background-color:#184785;color:white;">Mã tuyến bay</th>
                    <th style="background-color:#184785;color:white;">Mã máy bay</th>
                    <th style="background-color:#184785;color:white;">Thời gian đi</th>
                    <th style="background-color:#184785;color:white;">Thời gian đến</th>
                    <th style="background-color:#184785;color:white;">Ngày đi</th>
                    <th style="background-color:#184785;color:white;">Ngày đến</th>
                </tr>';
                foreach ($chuyenbay as $key) {
                    echo '<tr>
                            <th style="padding-top:20px;">'.$key->MaChuyenBay.'</th>
                            <th style="padding-top:20px;" style="padding-top:20px;">'.$key->MaTuyenBay.'</th>
                            <th style="padding-top:20px;">'.$key->MaMayBay.'</th>
                            <th style="padding-top:20px;">'.$key->ThoiGianDi.'</th>
                            <th style="padding-top:20px;">'.$key->ThoiGianDen.'</th>
                            <th style="padding-top:20px;" style="padding-top:20px;">'.$key->NgayDi.'</th>
                            <th style="padding-top:20px;">'.$key->NgayDen.'</th>
                         </tr>';
                }
                echo '
                <tr>

                    <td colspan="7" style="text-align:center;"><input type="submit" name="xoa" value="Xóa"  style="margin-top:20px;margin-bottom:20px; width:500px; height:50px; background-color:#184785";color:white;></td>
                </tr>
        </table> 
            <input style="margin 0px auto; width:200px; height:50px;" type="hidden" name="machuyenbayxoa" value="'.$temp.'">';
    }
    
    public function getdataChuyenbaytoUpdate($temp){
        $chuyenbay = ChuyenBay::where('MaChuyenBay',$temp)->get();

        echo '<table border="1" style=" margin:0px auto ;background-color: rgba(0, 255, 255, 0.2);border-radius: 5px;border-collapse: collapse; border:2px solid black;">
                <tr>
                    <th style="background-color:#184785;color:white;">Mã chuyến bay</th>
                    <th style="background-color:#184785;color:white;">Mã tuyến bay</th>
                    <th style="background-color:#184785;color:white;">Mã máy bay</th>
                    <th style="background-color:#184785;color:white;">Thời gian đi</th>
                    <th style="background-color:#184785;color:white;">Thời gian đến</th>
                    <th style="background-color:#184785;color:white;">Ngày đi</th>
                    <th style="background-color:#184785;color:white;">Ngày đến</th>
                    <th style="background-color:#184785;color:white;">Số lượng ghế hạng 1</th>
                    <th style="background-color:#184785;color:white;">Số lượng ghế hạng 2</th>
                </tr>';

               
                foreach ($chuyenbay as $key) {
                    echo '<tr>
                            <td style="padding-top:20px; border-bottom:1px solid #333">
                                <input style="width:100px; background-color: rgba(0, 0, 0, 0); border-" type="text" name="chuyenbaysend" value='.$key->MaChuyenBay.' readonly>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:100px; background-color: rgba(0, 0, 0, 0); border-" type="text" name="tuyenbaysend" value='.$key->MaTuyenBay.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:100px;background-color: rgba(0, 0, 0, 0);" type="text" name="mabaysend" value='.$key->MaMayBay.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="time" name="thoigiandisend" value='.$key->ThoiGianDi.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="time" name="thoigiandensend" value='.$key->ThoiGianDen.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="date" name="ngaydisend" value='.$key->NgayDi.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="date" name="ngaydensend" value='.$key->NgayDen.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="number" name="soluongghehang1send" value='.$key->SoLuongGheHang1.'>
                            </td>
                            <td style="padding-top:20px;">
                                <input style="width:150px;background-color: rgba(0, 0, 0, 0);" type="number" name="soluongghehang2send" value='.$key->SoLuongGheHang2.'>
                            </td>
                         </tr>';
                }
                echo '
                <tr>

                    <td colspan="9" style="text-align:center;"><input type="submit" name="xoa" value="Sửa"  style="margin-top:20px;margin-bottom:20px; width:500px; height:50px; background-color:#184785";color:white;></td>
                </tr>
        </table> 
            <input style="margin 0px auto; width:200px; height:50px;" type="hidden" name="machuyenbayxoa" value="'.$temp.'">';
    }
}
