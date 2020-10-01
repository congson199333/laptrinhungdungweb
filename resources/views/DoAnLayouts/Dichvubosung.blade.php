<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dịch vụ bổ sung | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/Dichvubosung.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
</head>
<body style="background: #EDF3F7;">
	{{--  <h1>Thông tin nhận được</h1>
	{{$Giatiensend}}
	<br> 
	============================================================
	//Thông tin hành khách
	{{$Tendemvatensend}} <br>
	{{$Hosend}} <br>
	{{$Ngaysinhsend}} <br>
	{{$Quoctichsend}} <br><br><br><br>
	{{$TendemvatenLHsend}} <br>
	{{$HoLHsend}} <br>
	{{$EmailLHsend}} <br>
	{{$SodienthoaiLHsend}} <br>
	{{$TenduongLHsend}} <br>
	{{$ThanhphoLHsend}} <br>
	//End Thông tin hành khách
	============================================================
	{{$Noidisend}} - {{$Noidensend}}
	{{$Thoigiandisend}} - {{$Thoigiandensend}}<br>
	Ngày {{$Ngaydisend}} đến ngày {{$Ngaydensend}}<br>
	{{$Tenmaybaysend}} Tên máy bay <br><OK>
	{{$Tenhangvesend}}  Hạng vé <br><OK>
	{{$Loaisend}} Loại(1 khứ hồi | 2 một chiều) <br><OK>
	@foreach($Chuyenbaysend as $cbs)
	@endforeach
	{{$cbs->MaChuyenBay}}
	{{$cbs->MaTuyenBay}}
	{{$cbs->NgayDi}}
	{{$cbs->NgayDen}}
	{{$cbs->MaMayBay}}
	<h1>End</h1> --}}
	

	{{-- Thiếu hạng vé, Mã(Tên) Máy bay, Giá tiền dịch vụ(Mua thêm hành lý) --}}
	{{-- Gửi tất cả các thông tin trên qua cho Thanh toán --}}
	@include('DoAnLayouts.HeaderForChonThoiGian')
	<br>
	<ol id="ol-groups">
		<li class="li">Chuyến bay</li>
		<li class="li" >Thông tin hành khách</li>
		<li class="li-active" >Dịch vụ bổ sung</li>
		<li class="li">Thanh toán</li>
	</ol>
<br><br><br>


<div id="info-gr">
<div class="info" style="width: 873px;height: 1000px;">
	<form action="{{route('Thanhtoan')}}" method="post" id="form">
		{{ csrf_field() }}
	@foreach($Chuyenbaysend as $cbs)
	@endforeach
	<input type="hidden" name="Machuyenbayhidden" value="{{$cbs->MaChuyenBay}}">
	<input type="hidden" name="Giagochidden" value="{{$Giatiensend}}">
	<input type="hidden" name="Ngaykhoihanhhidden" value="{{$Ngaydisend}}">
	<input type="hidden" name="Ngaydenhidden" value="{{$Ngaydensend}}">
	<input type="hidden" name="Noidihidden" value="{{$Noidisend}}">
	<input type="hidden" name="Noidenhidden" value="{{$Noidensend}}">
	<input type="hidden" name="Thoigiandihidden" value="{{$Thoigiandisend}}">
	<input type="hidden" name="Thoigiandenhidden" value="{{$Thoigiandensend}}">
	<input type="hidden" name="Tenhangvehidden" value="{{$Tenhangvesend}}">
	<input type="hidden" name="Loaihidden" value="{{$Loaisend}}">
	<input type="hidden" name="Tenmaybayhidden" value="{{$Tenmaybaysend}}">
	{{-- Send thông tin hành khách --}}
	<input type="hidden" name="Tendemvatenhidden" value="{{$Tendemvatensend}}">
	<input type="hidden" name="Hohidden" value="{{$Hosend}}">
	<input type="hidden" name="Ngaysinhhidden" value="{{$Ngaysinhsend}}">
	<input type="hidden" name="Quoctichhidden" value="{{$Quoctichsend}}">
	<input type="hidden" name="TendemvatenLHhidden" value="{{$TendemvatenLHsend}}">
	<input type="hidden" name="HoLHhidden" value="{{$HoLHsend}}">
	<input type="hidden" name="EmailLHhidden" value="{{$EmailLHsend}}">
	<input type="hidden" name="SodienthoaiLHhidden" value="{{$SodienthoaiLHsend}}">
	<input type="hidden" name="TenduongLHhidden" value="{{$TenduongLHsend}}">
	<input type="hidden" name="ThanhphoLHhidden" value="{{$ThanhphoLHsend}}">
	<input type="hidden" name="CMNDhidden" value="{{$CMNDsend}}">
	{{-- ========================================== --}}

	<div id="hiddenidGia">
		<input type="hidden" name="Giahanhly" value="0" >
		<input type="hidden" name="Tenloaihanhlyhidden" value="30kg">
	</div>
	

	<table border="0" style="width: 850px;height: 200px;">
		<tr>
			<th style=" font-size: 14px;width: 274px;"><span style=" margin-left: 10px;">Thêm hành lý</span></th>
			<th style=" font-size: 14px;width:312px;">
				<ul style="width: 200px; margin-left: 41px; margin-right: -43px;">
					<li style="width: 200px;font-weight: normal">Tổng trọng lượng hiển thị đã bao gồm hành lý miễn cước</li>
					<li style="width: 200px;font-weight: normal">Tiết kiệm tới 80%</li>
					<li style="width: 200px;font-weight: normal">Tối đa 40 kg / người</li>
				</ul></th>
			<th style=" font-size: 14px;" colspan="3"><img src="{{asset('img/Hanhly.jpg')}}" alt="" width="200px" height="200px" style="margin-left: 20px"></th>
		</tr>
		<tr>
			<th style=" font-size: 14px;height: 75px"><span style=" margin-left: 10px;">{{$Noidisend}} ➤ {{$Noidensend}}</span></th>
			<th></th>
			<th style="text-align: center;">30kg</th>
			<th style="text-align: center;">35kg</th>
			<th style="text-align: center;">40kg</th>
		</tr>
		<tr>
			<th style=" font-size: 14px;height: 75px;"><span style=" margin-left: 10px;">{{$Hosend}} {{$Tendemvatensend}}</span></th>
			<th></th>
			<th style="text-align: center;font-size: 14px;">
				<input type="radio" id="radio1" name="radiomuathemhanhly" style="width: 20px; height: 20px;" value="0" checked="true">
				<br>
				Miễn phí
			</th>
			<th style="text-align: center;font-size: 14px;">
				<input type="radio" id="radio2" name="radiomuathemhanhly" style="width: 20px; height: 20px;"value="66000">
				<br>
				66,000VND

			</th>
			<th style="text-align: center;font-size: 14px;">
				<input type="radio" id="radio3" name="radiomuathemhanhly" style="width: 20px; height: 20px;" value="110000">
				<br>
				110,000VND
			</th>
		</tr>
	</table>


	<input type="submit" style="font-family: urw-din,Arial,sans-serif;margin-top:10px;margin-left:100px;	height: 70px;width: 220px;font-size:25px;background-color: Green;color: #fff;"  value="Tiếp tục">

	</form>
</div>











	<div class="info"  style="margin-left: 44px;margin-top: 0px; width: 150px; height: 200px;position:fixed;">
			
			<table id="table-p" >
					<tr>
						<td colspan="2">
							<div class="owl-carousel owl-theme">
								<div class="item" >
									 <img src="{{asset('img/DN.jpg')}}"  alt="" width="150px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item" >
									 <img src="{{asset('img/HCM.jpg')}}"  alt="" width="150px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item" >
									 <img src="{{asset('img/HN.jpg')}}"  alt="" width="150px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item">
									 <img src="{{asset('img/Hue.jpg')}}"  alt="" width="150px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;" >{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								
							</div>
						</td>
					</tr>
					<tr style="width: 150px; height: 30px;">
						<td style="width: 150px;font-weight: bold;">Tổng thanh toán:</td>
						<td style="width: 150px; color: green; font-weight: bold;"><span id="TongTien">{{$Giatiensend}} VND</span></td>
					</tr>
			</table>

		</div>
	</div>

	<div style="font-size:  500px;"><br></div>
	
	@include('DoAnLayouts.Footer')






















<script>
	$(document).ready(function() {
		$("#radio1").change(function(){
			var valRadio1 = document.getElementById('radio1').checked;
			var valueRadio1 = document.getElementById('radio1').value;
			var temp = Number(valueRadio1);
			if(valRadio1==true){
				var Tong = {{$Giatiensend}} + temp;
				$("#TongTien").html(Tong + " VND");
				document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Giahanhly" value="0" > <input type="hidden" name="Tenloaihanhlyhidden" value="30kg">';
			}
		});	
	});
	$(document).ready(function() {
		$("#radio2").change(function(){
			var valRadio2 = document.getElementById('radio2').checked;
			var valueRadio2 = document.getElementById('radio2').value;
			var temp = Number(valueRadio2);
			if(valRadio2==true){
				var Tong = {{$Giatiensend}} + temp;
				 $("#TongTien").html(Tong + " VND");
				document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Giahanhly" value="66000" > <input type="hidden" name="Tenloaihanhlyhidden" value="35kg">';
			}
		});	
	});
	$(document).ready(function() {
		$("#radio3").change(function(){
			var valRadio3 = document.getElementById('radio3').checked;
			var valueRadio3 = document.getElementById('radio3').value;
			var temp = Number(valueRadio3);
			if(valRadio3==true){
				var Tong = {{$Giatiensend}} + temp;
				$("#TongTien").html(Tong + " VND");
				document.getElementById('hiddenidGia').innerHTML = '<input type="hidden" name="Giahanhly" value="110000" > <input type="hidden" name="Tenloaihanhlyhidden" value="40kg">';
			}
		});	
	});

</script>






<script src="{{asset('OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('OwlCarousel2-2.3.4/dist/owl.carousel.js')}}"></script>
<script type="text/javascript">
	var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true
	});
	$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
	})
	$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
	})
</script>
</body>
</html>