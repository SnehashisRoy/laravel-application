@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title',  ucfirst(implode(' ', explode('-', $title))). ' in Danforth: Bangla Toronto')




@section('content')

<div class="jumbotron text-center bold" ><h2>{{strtoupper(implode(' ', explode('-', $title)))}}</h2></div>

	
	<div class="container">
		<div class="row justify-content-center">
			@foreach($companies as $company)
			<div class="col-10 col-md-8 business-box-shadow mb-5 p-5 business-box-border">
				<h4 class="primary bold text-center">{{$company->company}}</h4>
				<p><span class="bold primary">Services: </span>{{$company->service}}</p>
				<p><span class="bold primary ">Contacts: </span>{{$company->contact}}</p>
				<p><span class="bold primary">Website: </span>Not Available</p>

			</div>
    		@endforeach 

    		<div class="col-10 col-md-8">

    			<div style="margin-top: 40px;">{{$companies->links()}}</div> 

			</div>

		</div>


	</div>


   
@endsection


