@include('includes.modalWindow')

<div class="col-md-8 col-md-offset-2">
	<table class="table table-striped table-bordered">
		@foreach($messages as $key=> $message)
		<tr>
			<td>
				From: {{ $message->sender->username }}
				</br>
				Sent: {{ $message->created_at }}
				</br>
				{{ $message->content }}
				</br>
				<span class="message-modal">
					<a href="#" data-id="{{$message->sender->id}}" data-url="{{ URL::route('viewModalWindow') }}">Reply</a>
				</span>	
			</td>
		</tr>

		@endforeach
	</table>
</div>