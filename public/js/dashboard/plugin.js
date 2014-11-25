/*
|--------------------------------------------------------------------------
| title - developer name/date
|--------------------------------------------------------------------------
|
| description
|
*/

function dropdown(){
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
		
		console.log('submit');

		$.ajax({
			url : $(this).data('target'),
			type: "GET",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
				$('#search-result').html(data);
				// pane.tab('show');
			},
			error: function (jqXHR, textStatus, errorThrown)
			{

			}
		});    
	});	
};

jQuery(document).ready(function($){

	/**
	 * menu click event handler
	 *
	 * @param param
	 * @return return
	 * tom/201411 
	 * david/20141124
	 */
	$('.navbar-nav-menu').on('click', 'li>a', function(event) {
		
		//prevent defualt action
		event.preventDefault();

		// the url of the ajax data
		var ajaxUrl = $(this).attr("data-url");
		// display the result of ajax
		var $displayArea = $('#main');
		
		// ajax load from data-url
		$displayArea.load( ajaxUrl );
	});

	/**
	 * load the profile data first since the active class is on profile.
	 *
	 * @param param
	 * @return return
	 * tom/2014
	 * david/20141124
	 */
	$('#main').load( $('.active a').attr("data-url") );

	/**
	 * description
	 *
	 * @param param
	 * @return return
	 */
	$('#search-result a').click(function (e) {

		e.preventDefault();

		var url = $(this).attr("data-url");
		var href = this.hash;
		var pane = $(this);

		console.log(url);
		// ajax load from data-url
		$(href).load(url,function(result){      
			pane.tab('show');
		});
	});
});