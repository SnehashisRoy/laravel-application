

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
	  Admin Dashboard
	</div>

	<div class="topnav">
		<div class="toggle-bar"><i class="fas fa-bars"></i></div>

		<ul>
			<li><a href="/admin/dashboard/businesses">Businesses</a></li>
			<li><a href="/admin/dashboard/blogs">Blogs</a></li>
			<li><a href="/admin/dashboard/properties">Properties</a></li>
		</ul>

	</div>
	<div class="container">
		@if ($errors->any())
		    <div class="alert alert-danger" id="errors">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		@if (session('status'))
		    <div class="alert alert-success" id="flash">
		        {{ session('status') }}
		    </div>
		@endif
		
	</div>
 
    @yield('content')

	
	
@yield('pagejs')


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$('#errors').fadeOut(10000);
	$('#flash').fadeOut(10000);
</script>
</body>
</html>

