<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login | TSFly Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body style="background-image: url({{asset('img/db.jpg')}});">
	{{-- @foreach($Taikhoandangnhapsend as $tkdn)
		{{$tkdn->Username}}<br>
		{{$tkdn->Password}}<br>
		{{$tkdn->LoaiTK}}<br>
	@endforeach --}}
	{{-- @foreach($Taikhoandangnhapsend as $tkdn)
	@endforeach --}}

	@include('DoAnLayouts.HeaderForChonThoiGian')
		
	<form action="{{route('PostDangNhap')}}" method="post" id="form">
		{{ csrf_field() }}
		<table style="background-color: white;margin: 0 auto; color: black; margin-top: 50px;width: 500px; height: 180px; border-radius: 5px;border-collapse: collapse; border:2px solid black;">
			<tr>
				<th colspan="2" style="font-size: 25px;width:250px;height: 30px; text-align: center;padding-bottom: 20px; padding-top: 20px;">ADMIN LOGIN</th>
			</tr>
			<tr>
				<th style="font-size: 23px;text-align: left;width:250px;height: 30px;">Tên đăng nhập:</th>
				<td><input id="Username" style="width: 250px;height: 30px;" type="text" name="Tendangnhap" autofocus="true"></td>
			</tr>
			<tr>
				<th style="font-size: 23px; text-align: left;width:250px;height: 30px;">Mật khẩu:</th>
				<td style="width:250px;height: 30px;"><input id="Password" style="width: 250px;height: 30px;" type="password" name="Matkhau"></td>
			</tr>
			<tr>
				<td colspan="2" style="width:250px;height: 50px;"><input type="submit" value="Đăng nhập" style="background-color: #184785;color: white;font-size: 16px;width: 250px;height: 50px;margin-left: 111px;"></td>
			</tr>
		</table>
	</form>

	@if(session('ThongBao'))
		<div style="margin: 0 auto;text-align: center;margin-top: 10px;width: 500px;height: 50x; border-radius: 5px;background-color: red; color: white; line-height: 50px;font-family: urw-din,Arial,sans-serif;">
			{{session('ThongBao')}}	
		</div>
	@endif




<script>
	$('#form').submit(function() {
		var checkid=0;
		var Username = $("input[id='Username']").val();		
		var Password = $("input[id='Password']").val();	
		if(Username==""){
			alert('Chưa nhập tên tài khoản!');
			return false;
		}
		else {if(Password==""){
			alert('Chưa nhập password');
			return false;
			}
		}
	});
</script>
</body>
</html>