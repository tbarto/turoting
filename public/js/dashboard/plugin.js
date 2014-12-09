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
/**
 * Tom/20141202
 * display modal window for writing a message
 *
 * @param param
 * @return return
 */
$(document).on('click','.message-modal a',function(e){
		e.preventDefault();

		$('.modal-body').html('');
		$('.modal-header').html('');
		$('.modal-body').addClass('loader');
		$('#message-modal').modal('show');

		$.post( $(this).attr('data-url') ,
			{id: $(this).attr('data-id') },
			function(html){
				$('.modal-body').removeClass('loader');
				$('#message-modal').html(html);
			}
		);

	});
/**
 * Tom/20141202
 * POST message from modal window 
 *
 * @param param
 * @return return
 */
$(document).on('click','.submit-message a',function(e){
		
	e.preventDefault();
	
	var formData ={
		'from_id' : $('[name="from_id"]').val(),
		'to_id': $('[name="to_id"]').val(),
		'message':$('[name="message"]').val()
	};
	
	$.ajax({
		url : $(this).attr('data-url'),
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{					
			$('#message-modal').modal('toggle');
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Unable to send message');
		}
	});
});
/**
* Tom/20141109
* AJAX to display search results
*/
$(document).on('submit','#searchForm',function(e){
	e.preventDefault();
 	
 	//user's search criteria
	var formData = {
		'category': $('#category').val(),
		'job':$('#job').val(),
		'city':$('#city').val(),
		'gu':$('#gu').val(),
		'dong':$('#dong').val()
	};

	url = $(this).attr("data-target");

	$.ajax({
		url : url,
		dataType: 'json',
		type: "GET",
		data : formData,
		success: function(data, textStatus, jqXHR){
			//display map and search results
			$('#main').html(data.html);
		 	
			//add points to map using server data
			var points = data.points;
			getMap(points);          
		},
		error: function (jqXHR, textStatus, errorThrown){
			alert('error');
		}
	});//end ajax  
});
/**
 * Tom/20141209
 * add points to google map
 *
 * @array (map point objects)
 * @return return
 */
function getMap(points) {
	var map = new google.maps.Map(document.getElementById("map-canvas"), {
		center: new google.maps.LatLng(35.90, 127.77),
		zoom: 6,
	});
	
	var infoWindow = new google.maps.InfoWindow;
	var bounds = new google.maps.LatLngBounds();
	var imageURL = "http://maps.google.com/mapfiles/kml/paddle/blu-blank.png";  

	$.each(points,function(index,element){
		var name = element.name;
		var point = new google.maps.LatLng(
				parseFloat(element.lat),
				parseFloat(element.lng));
		var html = element.name + "-dong: " + element.count + " workers here."
		var marker = new google.maps.Marker({
			map: map,
			position: point,
			icon: imageURL
		});
		bounds.extend(point);            
		bindInfoWindow(marker, map, infoWindow, html);
	});
		
		map.fitBounds(bounds);
}//end getMap function
	
function bindInfoWindow(marker, map, infoWindow, html) {
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
}//end bindInfoWindow