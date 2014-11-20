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
			<li class='active'>
				<a href="#profile" data-url="{{ URL::route('profile') }}" class="media_node span" id="profile_tab" data-toggle="tabajax" rel="tooltip"> Profile </a>
			</li>
			<li>
				<a href="#messages" data-url="{{ URL::route('message') }}" class="media_node span" id="messages_tab" data-toggle="tabajax" rel="tooltip"> Messages </a>
			</li>

			{{-- 
			<li>
				<a href="#contacts" data-url="{{ URL::route('contact') }}" class="media_node span" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Contacts </a>
			</li>
				--}}

			<li>
				<a href="#search" data-url="{{ URL::route('search') }}" class="media_node span" id="search_tab" data-toggle="tabajax" rel="tooltip"> Search </a>
			</li>
		</ul>
		<nav class='navbar navbar-default'>
			<ul class="nav  pull-right">
				<li>
					<a href="{{ URL::route('logout') }}">logout</a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="tab-content">
		<div class="tab-pane active" id="profile"></div>
		<div class="tab-pane" id="messages"></div>
		<div class="tab-pane" id="contacts"></div>
		<div class="tab-pane" id="search"></div>
	</div>
</div>