<div class="col-md-8 col-md-offset-2">
	<table class="table table-striped table-bordered">
		@foreach( $posts as $key=> $post)
		<tr>
			<td>
				Author: {{ $post->users->username }}
				</br>
				Job: {{ $post->jobs->name }}
				</br>
				Posted: {{ $post->created_at }}
				</br>
				Post type: {{ $post->post_type }}
				</br>
				{{ $post->content }}
			</td>
		</tr>

		@endforeach

	</table>
</div>