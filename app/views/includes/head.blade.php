{{--
|--------------------------------------------------------------------------
| Head template for all page - david/20141118
|--------------------------------------------------------------------------
|
| meta, title, style, script, etc
|
--}}
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">

<title>Title of the page</title>

{{--
|--------------------------------------------------------------------------
| Style for all page - david/20141118
|--------------------------------------------------------------------------
|
| add style HTML::style
|
--}}
{{ HTML::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css")}}
{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}
{{ HTML::style('/css/login/style.css') }}
{{ HTML::style('/css/footer/style.css') }}

{{--
|--------------------------------------------------------------------------
| JS for all page - david/20141118
|--------------------------------------------------------------------------
|
| add javascript HTML::script
|
--}}
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
{{ HTML::script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js") }}