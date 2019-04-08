

<!DOCTYPE html>
<html>
<head>
	<title> BanglaToronto-@yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	 <link href="{{ url('/css/app.css') }}" rel="stylesheet">
	 <link href="{{ url('/css/custom.css') }}" rel="stylesheet">
	 <script src="{{ url('/js/app.js') }}"></script>
	
	@yield('vendorcss')


	
	@yield('vendorjs')


	
</head>
<body>
	<div class="bgprimary text-center white" >
		<div style=" padding: 10px 0 0 0; letter-spacing: 3px;font-weight: bold;font-size: 180%;"> BanglaToronto </div>
	</div>
	<div class=" bgprimary secondary text-center" style="font-style: italic;
													    letter-spacing: 4px;
													    padding: 0 0 10px;
													    font-weight: bold;"> 
	  Let's build a stronger community
	</div>

	<div class="topnav">
		<div class="toggle-bar"><i class="fas fa-bars"></i></div>

		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Blogs</a></li>
			<li id='click-contact-1'><a href="#">Contact Us</a></li>
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

