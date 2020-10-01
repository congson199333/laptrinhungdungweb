<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body style="background-image: url('{{asset('img/db.jpg')}}')">
	<header>
		<a href="./DatVe">
				<img src="{{asset('img/TSFly.png')}}"alt="Logo" width="124px" height="124px" style="vertical-align: -86px;">
		</a><font style="    font-size: 4.8rem; font-family:Bahnschrift SemiCondensed; margin-left: 200px;vertical-align: -67px; color: #fafafa;">TSFly - Hơn cả một chuyến bay</font>
	</header><!-- /header -->
	<table width="100%">
		<tr>
			<th><button type="button" id="bt1" class="button" style="width:250px;background-color: #184785;">Xem chuyến bay</button></th>
			<th><button type="button" id="bt2" class="button" style="width:250px;background-color: #184785;">Thêm chuyến bay</button></th>
			<th><button type="button" id="bt3" class="button" style="width:250px;background-color: #184785;">Sửa chuyến bay</button></th>
			<th><button type="button" id="bt4" class="button" style="width:250px;background-color: #184785;">Xóa chuyến bay</button></th>
			<th><a href="DangNhap"><button type="button" id="bt3" class="button" style="width:250px;background-color: #184785;">Đăng xuất</button></a></th>
		</tr>
	</table>
	<br>
	<div id= "off">
		
	
		@if(session('Thongbao'))
			<div style="margin: 0 auto;text-align: center;margin-top: 10px;width: 500px;height: 50x; border-radius: 5px;background-color: red; color: white; line-height: 50px;font-family: urw-din,Arial,sans-serif;">
				{{session('Thongbao')}}	
			</div>@endif
	</div>
	
	<form action="{{route('Save')}}" method="post" id ="form1">       
                {{ csrf_field() }}

	
		<div id="view1">
		
		</div>	

	</form>

	<div id="view2">   {{-- hiển thị tìm sửa --}}
		
	</div>
	<div id="buttonupdate" style="margin-left: 528px;margin-top: 20px; margin-bottom: 20px;">
		
	</div>


	<form action="{{route('Update')}}" method="post" id="form2">
		{{ csrf_field() }}

		<div id="viewsearchupdate">
			
		</div>
	</form>

	<div id="view3"> {{-- hiển thị tìm xóa --}}
			
	</div>
	


	<div id="buttonsearch" style="margin-left: 528px;margin-top: 20px;">
		
	</div>

	
		<form style="margin-top: 20px;" action="{{route('Delete')}}" method="post" id="formxoa">
			{{ csrf_field() }}
			<div id="viewsearch"></div>
		</form>
		
	<div id= "off1">
		
	
		@if(session('ThongBaoXoaThanhCong'))
			<div style="margin: 0 auto;text-align: center;margin-top: 10px;width: 500px;height: 50x; border-radius: 5px;background-color: red; color: white; line-height: 50px;font-family: urw-din,Arial,sans-serif;">
				{{session('ThongBaoXoaThanhCong')}}	
			</div>@endif
	</div>

	<div id= "off3">
		
	
		@if(session('ThongBaoSuaThanhCong'))
			<div style="margin: 0 auto;text-align: center;margin-top: 10px;width: 500px;height: 50x; border-radius: 5px;background-color: red; color: white; line-height: 50px;font-family: urw-din,Arial,sans-serif;">
				{{session('ThongBaoSuaThanhCong')}}	
			</div>@endif
	</div>
	




	<script>
		$(document).ready(function(){
			
			$("#bt1").click(function(){
				document.getElementById('off').innerHTML = "<span></span>";
				document.getElementById('view3').innerHTML = "<span></span>";
				document.getElementById('view2').innerHTML = "<span></span>";
				document.getElementById('buttonsearch').innerHTML = "<span></span>";
				document.getElementById('viewsearch').innerHTML = "<span></span>";
				document.getElementById('off1').innerHTML = "<span></span>";
				document.getElementById('buttonupdate').innerHTML = "<span></span>";
				document.getElementById('viewsearchupdate').innerHTML = "<span></span>";
				document.getElementById('off3').innerHTML = "<span></span>";
				$.get("ajax/xem",function(data){
					$("#view1").html(data);
					// alert(data);

				});
			});
			$("#bt2").click(function(){
				document.getElementById('off').innerHTML = "<span></span>";
				document.getElementById('view3').innerHTML = "<span></span>";
				document.getElementById('view2').innerHTML = "<span></span>";
				document.getElementById('viewsearch').innerHTML = "<span></span>";
				document.getElementById('buttonsearch').innerHTML = "<span></span>";
				document.getElementById('off1').innerHTML = "<span></span>";
				document.getElementById('buttonupdate').innerHTML = "<span></span>";
				document.getElementById('viewsearchupdate').innerHTML = "<span></span>";
				document.getElementById('off3').innerHTML = "<span></span>";
				$.get("ajax/them",function(data){
					$("#view1").html(data);
				});
			});
			$("#bt3").click(function(){
				document.getElementById('off').innerHTML = "<span></span>";
				document.getElementById('view3').innerHTML = "<span></span>";
				document.getElementById('view1').innerHTML = "<span></span>";
				document.getElementById('buttonsearch').innerHTML = "<span></span>";
				document.getElementById('viewsearch').innerHTML = "<span></span>";
				document.getElementById('off1').innerHTML = "<span></span>";
				document.getElementById('viewsearchupdate').innerHTML = "<span></span>";
				document.getElementById('off3').innerHTML = "<span></span>";
				$.get("ajax/sua",function(data){
					$("#view2").html(data);
					document.getElementById('buttonupdate').innerHTML = '<button type="button" name="bttimsua" id="bttimsua" onclick="TimCBsua()" style="width:200px; height:50px; color:white; background-color:#184785;">Tìm</button>';
				});
			});

			$("#bt4").click(function(){
				document.getElementById('off').innerHTML = "<span></span>";
				document.getElementById('view2').innerHTML = "<span></span>";
				document.getElementById('view1').innerHTML = "<span></span>";
				document.getElementById('buttonupdate').innerHTML = "<span></span>";
				document.getElementById('viewsearch').innerHTML = "<span></span>";
				document.getElementById('viewsearchupdate').innerHTML = "<span></span>";
				document.getElementById('off3').innerHTML = "<span></span>";
				$.get("ajax/xoa",function(data){
					$("#view3").html(data);
					document.getElementById('buttonsearch').innerHTML = '<button type="button" name="bttimxoa" id="bttimxoa" onclick="TimCBxoa()" style="width:200px; height:50px; color:white; background-color:#184785;">Tìm</button>';
				});
			});
		});
	</script>

	<script>
		function TimCBxoa(){
					var temp = document.getElementById('machuyenbayxoa').value;
					$.get("ajax/tim/"+temp,function(data){
						 $("#viewsearch").html(data);
						
					});
				}
		function TimCBsua(){
					var temp = document.getElementById('machuyenbayxoa').value;
					$.get("ajax/timsua/"+temp,function(data){
						 $("#viewsearchupdate").html(data);
						
					});
				}
	</script>
</body>
</html>