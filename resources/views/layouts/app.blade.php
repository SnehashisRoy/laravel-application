

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	 <link href="{{ url('/css/app.css') }}" rel="stylesheet">
	 <script src="{{ url('/js/app.js') }}"></script>
	
	@yield('vendorcss');


	
	@yield('vendorjs');


	
</head>
<body>

	     <div class="container">
	            @yield('content')
	      </div>

	
	
@yield('pagejs');
</body>
</html>

