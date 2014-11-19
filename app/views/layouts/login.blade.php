{{--
|--------------------------------------------------------------------------
| Login template - david/20141118
|--------------------------------------------------------------------------
|
| Login template
|
--}}
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		@include('includes.head')
		@yield('customCSS')
		@yield('customJS')
	</head>
    <body>

        <div id="main" class="row">
			@yield('content')
        </div>

		<footer class="footer">
			@include('includes.footer')
		</footer>
    </body>
</html>