@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Bangla Toronto: Rent a basement / house / room  in '.  $city)




@section('content')

<div id="list_view">

    

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/map-view" class="btn btn-success"> Find the house in Map</a>
            </div>
            @if($list_by_city)
            <div class="col">
                <a href="/rent-basement-house-room/{{$city}}" class="btn btn-success"> Most recent ads in {{$city}}</a>
            </div>
            @else
            <div class="col">
                <a href="/list-city" class="btn btn-success"> Find  house in your city</a>
            </div>
            @endif

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
                    @if ($loop->first)
                    <div class="mb-5">
                        <div class="mb-3 p-2" style="border: solid 1px #007bff; text-align: justify; text-justify: inter-word;">
                            <p >Air Quality is essential for Healthy Environment. To improve the quality of air in basement apartment, you must remove humidity. Dehumidifier is the perfect solution. It prevents the growth of molds and get rid off dampness. </p>
                            <a target="_blank" href="https://www.amazon.com/gp/search?ie=UTF8&tag=banglatoronto-20&linkCode=ur2&linkId=04a13d792f4710677e3258c23d5a8e6b&camp=1789&creative=9325&index=hpc&keywords=dehumidifier">Click to find 30 Best Dehumidifiers for your health</a><img src="//ir-na.amazon-adsystem.com/e/ir?t=banglatoronto-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                        </div>
                    </div>
                    @endif
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