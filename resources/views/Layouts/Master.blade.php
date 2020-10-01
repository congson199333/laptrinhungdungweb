<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Công Sơn</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	@include('Layouts.header')

	<div id="content">
		<h1>Công Sơn</h1>
		@yield('NoiDung')	
	</div>
	@include('Layouts.footer')
</body>
</html>