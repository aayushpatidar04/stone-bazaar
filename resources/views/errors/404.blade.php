
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stone Bazaar | 404 Error</title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/errors/404/css/style.css') }}"/>
</head>
<body>
	<div id="container" class="container">
		<ul id="scene" class="scene">
			<li class="layer" data-depth="1.00"><img src="{{ asset('assets/errors/404/images/404-01.png') }}"></li>
			<li class="layer" data-depth="0.60"><img src="{{ asset('assets/errors/404/images/shadows-01.png') }}"></li>
			<li class="layer" data-depth="0.20"><img src="{{ asset('assets/errors/404/images/monster-01.png') }}"></li>
			<li class="layer" data-depth="0.40"><img src="{{ asset('assets/errors/404/images/text-01.png') }}"></li>
			<li class="layer" data-depth="0.10"><img src="{{ asset('assets/errors/404/images/monster-eyes-01.png') }}"></li>
		</ul>
		
		<a href="{{ url()->previous() }}" class="btn">Go Back</a>
	</div>
	<footer style="text-align: center; padding: 20px 0; position: fixed; bottom: 0; width: 100%;">
		<p style="color: #000; font-size: 12px; margin: 0;">&copy; {{ now()->year }} Stone Bazaar - All Rights Reserved. Made with ❤️ by <a href="https://intouchsoftware.co.in" target="_blank">InTouch Software Solutions</a></p>
    
	</footer>
	<!-- Scripts -->
	<script src="{{ asset('assets/errors/404/js/script.js') }}"></script>
	<script>
	// Pretty simple huh?
	var scene = document.getElementById('scene');
	var parallax = new Parallax(scene);
	</script>


</body>
</html>
