/*
|--------------------------------------------------------------------------
| title - developer name/date
|--------------------------------------------------------------------------
|
| description
|
*/
jQuery(document).ready(function($){
	/**
	 * description
	 *
	 * @param param
	 * @return return
	 */
	// $('#menu a').click(function (e) {
	// 	e.preventDefault();

	// 	var url = $(this).attr("data-url");
	// 	var href = this.hash;
	// 	var pane = $(this);

		
	// 	// ajax load from data-url
	// 	$(href).load(url,function(result){      
	// 		pane.tab('show');
	// 	});
	// });

	// load first tab content
	// $('#profile').load($('.active a').attr("data-url"),function(result){
	// 	$('.active a').tab('show');
	// });
	/**
	 * description
	 *
	 * @param param
	 * @return return
	 */
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


	/**
	* Tom/20141109
	* AJAX to display dynamic dropdown menus
	*/
	$('.ajaxDropdown').change(function(){

		var target = $(this).attr("data-target");
		var select_box = $(target);
		url = $(this).attr("data-url");

		select_box.empty();
		select_box.append("<option>Wait...</option>");

	//AJAX
	$.get(url, 
		{ option: $(this).val() }, 
		function(data) {          
			select_box.empty();
			select_box.append("<option value=0>All</option>")
			$.each(data, function(index, element) {
				select_box.append("<option value='"+ element.id +"'>" + element.name + "</option>");
			});

		});
	});
	/**
	* Tom/20141109
	* AJAX to display search results
	*/
	$("#searchForm").submit(function(e){

		e.preventDefault();

		var formData = {
			'category': $('#category').val(),
			'job':$('#job').val(),
			'city':$('#city').val(),
			'gu':$('#gu').val(),
			'dong':$('#dong').val()
		};

		$.ajax({
			url : "{{ url('dashboard/results') }}",
			type: "GET",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
				$('#search').html(data);
				pane.tab('show');
			},
			error: function (jqXHR, textStatus, errorThrown)
			{

			}
		});    
	});
});