<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div style="width:100%;margin:0px auto; height:500px;margin-top: 100px;" align="center">
		<img src="{{asset('img/loading2.png')}}" width="500px" height="500px">
	</div> 
	<form action="{{route('Admin')}}" method="post" name="myForm" id="myForm">
		{{ csrf_field() }}
		<input type="hidden" name="usernamehidden" value="{{$Username}}">
		<input type="hidden" name="passwordhidden" value="{{$Password}}">
		<input type="submit" name="smbt" value="" style="background-color: white; border: none;">
	</form>
	
	
	<script type="text/javascript">
   		window.onload=function(){
        document.getElementById("myForm").submit();
    }
</script>
</body>
</html>