@extends('layouts.master')

@section('css')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
@stop

@section('content')
<div class='container'>
	<div class="container-fluid">
		<ul class="nav nav-tabs tabs-up" id="menu">
			<li class='active'><a href="#profile" data-url="{{url('dashboard/profile')}}" class="media_node span" id="profile_tab" data-toggle="tabajax" rel="tooltip"> Profile </a></li>
	    	<li><a href="#messages" data-url="{{url('dashboard/messages')}}" class="media_node span" id="messages_tab" data-toggle="tabajax" rel="tooltip"> Messages </a></li>
	    	<li><a href="#contacts" data-url="{{url('dashboard/contacts')}}" class="media_node span" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Contacts </a></li>			
			<li><a href="#search" data-url="{{url('dashboard/search')}}" class="media_node span" id="search_tab" data-toggle="tabajax" rel="tooltip"> Search </a></li>
		</ul>
		<nav class='navbar navbar-default'><ul class="nav  pull-right"><li><a href="{{url('logout')}}">logout</a></li></ul></nav>
	</div>

	<div class="tab-content">
		<div class="tab-pane active" id="profile"></div>
		<div class="tab-pane" id="messages"></div>
      	<div class="tab-pane" id="contacts"></div>
      	<div class="tab-pane" id="search"></div>
    </div>
</div>
<script type='text/javascript'>
$('#menu a').click(function (e) {
	e.preventDefault();

	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
  	
	
	// ajax load from data-url
	$(href).load(url,function(result){      
	    pane.tab('show');
	});
});

// load first tab content
$('#profile').load($('.active a').attr("data-url"),function(result){
	$('.active a').tab('show');
});


</script>
	
@stop
