<table class="table table-striped table-bordered">
@foreach($messages as $key=> $message)
            <tr>
            <td>
            From: {{ $message->sender->username }}
            </br>
            Sent: {{ $message->created_at }}
        	</br>
            {{ $message->content }}
            </td>
            </tr>
                 
@endforeach
</table>/
