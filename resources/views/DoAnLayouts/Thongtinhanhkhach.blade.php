<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thông tin hành khác | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/Thongtinhanhkhach.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
</head>
<body style="background: #EDF3F7;">
	{{-- <h1>Thông tin nhận được</h1>
	{{$Giatiensend}} //Giá tiền của chuyến <OK>
	<br>
	@foreach( $Chuyenbaysend as $rows)
		{{$rows->MaChuyenBay}} Mã chuyến bay<br>   
		{{$rows->MaMayBay}}Mã Máy Bay<br>
		{{$rows->MaTuyenBay}}Mã Tuyến Bay<br>
		{{$rows->NgayDi}}		  //Ngày đi<br> <OK>
		{{$rows->NgayDen}}	  //Ngày đến<br>	<OK>
		{{$rows->ThoiGianDi}}	  //Giờ đi<br>	<OK>
		{{$rows->ThoiGianDen}}    //Giờ đến<br>	<OK>
	@endforeach
		<br>
		{{$Tenmaybaysend}} Tên máy bay <br><OK>
		{{$Tenhangvesend}}  Hạng vé <br><OK>
		{{$Loaisend}} Loại(1 khứ hồi | 2 một chiều) <br><OK>
		{{$Noidisend}}    // Nơi đi<OK>
		{{$Noidensend}}   //Nơi đến<OK>
	<h1>End</h1> --}}
	
	{{-- Gửi tất cả các thông tin trên qua cho trang dịch vụ bổ sung --}}
	@include('DoAnLayouts.HeaderForChonThoiGian')
	<br>
	<ol id="ol-groups">
		<li class="li">Chuyến bay</li>
		<li class="li-active" >Thông tin hành khách</li>
		<li class="li" >Dịch vụ bổ sung</li>
		<li class="li">Thanh toán</li>
	</ol>

	<div id="info-gr">
		<div class="info">
		<form action="{{route('Dichvubosung')}}" method="post" id="form">
			{{ csrf_field() }}
			@foreach( $Chuyenbaysend as $rows)
			@endforeach
			<input type="hidden" name="Machuyenbayhidden" value="{{$rows->MaChuyenBay}}">
			<input type="hidden" name="Loaihidden" value="{{$Loaisend}}">
			<input type="hidden" name="Tenhangvehidden" value="{{$Tenhangvesend}}">
			<input type="hidden" name="Tenmaybayhidden" value="{{$Tenmaybaysend}}">
			<input type="hidden" name="Ngaydihidden" value="{{$rows->NgayDi}}">
			<input type="hidden" name="Ngaydenhidden" value="{{$rows->NgayDen}}">
			<input type="hidden" name="Thoigiandihidden" value="{{$rows->ThoiGianDi}}">
			<input type="hidden" name="Thoigiandenhidden" value="{{$rows->ThoiGianDen}}">
			<input type="hidden" name="Noidihidden" value="{{$Noidisend}}">
			<input type="hidden" name="Noidenhidden" value="{{$Noidensend}}">
			<input type="hidden" name="Giatienhidden" value="{{$Giatiensend}}">
			<h2 class="h2">
			<span>🙋‍♀️</span>
			<span>Ai sẽ bay</span>
		    <p>Thông tin hành khách của bạn</p>
			</h2>
			<table>
				    <caption>Hành khách</caption>
					<tr>
						<td style="width: 379px;"><label forname="Tendemvaten">Tên đệm và tên</label></td>
						<td style="width: 379px;"><label forname="Ho">Họ</label></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="text" id="Tendemvaten" name="Tendemvaten" placeholder="Tên đệm và họ"></td>
						<td><input style="width: 250px;" type="text" id="Ho" name="Ho" placeholder="Họ"></td>
					</tr>
					<tr>
						<td colspan="3"><p>Vui lòng điền đầy đủ giấy tờ tùy thân</p></td>
					</tr>
					<tr>
						<td><label forname="Ngaysinh">Ngày sinh</label></td>
						<td><label forname="Quoctich">Quốc tịch</label></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="date" id="Ngaysinh" name="Ngaysinh" placeholder="Ngày sinh"></td>
						<td><input style="width: 250px;" type="text" id="Quoctich" name="Quoctich" placeholder="Quốc tịch"></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="text" id="CMND" name="CMND" placeholder="CMND"></td>
					</tr>
				
			</table>
			<br><br><br>
		<h2 class="h2">
			<span>🙋‍♀️</span>
			<span>Ai đặt vé</span>
		    <p>Thông tin liên hệ với bạn</p>
		</h2>
			<table>
				    <caption>Thông tin liên hệ</caption>
					<tr>
						<td><label forname="Tendemvaten">Tên đệm và tên</label></td>
						<td><label forname="Ho">Họ</label></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="text" id="TendemvatenLH" name="TendemvatenLH" placeholder="Tên đệm và họ"></td>
						<td><input style="width: 250px;" type="text" id="HoLH" name="HoLH" placeholder="Họ"></td>
					</tr>
					<tr>
						<td colspan="3"><p>Vui lòng điền đầy đủ giấy tờ tùy thân</p></td>
					</tr>
					<tr>
						<td><label forname="Email">Email</label></td>
						<td><label forname="Sodienthoai">Số điện thoại</label></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="email" id="emailLH" name="EmailLH" placeholder="Email"></td>
						<td><input style="width: 250px;" type="number" id="SodienthoaiLH" name="SodienthoaiLH" placeholder="Số điện thoại"></td>
					</tr>
					<tr>
						<td colspan="3"><p><b>Lưu ý:</b> Vui lòng thông tin chính xác, TSFly sẽ sử dụng để liên lạc với Quý khách trong trường hợp cần thiết </p></td>
					</tr>
					<tr>
						<td><label forname="TenduongLH">Tên đường</label></td>
						<td><label forname="ThanhphoLH">Thành phố</label></td>
					</tr>
					<tr>
						<td><input style="width: 250px;" type="text" id="TenduongLH" name="TenduongLH" placeholder="Tên đường"></td>
						<td><input style="width: 250px;" type="text" id="ThanhphoLH" name="ThanhphoLH" placeholder="Thành phố"></td>
					</tr>
				
			</table>

			<input type="submit" style="font-family: urw-din,Arial,sans-serif;margin-top:10px;margin-left:100px;	height: 70px;width: 220px;font-size:25px;background-color: Green;color: #fff;"  value="Tiếp tục">
		</form>
		</div>

		<div class="info"  style="margin-top: 0px; width: 200px; height: 200px;position:fixed;">
			
			<table id="table-p" >
					<tr>
						<td colspan="2">
							<div class="owl-carousel owl-theme">
								<div class="item" >
									 <img src="{{asset('img/DN.jpg')}}"  alt="" width="200px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item" >
									 <img src="{{asset('img/HCM.jpg')}}"  alt="" width="200px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item" >
									 <img src="{{asset('img/HN.jpg')}}"  alt="" width="200px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;">{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								<div class="item">
									 <img src="{{asset('img/Hue.jpg')}}"  alt="" width="200px"height="200px">
									 <div style="text-align: center;font-size: 17px;font-weight: bold;" >{{$Noidisend}} đến {{$Noidensend}}</div>
								</div>
								
							</div>
						</td>
					</tr>
					<tr style="width: 200px; height: 30px;">
						<td style="width: 200px;font-weight: bold;">Tổng thanh toán:</td>
						<td style="width: 200px; color: green; font-weight: bold;">{!!$Giatiensend!!} VND</td>
					</tr>
			</table>

		</div>
	</div>

	<div style="font-size:  1000px;"><br></div>
	
	@include('DoAnLayouts.Footer')












	<script>
		$('form').submit(function() {
			var Ten = document.getElementById('Tendemvaten').value;
			var Ho = document.getElementById('Ho').value;
			var TenLH = document.getElementById('TendemvatenLH').value;
			var HoLH = document.getElementById('HoLH').value;
			var Ngsinh = document.getElementById('Ngaysinh').value;
			var QT = document.getElementById('Quoctich').value;
			var CMND = document.getElementById('CMND').value;
			var email = document.getElementById('emailLH').value;
			var sdt =document.getElementById('SodienthoaiLH').value;
			var duong = document.getElementById('TenduongLH').value;
			var tp = document.getElementById('ThanhphoLH').value;
			var check=0;
			if(Ten!=""){
				if (Ho!="") {
					if (Ngsinh!="") {
						if (QT!="") {
							if (CMND!="") {
								if (TenLH!="") {
									if (HoLH!="") {
										if (email!="") {
											if (sdt!="") {
												if (duong!="") {
													if (tp!="") {
														check=1;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
			if (check==0) {
				alert("Vui lòng nhập đầy đủ thông tin!");
				return false;
			}
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