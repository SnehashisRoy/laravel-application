@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', ' Bangla Toronto: Rent house in Toronto')




@section('content')

<div id="map_view">
    <div class="container">

            <div class="form-row form-inline" style="display: none;">
                    <div class="form-group col-md-3">
                        <label for="minPrice">Min Price : $ ${filters.minPrice}</label>
                        <input type="range" class="custom-range" id="minPrice" min="0" max="2000" v-model="filters.minPrice">
                      </div>
                

                    <div class="form-group col-md-3">
                        <label for="maxPrice"> Max Price : $ ${filters.maxPrice}</label>
                        <input type="range" class="custom-range" id="maxPrice" min="0" max="2000" v-model="filters.maxPrice" >
                      </div>           

                <div class=" form-group col-md-2">
                    <label for="bedroom">Bedroom</label>
                    <select id= "bedroom" class="form-control" v-model="filters.bed">
                      <option value="">Select</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>       

                </div>
                <div class="form-group col-md-2">
                    <label for="bathroom">Bathroom</label>
                    <select id= "bathroom" class="form-control" v-model="filters.bath" >
                      <option value="">Select</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>       

                </div>
                  <button type="button" class="btn button-primary" @click=filter() > Apply Filter</button>

            </div>
        
    </div>
    
    
    
    <div id="mapid" style="height:600px; z-index: 0;"></div>


    

 <!-- The Modal -->
 <div id="myModal" class="modal" style="display: block;" v-if="openModal">

   <!-- Modal content -->
   <div class="modal-content">
     <span class="close" @click=closeModal()>&times;</span>
     <div class="container">
         <div class="row">
            <div class="col-md-3">
                <img :src="listing.image_url" class="img-responsive" :alt="listing.title" style="width:100%;">
            </div>

            <div class="col-md-5">
                <h3 class="green">${listing.title}</h3>

                <p><span class="bold">Address:</span> ${listing.address}</p>
                <p><span class="bold">Description:</span> ${listing.description}</p>
                
                
                

            </div>
            <div class="col-md-4">
                <p> <span class="bold">Price: </span>${listing.price ? listing.price : 'NA' }</p>
                <p> <span class="bold">Size: </span>${listing.size ? listing.size : 'NA' }</p>
                <p> <span class="bold">Bedrooms: </span>${listing.bedrooms ? listing.bedrooms : 'NA' }</p>
                <p> <span class="bold">Bathrooms: </span>${listing.bathrooms ? listing.bathrooms : 'NA' }</p>
                <p> <span class="bold">Furnished: </span>${listing.furnished ? listing.furnished : 'NA' }</p>
                <p> <span class="bold">Pet Friendly: </span>${listing.pet_friendly ? listing.pet_friendly : 'NA' }</p>
                <p> <span class="bold">Parking: </span>${listing.parking ? listing.parking : 'NA' }</p>
                <p> <span class="bold">Published On: </span>${listing.kijiji_publish_date ? listing.kijiji_publish_date : 'NA' }</p>
                <a :href="listing.kijiji_link"><div class="btn button-primary" style="width:100%;"> Connect the Renter</div></a>
                

            </div>
             
         </div>
     </div>
     
   </div>

 </div>
</div>
    
   
@endsection


@section('pagejs')


	<script type="text/javascript">
		let geoJsonFromBlade = {!! json_encode($geo)  !!};
    let userLocation = {!! json_encode($userLocation) !!}
	</script>

	<script src="{{ url('/js/page/map.js')}}"></script>
		 
	
@endsection