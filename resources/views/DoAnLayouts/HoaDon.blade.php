<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vé đã đặt | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/Hoadon.css')}}">
</head>
<body style="background: #EDF3F7;">
	@include('DoAnLayouts.HeaderForChonThoiGian')
	<br>
	<div style="height:280px;background-color: yellow;">
		<div class="Thongbao">
			{{session('Thongbao2')}}
			<br>
			<table style="background-color: white;margin: 0 auto; color: black;">
				<tr>
					<th width="200px">Tên Khách hàng</th>
					<th width="20px">:</th>
					<th width="200px">{{session('Tenkhachhangsend')}}</th>
				</tr>
				<tr>
					<th width="200px">CMND</th>
					<th width="20px">:</th>
					<th width="200px">{{session('CMNDsend')}}</th>
				</tr>
				<tr>
					<th width="200px">Ngày đặt vé</th>
					<th width="20px">:</th>
					<th width="200px">{{session('Ngaydatvesend')}}</th>
				</tr>
				<tr>
					<th width="200px">Tổng tiền</th>
					<th width="20px">:</th>
					<th width="200px">{{session('Thanhtiensend')}} VND</th>
				</tr>
				<tr>
					<th colspan="3"style="text-align: center;">Thanh toán và nhận vé tại sân bay</th>
				</tr>
				<tr>
					<th colspan="3" style="font-size: 13px; text-align: center"><i>(Vui lòng mang CMND và thông tin đặt vé trên đến quầy thanh toán tại sân bay)</i></th>
				</tr>
			</table>
			<br>
			{{session('Thongbao3')}}
		</div>
	</div>
	<div style="margin: 0 auto;">
		<a href="DatVe"><button type="button">Về Trang Chủ</button></a>
	</div>
	
<div style="font-size:  30px;"><br></div>
	@include('DoAnLayouts.Footer')
</body>
</html>