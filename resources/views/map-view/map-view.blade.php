@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

<div id="map_view">
    <div class='row'>
    	<div class="col-md-3">
    		<div class="form-group">
    		    <label for="minPrice">Min Price : $ ${filters.minPrice}</label>
    		    <input type="range" class="form-control-range" id="minPrice" min="0" max="2000" v-model="filters.minPrice" @change= filter() >
    		  </div>
   		
    	</div>

    	<div class="col-md-3">
    		<div class="form-group">
    		    <label for="maxPrice"> Max Price : $ ${filters.maxPrice}</label>
    		    <input type="range" class="form-control-range" id="maxPrice" min="0" max="2000" v-model="filters.maxPrice" @change= filter() >
    		  </div>    	   
    	</div>

    	<div class="col-md-3">
    		<label for="bedroom">Bedroom</label>
			<select id= "bedroom" class="custom-select" v-model="filters.bed" @change= filter() >
			  <option value="1">One</option>
			  <option value="2">Two</option>
			  <option value="3">Three</option>
			</select> 		

    	</div>
    	<div class="col-md-3">
    		<label for="bathroom">Bedroom</label>
			<select id= "bathroom" class="custom-select" v-model="filters.bath" @change= filter() >
			  <option value="1">One</option>
			  <option value="2">Two</option>
			  <option value="3">Three</option>
			</select> 		

    	</div>

    </div>
    <div class="row">
    	<div class="col">
    	  <button type="button" class="btn btn-primary btn-lg btn-block" @click=filter() >Filter</button>
    	</div>
    </div>
    <div id="mapid" style="height:600px; margin-top: 20px;"></div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
 </div>
    
   
@endsection


@section('pagejs')


	<script type="text/javascript">
		let geoJsonFromBlade = {!! json_encode($geo)  !!}
	</script>

	<script src="{{ url('/js/page/map.js')}}"></script>
		 
	
@endsection