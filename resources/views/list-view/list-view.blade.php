@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Rent a basement / house / room  in '.  $city )




@section('content')

<div id="list_view">

    

    <div class="container">
        <div class="text-center">
            @if($list_by_city)
                <h3> Houses / basements for rent in {{$city}}</h3>
            @else
                <h3> Houses / basements for Rent</h3>
            @endif
            <div class="mb-5">
                <a href="/list-city"><div class="btn btn-success" style="width:100%;"> Houses / basements in Your City</div></a>
                
            </div>

        </div>
        <div class="row mt-5">
            <div class="col">
                <form method="POST" class="form-inline" action="/list-view">
                    @csrf
                  <label class="sr-only" for="postal">Name</label>
                  <input type="text" name="postal" class="form-control mb-2 mr-sm-2" id="postal" placeholder="Search by Postal Code">
                  
                  <button type="submit" class="btn btn-success mb-2">Submit</button>
                </form>
            </div>
        </div>

    	
    	
    	<div class="row justify-content-md-center" style="margin-top: 30px; border-bottom: 1px solid grey; padding-bottom: 10px;">
    		
            
    		<div class="col-12 col-md-8">
                @foreach($houses as $house)
                <div class="mb-5" style="max-width: 400px;">
                    <img src="{{$house->image_url ?? '/images/rent_house.jpg'}}" alt="{{$house->title}}" style="width: 100%; height: 300px;">
                </div>
                <div class="mb-5">
    			<h3 class="bold green">{{$house->title}}</h3>

                <p class="alert-success"><span class="bold">Posted:</span> {{$house->time_passed}}.</p>

    			<p> <span class="bold">Address: </span>{{ $house->address}}</p>
                <p class="alert-success"> If you own this property and want to remove the ad, <a href="/contact-us?id={{$house->id}}">click here</a></p>
    			<p> <span class="bold">Description: </span>{{substr($house->description, 0, 300)}}...</p>
    			<p> <span class="bold">Price: </span>{{ $house->price}}</p>




                @if($house->is_old)


                    <p class="alert-danger">This ad is old. To Find the recent ads click the button bellow.</p>
                    <a href="/rent-basement-house-room-in/{{$house->city}}" style="text-decoration:none;">
                        <div class="btn btn-success">Recent Ads in {{$house->city}}</div>
                    </a>
                    <a href="/list-city" style="text-decoration:none;">
                        <div class="btn btn-primary"> Other Cities</div>
                    </a>

                @else
    			<a href="/listing/{{$house->id}}" style="text-decoration:none;">
    				<div class="btn btn-success"> See Detail</div>
    			</a>
                @endif
                </div>
                    
                @endforeach

    			
    		</div>
            
    	</div>
    	

    	<div style="margin-top: 40px;">{{$houses->links()}}</div>

    	
    </div>


    
</div>
    
    
   
@endsection


@section('pagejs')


	
	<script src="{{ url('/js/page/list.js')}}"></script>
		 
	
@endsection