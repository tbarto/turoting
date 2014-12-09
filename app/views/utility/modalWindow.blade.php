{{--
|--------------------------------------------------------------------------
| modal window with user's information - tom/20141202
|--------------------------------------------------------------------------
| header has user image and name in header
| hidden fields: sender and receiver ids
| body has textarea
| footer has submit and cancel buttons
--}}

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			{{HTML::image($user->photoURL, 'profile picture',array('height'=>'50px'))}}
			{{$user->displayName}}
		</div>

		<div class="modal-body">
			{{Form::open(array('id'=>'message-form'))}}
				{{Form::hidden('from_id',Auth::id())}}
				{{Form::hidden('to_id',$user->user_id)}}
				{{Form::label('user_message','Message')}}
				{{Form::textarea('message',null,array('style'=>'width:100%'))}}
			{{Form::close()}}
		</div>

		<div class="modal-footer">
			<a href="#" data-dismiss="modal" class="btn">Cancel</a>
			<span class="submit-message">
				<a href="#" class="btn btn-primary" id="btn-send" data-url="{{ URL::route('message-store') }}">Send</a>
			</span>
		</div>
	</div>
</div>