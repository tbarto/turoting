{{--
|--------------------------------------------------------------------------
| Header template for all page - david/20141118
|--------------------------------------------------------------------------
|
| Navigation, logo, etc
|
--}}
<div class='container'>
	<div class="container-fluid">
		<ul class="nav nav-tabs tabs-up" id="menu">
			<li class='active'><a href="{{url('dashboard/profile')}}" data-url="" class="media_node span" id="profile_tab" data-toggle="tabajax" rel="tooltip"> Profile </a></li>
			<li><a href="{{url('dashboard/messages')}}" data-url="" class="media_node span" id="messages_tab" data-toggle="tabajax" rel="tooltip"> Messages </a></li>
			<li><a href="{{url('dashboard/contacts')}}" data-url="" class="media_node span" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Contacts </a></li>			
			<li><a href="{{url('dashboard/search')}}" data-url="" class="media_node span" id="search_tab" data-toggle="tabajax" rel="tooltip"> Search </a></li>
		</ul>
		<nav class='navbar navbar-default'><ul class="nav  pull-right"><li><a href="{{url('logout')}}">logout</a></li></ul></nav>
	</div>
</div>