<!DOCTYPE html>
<html>
<head>
	<title>
		App Name - @yield('title')
	</title>
</head>
<body>

	@section('menubar')
		this is the master siderbar.
	@show

	<div class="container">
		@yield('content')
	</div>
	<div class="footer">
		@yield('footer')
	</div>
</body>
</html>