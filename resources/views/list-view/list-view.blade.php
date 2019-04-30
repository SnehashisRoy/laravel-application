@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Bangla Toronto: Rent a House in  Toronto')




@section('content')

<div id="list_view">

    

    <div class="container">
        <div class="row">
            <div>
                <a href="/map-view" class="btn btn-success"> Find the house in Map</a>
            </div>
        </div>

    	@foreach($houses as $house)
    	
    	<div class="row" style="margin-top: 30px; border-bottom: 1px solid grey; padding-bottom: 10px;">
    		<div class="col-4">
    			<img src="{{$house->image_url}}" alt="{{$house->title}}" style="width: 100%; height: 300px;">
    			
    		</div>
    		<div class="col-8">
    			<h3 class="bold green">{{$house->title}}</h3>

    			<p> <span class="bold">Address: </span>{{ $house->address}}</p>
    			<p> <span class="bold">Description: </span>{{substr($house->description, 0, 300)}}...</p>
    			<p> <span class="bold">Price: </span>{{ $house->price}}</p>
    			<a href="listing/{{$house->id}}" style="text-decoration:none;">
    				<div class="btn btn-success"> See Detail</div>
    			</a>

    			
    		</div>
    	</div>
    	@endforeach

    	<div style="margin-top: 40px;">{{$houses->links()}}</div>

    	
    </div>


    
</div>
    
    
   
@endsection


@section('pagejs')


	
	<script src="{{ url('/js/page/list.js')}}"></script>
		 
	
@endsection