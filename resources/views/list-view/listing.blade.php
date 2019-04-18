@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

<div id="listing">

    


        <div class="container">
         <div class="row" style="margin-top: 50px;">
            <div class="col-sm-12 col-md-4">
                <img src = "{{$house->image_url}}" class="img-responsive" alt="{{$house->title}}" style="width:100%;">
            </div>

            <div class="col-sm-12 col-md-8">
                <h2 class="primary">{{$house->title}}</h2>
                <p><span class="bold">Addreess:</span> {{$house->address}}</p>
                <p><span class="bold">Description:</span> {{$house->description}}</p>
                <p> <span class="bold">Price: </span>{{$house->price ? $house->price : 'NA' }}</p>
                <p> <span class="bold">Size: </span>{{$house->size ? $house->size : 'NA' }}</p>
                <p> <span class="bold">Bedrooms: </span>{{$house->bedrooms ? $house->bedrooms : 'NA' }}</p>
                <p> <span class="bold">Bathrooms: </span>{{$house->bathrooms ? $house->bathrooms : 'NA' }}</p>
                <p> <span class="bold">Furnished: </span>{{$house->furnished ? $house->furnished : 'NA' }}</p>
                <p> <span class="bold">Pet Friendly: </span>{{$house->pet_friendly ? $house->pet_friendly : 'NA' }}</p>
                <p> <span class="bold">Parking: </span>{{$house->parking ? $house->parking : 'NA' }}</p>
                <p> <span class="bold">Published On: </span>{{$house->kijiji_publish_date ? $house->kijiji_publish_date : 'NA' }}</p>
                <a href="{{$house->kijiji_link}}"><div class="btn btn-success" style="width:100%;"> Connect the Renter</div></a>
                

            </div>
             
         </div>
     </div>
    
</div>
    
    
   
@endsection

