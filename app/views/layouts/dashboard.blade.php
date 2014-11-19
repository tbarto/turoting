{{--
|--------------------------------------------------------------------------
| Dashboard template - david/20141118
|--------------------------------------------------------------------------
|
| Dashboard template
|
--}}
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		@include('includes.head')
		@yield('headCustomCSS')
		@yield('headCustomJS')
	</head>
    <body>
		<header class="row">
			@include('includes.header-test')
		</header>
			
        <div id="main" class="row">
			@yield('content')
        </div>

		<footer class="footer">
			@include('includes.footer')
		</footer>
		@yield('footerCustomJS')
    </body>
</html>