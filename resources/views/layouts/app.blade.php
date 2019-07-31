

<!DOCTYPE html>
<html>
<head>
	<title> @yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	 <link href="{{ url('/css/app.css') }}" rel="stylesheet">
	 <link href="{{ url('/css/custom.css') }}" rel="stylesheet">
	 <script src="{{ url('/js/app.js') }}"></script>

	 <!-- Global Site Tag (gtag.js) - Google Analytics -->
	 <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
	 <script>
	   window.dataLayer = window.dataLayer || [];
	   function gtag(){dataLayer.push(arguments);}
	   gtag('js', new Date());

	   gtag('config', 'UA-50398498-3');
	 </script>
	
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
			<li><a href="/">Home</a></li>
			<li><a href="/blogs">Blogs</a></li>
			<li><a href="/map-view">Rent a house</a></li>
			<li><a href="/">Community Businesses</a></li>
			<li><a href="/contact-us">Contact Us</a></li>
		</ul>

	</div>
	
	
 
    @yield('content')
  <!---footer-->
  <div class="row bgprimary white p-4 pl-5">

       
     <div class="col col-md-6 text-center">
       <ul class="business-list" style="list-style: none;">
         <li><a href="/contact-us" class="white"> Contact Us</a></li>
         <li><a href="/blogs" class="white"> Blogs</a></li>
         <li><a href="#" class="white"> Rent Your House</a></li>
         <li><a href="/list-view" class="white"> Rent A House</a></li>
         <li><a href="/list-city" class="white"> Rent A House In Your City</a></li>
         
         
       </ul>
     </div>
     <div class="col col-md-6 social text-center">

       <a href="https://www.facebook.com/banglatoronto.ca" class="white"><i class="fab fa-facebook fa-2x"></i></a>
       <a href="https://www.pinterest.ca/banglatoronto/" class="white"><i class="fab fa-pinterest fa-2x"></i></a>
       <a href="https://twitter.com/banglatorontoCa" class="white"><i class="fab fa-twitter fa-2x"></i></a>


     </div>


    
  </div>
  <!---end footer-->
  <div class="text-center primary bold p-2">
    This site is developed, managed and marketed by Web360. For your web solutions , please contact at 647745840.
  </div>

 </div>

	
	
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

