<div class="col-md-8 col-md-offset-2">
	{{ Form::open( array( 'id'=> 'searchForm', 'method'=>'get', 'role'=>'form', 'data-target' => URL::route('search-results') ) ) }}
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
	{{ Form::submit('Go', array( 'class' => 'btn btn-primary' ) ) }}
	{{ Form::close()}}
	<div id="search-result"></div>
</div>
<script>
	dropdown();
</script>