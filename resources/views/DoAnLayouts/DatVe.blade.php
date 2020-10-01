<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TSFly - Hơn cả một chuyến bay</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	@include('DoAnLayouts.Header')
	<div class="HinhAnhBanner">
	</div> 
	<br>
	

{{--Form --}}
	<form action="{{route('Chonthoigian')}}" method="post" id="form" >
	  {{ csrf_field() }}

	<table>
		<tr>
			<th>Nơi đi</th>
			<th>Nơi đến</th>
		</tr>
		<tr>
			<td>
				<input type="text" name="NoiDi" class="inputdulieu" list="NoiDi" id="getNoiDi" placeholder="Khởi hành"/>
			</td>
			<td>
				<input type="text" name="NoiDen" class="inputdulieu" list="NoiDen" id="getNoiDen" placeholder="Tất cả các điểm đến">
			</td>
			<tr>
				<td>
					<datalist id="NoiDi">
						 @foreach($noidip as $nd)
							<option value="{{$nd->MaSanBay}}"> {{$nd->TenSanBay}} </option>
						@endforeach 
					</datalist>
				</td>
				<td>
					<datalist id="NoiDen">
						 @foreach($noidenp as $nde)
							<option value="{{$nde->MaSanBay}}"> {{$nde->TenSanBay}} </option>
						@endforeach 
					</datalist>
				</td>
			</tr>
			

		</tr>
	</table>


	<br><br><br><br><br><br><br><br>

	<div id="btn-group" onclick="loaiChuyenBay()">
		<input type="button" id="khuhoi" class="btn active" value="Khứ hồi" onclick="KhuHoi()">
		<input type="button" id="motchieu" class="btn" value="Một Chiều" onclick="MotChieu()">
	</div>
	<br><br><br><br>
	<table>
		    <tr>
				<th>Ngày đi</th>
				<th id="LichVeth">Ngày về </th>
			</tr>
			<tr>
				<td id="tdlichdi">
					<input name="Lichdi" class="inputdulieu" type="date" min="2020-01-01" max="2020-01-08">
				</td>
				<td id="LichVe">
					<input name="Lichve1" class="inputdulieu" type="date" max="2020-01-08" min="2020-01-01">
				</td>
			</tr>
			
	</table>
	<input type="submit" class="Timcb" value="Tìm chuyến bay">		
	

</form>
{{-- EndForm --}}
<br><br><br><br>
@include('DoAnLayouts.Footer')





















<script>


	function loaiChuyenBay(){
	var btnContainer=document.getElementById("btn-group");
	var button=btnContainer.getElementsByClassName("btn");
	//var lichve=document.getElementByClassName("LichVe");
	for(var i=0;i<button.length;i++){

	        button[i].addEventListener("click", function(){
	 		var current=document.getElementsByClassName("active");

	 		current[0].className=current[0].className.replace(" active","");
			
	 		this.className+=" active";
	 		
	 	});
	
		}
	}

	

	var loaichuyenbay = 1;


	function MotChieu(){
		
		document.getElementById("LichVe").style.display="none";
		document.getElementById("LichVeth").style.display="none";
		// var date = $("input[name='Lichdi']").val();		
		// alert(date);
		var button1chieu = document.getElementById("motchieu");
		var buttonkhuhoi = document.getElementById("khuhoi");
		var tdlichdi = document.getElementById('tdlichdi');
		var tdlichve = document.getElementById('LichVe');
		
		tdlichdi.innerHTML='<input name="Lichdi" class="inputdulieu"  type="date" max="2020-01-08" min="2020-01-01">';
		tdlichve.innerHTML='<input name="Lichve1" class="inputdulieu"  type="date" max="2020-01-08" min="2020-01-01">';	
		
		loaichuyenbay=2;

	}
	function KhuHoi(){
		document.getElementById("LichVe").style.display= "block";
		document.getElementById("LichVeth").style.display= "block";
		var button1chieu = document.getElementById("motchieu");
		var buttonkhuhoi = document.getElementById("khuhoi");
		var tdlichdi = document.getElementById('tdlichdi');
		var tdlichve = document.getElementById('LichVe');
	
		tdlichdi.innerHTML='<input name="Lichdi" class="inputdulieu"  type="date" max="2020-01-08" min="2020-01-01">';
		tdlichve.innerHTML='<input name="Lichve1" class="inputdulieu"  type="date" max="2020-01-08" min="2020-01-01">';	
		loaichuyenbay=1;
		
	}

	$('form').submit(function() {
		
		var checkid=0;
		var chkNoiDen = $("input[name='NoiDen']").val();		
		var chkNoiDi = $("input[name='NoiDi']").val();	
		var chkngaydi = $("input[name='Lichdi'").val();
		var chkngayve = $("input[name='Lichve1'").val();
		@foreach($noidenp as $nde)
			if (chkNoiDen == "{{$nde->MaSanBay}}") {
				@foreach($noidip as $nd)
					if (chkNoiDi == "{{$nd->MaSanBay}}") {
						if(loaichuyenbay==2){
							if (chkngaydi!="")
								{
									checkid=1;	
								}
							else{
								alert("Chưa nhập ngày đi!!!");
								return false;
							}
						}
						else{
							if (chkngaydi!="")
								{
									if(chkngayve!=""){
										if(chkngaydi<chkngayve){
											checkid=1;
											
										}
										else{
											alert("Ngày về phải lớn hơn ngày đi");
											return false;
										}
									}
									else{
										alert("Chưa nhập ngày về!!!");
										return false;	
									}
								}
								else{
									alert("Chưa nhập ngày đi!!!");
									return false;
								}
							}
						}

						
				@endforeach 
			}
			
		@endforeach 
		if(chkNoiDi==""){
			alert("Chưa nhập nơi đi");
			return false;
		}
		if (chkNoiDen=="") {
			alert("Chưa nhập nơi đến");
			return false;
		}	

		
		if (checkid == 0) {
			return false;
		}

	});

		
</script>


<script>
	$(document).ready(function(){

		$("#getNoiDi").change(function(){

			//----------Ajax
			var idNoiDi = $(this).val();
			if(idNoiDi!="")
			{
				$.get("ajax/noiden/"+idNoiDi,function(data){
					$("#NoiDen").html(data);
					
				});
			}	
			else
			{
				var idreset="ALL";
				$.get("ajax/reset/"+idreset,function(data){
					$("#NoiDen").html(data);
				});
			}

			//----------End Ajax
			//----------Check
			var checkid=0;	
			var chkNoiDi = $("input[name='NoiDi']").val();	
			@foreach($noidip as $nd)
				if (chkNoiDi == "{{$nd->MaSanBay}}") {
					checkid=1;
				}
			@endforeach 
			if (checkid == 0) {
				if(chkNoiDi!="")
				{
					alert("Nơi đi chưa chính xác!!!");
				}
			}
			//----------End Check
		});
	});
</script>

<script>
	$(document).ready(function(){
		
		$("#getNoiDen").change(function(){
			//----------Ajax
			var idNoiDen = $(this).val();
			if(idNoiDen!="")
			{
				$.get("ajax/noidi/"+idNoiDen,function(data){
				$("#NoiDi").html(data);
				});
			}
			else
			{
				var idreset="ALL";
				$.get("ajax/reset/"+idreset,function(data){
					$("#NoiDi").html(data);
				});
			}
			//----------End Ajax

			//----------Check
			var checkid=0;
			var chkNoiDen = $("input[name='NoiDen']").val();		
			@foreach($noidenp as $nde)
				if (chkNoiDen == "{{$nde->MaSanBay}}") {
					checkid=1;
				}
			@endforeach 
			if (checkid == 0) {
				if(chkNoiDen!="")
				{
					alert("Nơi đến chưa chính xác!!!");
				}
			}
			//----------End Check
		});
	});
</script>

</body>
</html>