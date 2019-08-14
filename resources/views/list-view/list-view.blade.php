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
            <div class="col">
                <a href="/list-city" class="btn btn-success"> Find the house in your city</a>
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
                <div class="mb-5">
                    <img src="{{$house->image_url}}" alt="{{$house->title}}" style="width: 100%; height: 300px;">
                </div>
                <div class="mb-5">
    			<h3 class="bold green">{{$house->title}}</h3>

    			<p> <span class="bold">Address: </span>{{ $house->address}}</p>
    			<p> <span class="bold">Description: </span>{{substr($house->description, 0, 300)}}...</p>
    			<p> <span class="bold">Price: </span>{{ $house->price}}</p>
    			<a href="/listing/{{$house->id}}" style="text-decoration:none;">
    				<div class="btn btn-success"> See Detail</div>
    			</a>
                </div>
                    @if ($loop->first)
                    <div class="mb-5">

                        <div id="427268205">
                            <script type="text/javascript">
                                try {
                                    window._mNHandle.queue.push(function (){
                                        window._mNDetails.loadTag("427268205", "300x250", "427268205");
                                    });
                                }
                                catch (error) {}
                            </script>
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