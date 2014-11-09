<div id="again">
	<a href="#search" data-url="{{url('dashboard/search')}}">search again</a>
</div>
<h1>{{ $data }} </h1>
<script type='text/javascript'>
$('#again a').click(function (e) {
	e.preventDefault();

	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
  	
	
	// ajax load from data-url
	$(href).load(url,function(result){      
	    pane.tab('show');
	});
});
</script>