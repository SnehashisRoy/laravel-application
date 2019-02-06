

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	 <link href="{{ url('/css/app.css') }}" rel="stylesheet">
	 <link href="{{ url('/css/custom.css') }}" rel="stylesheet">
	 <script src="{{ url('/js/app.js') }}"></script>
	
	@yield('vendorcss');


	
	@yield('vendorjs');


	
</head>
<body>

	     <div class="container-fluid">
	            @yield('content')
	      </div>

	
	
@yield('pagejs');
</body>
</html>

