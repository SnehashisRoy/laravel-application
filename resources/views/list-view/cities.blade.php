@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Bangla Toronto: List of Cities')




@section('content')


    <div class="jumbotron text-center">
        <h2>Please click on a city to find Rental Ads of that area</h2>
    </div>

    <div class="container">
        
        
        <div class="row">
            @foreach($cities as $city)

            <div class="col-4">
                 <a href="/rent-basement-house-room-in/{{$city->city}}"><p>{{$city->city}}</p></a>
            </div>
        
            @endforeach
            
        </div>
    	


    	
    </div>


    
   
@endsection


@section('pagejs')


	
	<script src="{{ url('/js/page/list.js')}}"></script>
		 
	
@endsection