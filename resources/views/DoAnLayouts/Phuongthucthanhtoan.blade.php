<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Phương thức thanh toán | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/QuyDinh.css')}}">
</head>
<body>
	@include('DoAnLayouts.Header')
	<br><br>
	<img src="{{asset('img/Thanhtoan.jpg')}}" alt="" width="100%" height="400px">
	<div  class="Container">
		<h3 id="h3" style="color: black; font-weight: normal;">
			<i>Với TSFly, quý khách có thể lựa chọn hình thức thanh toán yêu thích một cách dễ dàng.<br> <font color="#093163"><b>Thanh toán trả trước</b></font> hay <font color="#093163"><b>trả sau</b></font> phụ thuộc vào điều kiện áp dụng của từng loại vé.</i>
		</h3>
		<p>– Đối với hạng vé TSFly Eco: Khách hàng vui lòng thanh toán sau 24h kể từ ngày đặt vé.</p>
		<p>– Đối với hạng vé TSFly Business: Khách hàng có thể lựa chọn thời gian và phương thức thanh toán.</p>
		<table>
			<tr>
				<th width="300px" style="text-align: center;"><img src="{{asset('img/TSFly.png')}}" alt="" width="100px" height="100px"></th>
				<th style="background-color: green;text-align: center;color:white;" width="300px">TSFly Eco</th>
				<th style="background-color: blue;text-align: center;color:white;" width="300px">TSFly Bussiness</th>
			</tr>
			<tr>
				<th width="300px" style="text-align: center;">Thanh toán sau 24h</th>
				<th width="300px" style="text-align: center;">√</th>
				<th width="300px" style="text-align: center;">√</th>
			</tr>
			<tr>
				<th width="300px" style="text-align: center;">Lựa chọn thời gian thanh toán</th>
				<th width="300px" style="text-align: center;"></th>
				<th width="300px" style="text-align: center;">√</th>
			</tr>
		</table>
		<h3 id="h3">Các loại thẻ nội địa:</h3>
		<img src="{{asset('img/ATM.png')}}" alt="" width="100%">
		<h3 id="h3">Các loại thẻ quốc tế:</h3>
		<img src="{{asset('img/TheQT.jpg')}}" alt="" width="100%">

	</div>
	@include('DoAnLayouts.Footer')
</body>
</html>