
{{ Form::open(array('id'=> 'searchForm', 'method'=>'get', 'role'=>'form')) }}
            <div class="form-group">
                
                <label for='category'>Select a category</label>
                <select data-target='#job' data-url="{{ url('api/dropdown',array('categories')) }}" id='category' class = 'form-control ajaxDropdown'>
			    	<option selected disabled>Please Select</option>
			    	@foreach($categories as $category)
			    		<option value="{{ $category->id }}">{{ $category->name }}</option>
			    	@endforeach
				</select>
				</br>
                
                <label for='job'>Jobs</label>
                <select id="job" name="job" class = 'form-control'>
                    <option>Please choose a category first</option>
                </select>

            </div>

            <div class="form-group">
            	
            	<label for='city'>Select a city</label>
                <select id='city' data-target="#gu" data-url="{{ url('api/dropdown',array('cities')) }}" class = 'form-control ajaxDropdown'>
			    	<option selected disabled>Please Select</option>
			    	@foreach($cities as $city)
			    		<option value="{{ $city->id }}">{{ $city->name }}</option>
			    	@endforeach
				</select>
				</br>


                
                <label for='gu'>Gu</label>
                <select id="gu" data-target="#dong" data-url="{{ url('api/dropdown',array('gus')) }}"name="gu" class = 'form-control ajaxDropdown'>
                    <option>Please choose a city first</option>
                </select>
                
                <label for='dong'>Dong</label>
                <select id="dong" name="dong" class = 'form-control'>
                    <option>Please choose a gu first</option>
                </select>
            </div>
{{Form::submit('Go',array('class' => 'btn btn-primary'))}}
{{ Form::close()}}
<script>
jQuery(document).ready(function($){
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
            url : "{{ url('search/results') }}",
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
</script>


