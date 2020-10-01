<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chọn thời gian | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/Chongiobay.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
</head>


<body style="background: #EDF3F7;">
	@include('DoAnLayouts.HeaderForChonThoiGian')
	<br>
	<ol id="ol-groups">
		<li class="li-active">Chuyến bay</li>
		<li class="li" >Thông tin hành khách</li>
		<li class="li" >Dịch vụ bổ sung</li>
		<li class="li">Thanh toán</li>
	</ol>



	{{-- Data từ form 1
	Nơi đi  |  @foreach($Noidisend as $nd) {!!$nd->TenSanBay!!}({!!$nd->MaSanBay!!}) @endforeach
	Nơi Đến  |  @foreach($Noidensend as $nde) {!!$nde->TenSanBay!!}({!!$nde->MaSanBay!!}) @endforeach
	Loại  |  $Loaisend
	Ngày đi | {{$Lichdisend}}
	Ngày về | {{$Lichvesend}} || Nếu khứ hồi($Loaisend=1)
	Tuyến bay |  @foreach($Tuyenbaysend as $tbs){{$tbs->MaTuyenBay}} @endforeach
	Tên máy bay 1	@foreach($Tenmaybay1send as $tmb1s)	{{$tmb1s->TenMayBay}}	@endforeach
	Tên máy bay 2	@foreach($Tenmaybay2send as $tmb2s)	{{$tmb2s->TenMayBay}} 	@endforeach
	

	 --}}
	@foreach($Tenmaybay1send as $tmb1s)
	@endforeach
	@foreach($Tenmaybay2send as $tmb2s)
	@endforeach
	@foreach($Tuyenbaysend as $tbs)
	@endforeach
	
	
	@if($Loaisend == "2")

	@foreach($Tenmaybay1send as $tmb1s)
	@endforeach
	@foreach($Tenmaybay2send as $tmb2s)
	@endforeach
	@foreach($Tuyenbaysend as $tbs)
	@endforeach

	<h2 class="h2">
		<span>&#9992;</span>
		<span>Chuyến bay | Một chiều</span><br>
		@foreach($Noidisend as $nd)
    		{!!$nd->TenSanBay!!} <font color="green">({!!$nd->MaSanBay!!}) </font>
   		@endforeach 
		&#9992; 
		@foreach($Noidensend as $nde)
    		{!!$nde->TenSanBay!!}<font color="green">({!!$nde->MaSanBay!!})  </font>
   		@endforeach
   		
    </h2>
   
    
	<div class="Lichbaycb">
		<div id="ChiaNgay">
			 
		</div>
	</div>
	<br>
	

	<form action="{{route('Thongtinhanhkhach')}}" method="post" id="form">
		{{ csrf_field() }}
		@foreach($Chuyenbaysend as $cb)
				
				<input type="hidden" name="MaChuyenBay1" value="{{$cb->MaChuyenBay}}" >
				@break;
		@endforeach
		@foreach($Chuyenbaysend as $cb1)
		@endforeach
		<input type="hidden" name="MaChuyenBay2" value="{{$cb1->MaChuyenBay}}" >
		<input type="hidden" name="Noidihidden" value="{!!$nd->TenSanBay!!}">
		<input type="hidden" name="Noidenhidden" value="{!!$nde->TenSanBay!!}">
		<input type="hidden" name="Loaihidden" value="{{$Loaisend}}">
		<input type="hidden" name="Ngaydihidden" value="{{$Lichdisend}}">
		<input type="hidden" name="Tuyenbayhidden" value="{{$tbs->MaTuyenBay}}">
		<div id="hiddenidGia">
		</div>

		<br>
		<div id="hiddenidCB">
		</div>
		{{-- ----------------------------------------------------------- --}}
			<div id="div-group">
				{{-- Khung này sẽ gửi cho form tiếp theo Mã Chuyến Bay
					

				 --}}
				<div class="div1">
					<span class="NgayGio">
						@foreach($Noidisend as $nd)
    						{!!$nd->MaSanBay!!}
   						@endforeach
   						-
   						@foreach($Noidensend as $nde)
    						{!!$nde->MaSanBay!!}
   						@endforeach
   						|
						{{-- ----------- Lấy Thời gian đi đến ---------- --}}
						@foreach($Chuyenbaysend as $cb1)
							<font size="2px" color="green"><u>{{$tmb1s->TenMayBay}}</u></font> | {{$cb1->ThoiGianDi}} - {{$cb1->ThoiGianDen}} 
							@break
						@endforeach
						
						{{-- ----------- Lấy Thời gian đi đến ---------- --}}
					</span>
				</div>
				<div class="div2">
					<input style="width:40px;height:18px;margin-top: 1px;" type="radio" name="radios" id="Eco1" value="600000" /> <br>
					<span class="TenHangVe" >TSFly - Eco</span>  <br>
					<span class="GiaVe">600.000 VND</span>
				</div>

				<div class="div3">
					<input style="width:40px; height:18px;margin-top: 1px;" type="radio" name="radios" id="Bussiness1" value="1200000"  /> <br>
					<span class="TenHangVe" >TSFly - Bussiness</span> <br>
					<span class="GiaVe">1.200.000 VND</span>
				</div>
			</div>
			{{-- ----------------------------------------------------------- --}}
			<div id="div-group" s>
		
				<div class="div1">
					<span class="NgayGio">
						@foreach($Noidisend as $nd)
    						{!!$nd->MaSanBay!!}
   						@endforeach
   						-
   						@foreach($Noidensend as $nde)
    						{!!$nde->MaSanBay!!}
   						@endforeach
   						|
   						{{-- ----------- Lấy Thời gian đi đến ---------- --}}
   						@foreach($Chuyenbaysend as $cb)

   						@endforeach
   						
   						@for($i=1;$i<2;$i++)
							<font size="2px" color="green"><u>{{$tmb2s->TenMayBay}}</u></font> | {{$cb->ThoiGianDi}} - {{$cb->ThoiGianDen}}
						@endfor

						{{-- --------------------- --}}
					</span>

				</div>
				<div class="div2">
					<input style="width:40px;height:18px;margin-top: 1px;" type="radio" name="radios" id="Eco2" value="600000"/ > <br>
					<span class="TenHangVe" >TSFly - Eco</span>  <br>
					<span class="GiaVe">600.000 VND</span>
				</div>
				<div class="div3">
					<input style="width:40px; height:18px;margin-top: 1px;" type="radio" name="radios" id="Bussiness2" value="1200000"/> <br>
					<span class="TenHangVe" >TSFly - Bussiness</span> <br>
					<span class="GiaVe">1.200.000 VND</span>
				</div>
			</div>



		{{-- <input type="button" name="" onclick="A();"> --}}
		<br><br><br><br><br><br><br><br>
		<div class="borderTong">
			<div class="Tong" >
				Tổng thanh toán:
				<div id="TongTien"style="font-size: 20px;margin-left: 50px;">
				</div> 
			</div>
		</div>



		<br><br><br>
		<input type="submit" style="font-family: urw-din,Arial,sans-serif;margin-top:10px;margin-left:1000px;	height: 70px;width: 220px;font-size:25px;background-color: Green;color: #fff;"  value="Tiếp tục">
	</form>
		@endif
	<br>
	

	@include('DoAnLayouts.Footer')
	<script>
		function stringToDate(_date,_format,_delimiter)
		{
            var formatLowerCase=_format.toLowerCase();
            var formatItems=formatLowerCase.split(_delimiter);
            var dateItems=_date.split(_delimiter);
            var monthIndex=formatItems.indexOf("mm");
            var dayIndex=formatItems.indexOf("dd");
            var yearIndex=formatItems.indexOf("yyyy");
            var month=parseInt(dateItems[monthIndex]);
            month-=1;
            var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
            return formatedDate;
		}
		
		var test = stringToDate('{{$Lichdisend}}',"yyyy-mm-dd","-")
		var d = test.getDate();
		var m = test.getMonth()+1;
		var y = test.getFullYear();
		document.getElementById("ChiaNgay").innerHTML = "Ngày "+d+" Tháng "+m+" Năm "+y;
		
		
	</script>
// Kiểm tra xem đã checked hay chưa
	<script>
		$('form').submit(function() {
			var chk1 = document.getElementById('Eco1').checked;
			var chk2 = document.getElementById('Eco2').checked;
			var chk3 = document.getElementById('Bussiness1').checked;
			var chk4 = document.getElementById('Bussiness2').checked;
			//alert(chk1);alert(chk2);alert(chk3);alert(chk4);
			if(chk1==false){
				if(chk2 == false){
					if(chk3 ==false){
						if(chk4 == false){
							alert("Chưa chọn chuyến bay");
							return false;
						}
					}
				}
			}
		});
	</script>
//-------------------------------------------
	<script>
		$(document).ready(function() {
			$("#Eco1").change(function(){
				var valRadio1 = document.getElementById('Eco1').checked;
				var valueRadio1 = document.getElementById('Eco1').value;
				if (valRadio1==true) {
					$("#TongTien").html(valueRadio1+" VND");

					document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Gia" value="600000" ><input type="hidden" name="CB" value="Truoc" ><input type="hidden" name="TenHangVehidden" value="TSFly - Eco"><input type="hidden" name="Tenmaybayhidden" value="{{$tmb1s->TenMayBay}}">';
					
				} else {
					alert("NULL")
				}



			});

		});

		$(document).ready(function() {
			$("#Eco2").change(function(){
				var valRadio2 = document.getElementById('Eco2').checked;
				var valueRadio2 = document.getElementById('Eco2').value;
				if (valRadio2==true) {
					$("#TongTien").html(valueRadio2+" VND");
					document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Gia" value="600000" ><input type="hidden" name="CB" value="Sau"><input type="hidden" name="TenHangVehidden" value="TSFly - Eco"><input type="hidden" name="Tenmaybayhidden" value="{{$tmb2s->TenMayBay}}">';
				} else {
					alert("NULL")
				}
			});
		});

		$(document).ready(function() {
			$("#Bussiness1").change(function(){
				var valRadio3 = document.getElementById('Bussiness1').checked;
				var valueRadio3 = document.getElementById('Bussiness1').value;
				if (valRadio3==true) {
					$("#TongTien").html(valueRadio3+" VND");
					document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Gia" value="1200000" ><input type="hidden" name="CB" value = "Truoc"> <input type="hidden" name="TenHangVehidden" value="TSFly - Bussiness"><input type="hidden" name="Tenmaybayhidden" value="{{$tmb1s->TenMayBay}}">';
						
				} else {
					alert("NULL")
				}
			});
		});

		$(document).ready(function() {
			$("#Bussiness2").change(function(){
				var valRadio4 = document.getElementById('Bussiness2').checked;
				var valueRadio4 = document.getElementById('Bussiness2').value;
				if (valRadio4==true) {
					$("#TongTien").html(valueRadio4+" VND");
					document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Gia" value="1200000" ><input type="hidden" name="CB" value="Sau" > <input type="hidden" name="TenHangVehidden" value="TSFly - Bussiness"><input type="hidden" name="Tenmaybayhidden" value="{{$tmb2s->TenMayBay}}">';
					
				} else {
					alert("NULL")
				}
			});
		});
	</script>
</body>
</html>