@include('includes.modalWindow')

<div id='map-canvas' style="height:300px;width:100%;">
</div>

<div class="container-fluid">
	<div class='row'>
		@foreach($data as $user)
			<div id="{{'user'.$user->user_id}}" class="users col-md-2">
				{{HTML::image($user->photoURL, 'profile picture',array('class'=>'img-responsive'))}}
				<p><b>{{$user->displayName}}</b></p>
				<p>{{$user->cities->name}} city {{$user->gus->name}}-gu {{$user->dongs->name}}-dong</p>
				<span class="message-modal">
					<a href="#" data-id="{{$user->user_id}}" data-url="{{ URL::route('viewModalWindow') }}">Send a message</a>
				</span>
			</div>
		@endforeach
	</div>
</div>
