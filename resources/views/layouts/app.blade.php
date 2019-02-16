

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	 <link href="{{ url('/css/app.css') }}" rel="stylesheet">
	 <link href="{{ url('/css/custom.css') }}" rel="stylesheet">
	 <script src="{{ url('/js/app.js') }}"></script>
	
	@yield('vendorcss')


	
	@yield('vendorjs')


	
</head>
<body>
	<div class="bgprimary text-center white" style=" padding: 20px 0; letter-spacing: 3px;font-weight: bold;font-size: 150%;">BanglaToronto
	</div>

	<div class="topnav">
		<div class="toggle-bar"><i class="fas fa-bars"></i></div>

		<ul>
			<li>Blogs</li>
			<li>Blogs</li>
			<li>Blogs</li>
			<li>Blogs</li>
			<li>Blogs</li>
		</ul>

	</div>
	
	
 
    @yield('content')

	
	
@yield('pagejs')
<script type="text/javascript">
	var bar = document.querySelector(".toggle-bar");
	var nav = document.querySelector(".topnav ul");

	bar.addEventListener('click', function(){
		console.log(nav.style.display);
		if(nav.style.display == ''){
			nav.style.display = 'block';

		}else{
			nav.style.display = '';
		};
	});
</script>
</body>
</html>

