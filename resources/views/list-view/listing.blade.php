@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Bangla Toronto: Rent a house- '. $house->address)




@section('content')

<div id="listing">

    


        <div class="container">
            <div class="row justify-content-md-center">
                
                <div class="col col-md-4 ">
                    <a href="/rent-basement-house-room-in/{{@$house->city}}"><div class="btn btn-success" style="width:100%;"> Rent a house in {{@$house->city}}</div></a>
                    
                </div>
                <div class="col col-md-4 ">
                    <a href="/list-city"><div class="btn btn-success" style="width:100%;"> House in other Cities</div></a>
                    
                </div>
                <div class="col col-md-4 ">
                    <a href="/map-view"><div class="btn btn-success" style="width:100%;"> Find a house in Map</div></a>
                    
                </div>
                
            </div>
            
         <div class="row" style="margin-top: 50px;">
            <div class="col-sm-12 col-md-3 mb-3">
                <img src = "{{$house->image_url}}" class="img-responsive" alt="{{$house->title}}" style="width:100%;">
            </div>
            

            <div class="col-sm-12 col-md-6 mb-5">
                <h2 class="primary">{{$house->title}}</h2>
                <p class="alert-success"><span class="bold">Posted:</span> {{$house->time_passed}} .</p>
                <p><span class="bold">Addreess:</span> {{$house->address}}</p>
                <p><span class="bold">Description:</span> {{$house->description}}</p>
                <!---Add here-->
                <p> <span class="bold">Price: </span>{{$house->price ? $house->price : 'NA' }}</p>
                <p> <span class="bold">Size: </span>{{$house->size ? $house->size : 'NA' }}</p>
                <p> <span class="bold">Bedrooms: </span>{{$house->bedrooms ? $house->bedrooms : 'NA' }}</p>
                <p> <span class="bold">Bathrooms: </span>{{$house->bathrooms ? $house->bathrooms : 'NA' }}</p>
                <p> <span class="bold">Furnished: </span>{{$house->furnished ? $house->furnished : 'NA' }}</p>
                <p> <span class="bold">Pet Friendly: </span>{{$house->pet_friendly ? $house->pet_friendly : 'NA' }}</p>
                <p> <span class="bold">Parking: </span>{{$house->parking ? $house->parking : 'NA' }}</p>
                <p> <span class="bold">Published On: </span>{{$house->kijiji_publish_date ? $house->kijiji_publish_date : 'NA' }}</p>
                @if($house->is_old)

                    <p class="alert-danger">This ad is old. To Find the recent ads click the button bellow.</p>
                    <a href="/rent-basement-house-room-in/{{$house->city}}" style="text-decoration:none;">
                        <div class="btn btn-success">Recent Ads in {{$house->city}}</div>
                    </a>
                    <a href="/list-city" style="text-decoration:none;">
                        <div class="btn btn-primary"> Other Cities</div>
                    </a>

                @else
                <a href="{{$house->kijiji_link}}"><div class="btn btn-success mb-5" style="width:100%;"> Connect the Renter</div></a>
                @endif
                

            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <div class="mb-5">
                    <a href="/rent-basement-house-room-in/{{@$house->city}}"><div class="btn btn-success" style="width:100%;"> Rent a house in {{@$house->city}}</div></a>
                    
                </div>
                <div>
                    <a href="/list-city"><div class="btn btn-success" style="width:100%;"> House in other Cities</div></a>
                    
                </div>
            </div>
             
         </div>
     </div>
    
</div>
    
    
   
@endsection


