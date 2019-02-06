@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

<div id="map_view">
    <div class="row" style="display: none;">
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
    <div id="mapid" style="height:1000px; margin-top: 20px; z-index: 0;"></div>


    

 <!-- The Modal -->
 <div id="myModal" class="modal" style="display: block;" v-if="openModal">

   <!-- Modal content -->
   <div class="modal-content">
     <span class="close" @click=closeModal()>&times;</span>
     <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3">
                <img :src="listing.image_url" class="img-responsive" :alt="listing.title">
            </div>
             ${listing.address}
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