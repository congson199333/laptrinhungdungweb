<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thanh toán | TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/Thanhtoan.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
</head>
<body style="background: #EDF3F7;">
	@include('DoAnLayouts.HeaderForChonThoiGian')
	<br>
	<ol id="ol-groups">
		<li class="li">Chuyến bay</li>
		<li class="li" >Thông tin hành khách</li>
		<li class="li" >Dịch vụ bổ sung</li>
		<li class="li-active">Thanh toán</li>
	</ol>
<br><br><br>
{{--  <h1>Thông tin nhận được từ form Dichvubosung</h1>
Giá vé: {{$Giagocsend}} <br>
Giá hành lý: {{$Giadichvusend}}<br>
@foreach($Chuyenbaysend as $cb)
@endforeach
{{$cb->MaChuyenBay}}
{{$cb->MaTuyenBay}}
<br>
{{$cb->NgayDi}}
{{$cb->NgayDen}}
<br>
{{$Thoigiandisend}}
{{$Thoigiandensend}}
<br>
{{$Ngaykhoihanhsend}}
{{$Ngaydensend}}
<br>
{{$Noidisend}}
{{$Noidensend}}
<br>
{{$Tenhangvesend}}
{{$Loaisend}}
<br>
{{$Tenmaybaysend}}
<br>
{{$Tendemvatensend}} 
{{$Hosend}}
{{$CMNDsend}}
<br>
{{$Ngaysinhsend}}
<br>
{{$Quoctichsend}}
<br>
{{$TendemvatenLHsend}} 
{{$HoLHsend}}
<br>
{{$EmailLHsend}}
<br>
{{$SodienthoaiLHsend}}
<br>
{{$TenduongLHsend}} {{$ThanhphoLHsend}}
<h1>End</h1>  --}}



<div id="info-gr">
	<div class="info" style="width: 873px;height: 100px;">
		<div class="divxemlaihanhtrinh">
			<table style="margin-left: 0px; background-color: #EDF3F7;">
				<tr>
					<th style="width: 70px;color: #33597C;"><font size="30px">☼</font></th>
					<th style="color: #33597C;font-weight: bold;">
						Xem lại hành trình <br>
						<span style="color: #33597C;font-weight: normal; font-size: 23px;">Hành trình
						</span>
					</th>
				</tr>
			</table>	
		</div>
		<div class="divkhungchuyenbay">
			<div class="chuyenbay"><span style="font-size: 30px;">&#9992;</span> Chuyến bay 
			</div> 
			<br>
			<div style="margin-left: 10px;height: 130px;">
				<span style="color: #33597C; font-weight: bold;">Ngày khởi hành </span><span style="color: #33597C; font-weight: bold;" id="Chiangay"></span> <br>
				<span style="margin-left: 0px; color: black; font-weight: bold;">{{$Thoigiandisend}}</span>
				<span style="margin-left: 50px;">{{$Noidisend}}</span>  	<br>
				<span style="margin-left: 0px; color: black; font-weight: bold;">{{$Thoigiandensend}}</span>
				<span style="margin-left: 50px;">{{$Noidensend}}</span>	<br>
				<span style="margin-left: 70px; color: #00305b">Tên máy bay: {{$Tenmaybaysend}}</span> 	<br>
				<span style="margin-left: 0px; color: #33597C;font-weight: bold;">Hạng vé đã chọn: {{$Tenhangvesend}}</span>	<br>
			</div>
		</div>
		<br><br>
		<div class="divkhungchuyenbay">
			<div class="chuyenbay"><span style="font-size: 30px;">&#9992;</span> Dịch vụ bổ sung 
			</div> 
			<br>
			<div style="margin-left: 10px;height: 130px;">
				
				@if($Tenloaihanhlysend == "30kg")
					<span style="color: #33597C; font-weight: bold;">Khối lượng hành lý: {{$Tenloaihanhlysend}}</span>
					<span style="margin-left: 50px;"> Cơ bản (Miễn phí)</span>
				@endif

				@if($Tenloaihanhlysend != "30kg")
					<span style="color: #33597C; font-weight: bold;">Khối lượng hành lý: {{$Tenloaihanhlysend}}</span>
					<span style="margin-left: 30px;">Giá: <font color="black"><b>{{$Giadichvusend}}</font> VND </b></span>
				@endif

			</div>
		</div>
		<br> <br>
		<div class="divxemlaihanhtrinh">
			<table style="margin-left: 0px; background-color: #EDF3F7;">
				<tr>
					<th style="width: 70px;color: #33597C;"><font size="30px">&#9992;</font></th>
					<th style="color: #33597C;font-weight: bold;">
						{{$Noidisend}} to {{$Noidensend}}
						<br>
						<span style="color: #33597C;font-weight: normal; font-size: 23px;">Ngày khởi hành
						</span>
					</th>
				</tr>
			</table>
		</div>
		@foreach($Masanbaydisend as $msbdi)
		@endforeach
		@foreach($Masanbaydensend as $msbden)
		@endforeach
		<div class="divkhungchuyenbay" style="width:400px; ">
			<div class="chuyenbay" style="width:400px; "><span style="font-size: 23px;">
				<span style="color: #fff; font-weight: normal;margin-left: 10px;" id="Chiangay1"></span>
			</div> 
			<br>
			<div style="margin-left: 10px;height: 250px;">
				<table style="margin-left: 0px;">
					<tr>
						<th style="text-align: center;" width="150px"><span style="text-align:center;margin-left: 0px; color: black; font-weight: bold;">{{$Thoigiandisend}}</span></th>
						<th style="text-align: center;" width="150px"><span style="text-align:center;margin-left: 0px; color: black; font-weight: bold;">{{$Thoigiandensend}}</span></th></th>
						<th style="text-align: center;" rowspan="2" width="100px"><span style="font-size:14px;margin-left: 0px; color: #33597C; font-weight: normal;">{{$Tenmaybaysend}}<br>
							</span>
							<span style="text-align:center;font-size:14px;margin-left: 0px; color: #33597C; font-weight: normal;">TSFly</span>
						</th>
					</tr>
					<tr>
						<th style="text-align: center;" width="150px"><span style="text-align:center;margin-left: 0px; color: black; font-weight: normal;font-size: 17px;color: #33597C;">{{$msbdi->MaSanBay}}</span></th>
						<th style="text-align: center;" width="150px"><span style="text-align:center;margin-left: 0px; color: black; font-weight: normal;font-size: 17px;color: #33597C;">{{$msbden->MaSanBay}}</span></th>
					</tr>
				</table>
				<br><br><br>
				<table style="margin-left: 0px; ">
					<tr>
						<th style="text-align: left;font-size: 17px; font-weight: normal;" width="200px">Giá vé</th>
						<th style="text-align: right;font-size: 17px; font-weight: normal;"width="200px">{{$Giagocsend}}</th>
					</tr>
					<tr>
						@if($Tenloaihanhlysend != "30kg" )
							<th style="text-align: left;font-size: 17px; font-weight: normal;"width="200px">Hành lý ký gửi</th>
							<th style="text-align: right;font-size: 17px; font-weight: normal;"width="200px">{{$Giadichvusend}}</th>
						@endif
					</tr>
				</table>
				<br><br><br><br><br>
			</div>
			<table style="margin-left: 0px;background: #33597C;">
					<tr>
						<th style="text-align: left;font-size: 17px; font-weight: normal; color: #fff;" width="200px">Tổng tiền </th>
						<th style="text-align: right;font-size: 17px; font-weight: normal; color: #fff;" width="200px">
							<span id="Tongtien"></span>
						</th>
					</tr>
			</table>
		</div>
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
						<td style="width: 150px; color: green; font-weight: bold;"><span id="TongTien"> </span><span> VND</span></td>
					</tr>
			</table>

		</div>

</div>
<form action="Insert" method="post">
	{{ csrf_field() }}
	@foreach($Chuyenbaysend as $cb)
	@endforeach

	{{-- Dữ liệu để insert --}}
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input type="hidden" name="CMNDhidden" value="{{$CMNDsend}}">
	<input type="hidden" name="EmailLHhidden" value="{{$EmailLHsend}}">
	<input type="hidden" name="SodienthoaiLHhidden" value="{{$SodienthoaiLHsend}}">
	<input type="hidden" name="Machuyenbayhidden" value="{{$cb->MaChuyenBay}}">
	<input type="hidden" name="Tenhangvehidden" value="{{$Tenhangvesend}}">
	<input type="hidden" name="Giagochidden" value="{{$Giagocsend}}">
	
	<div id="hidden">
		
	</div>
	{{-- Dữ liệu để insert --}}
	<input type="submit" style="margin-left: 100px;font-family: urw-din,Arial,sans-serif;margin-top:1000px;margin-right:200px;	height: 70px;width: 220px;font-size:25px;background-color: Green;color: #fff;"  value="Chấp nhận">
</form>



<div style="font-size:  1000px;"><br></div>
@include('DoAnLayouts.Footer')

<script>
	var temp1 = Number({{$Giagocsend}});
	var temp2 =  Number({{$Giadichvusend}});
	var temp3 = temp1+temp2;
		var temp = '{{$HoLHsend}} {{$TendemvatenLHsend}}' ;
		document.getElementById('hidden').innerHTML = '<input type = "hidden" name="Tenkhachhanghidden" value = "{{$HoLHsend}} {{$TendemvatenLHsend}}"><input type="hidden" name = "Thanhtienhidden" value ="'+temp3+'">';
</script>

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

		var test = stringToDate('{{$Ngaykhoihanhsend}}',"yyyy-mm-dd","-")
		
		var d = test.getDate();
		var m = test.getMonth()+1;
		var y = test.getFullYear();
		document.getElementById("Chiangay").innerHTML = d+" tháng "+m+" năm "+y;
		document.getElementById("Chiangay1").innerHTML = d+" tháng "+m+" năm "+y;
</script>
<script>
	var temp1 = Number({{$Giagocsend}});
	var temp2 =  Number({{$Giadichvusend}});
	var temp3 = temp1+temp2;
	document.getElementById('Tongtien').innerHTML =temp3;
	document.getElementById('TongTien').innerHTML =temp3;
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
