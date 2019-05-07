@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title',  $company->company.' in Danforth: Bangla Toronto')




@section('content')

<div class="jumbotron text-center bold" ><h2>{{$company->company}}</h2></div>

	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-10 col-md-8 business-box-shadow mb-5 p-5 business-box-border">
				<h4 class="primary bold text-center">{{$company->company}}</h4>
				<p><span class="bold primary">Services: </span>{{$company->service}}</p>
				<p><span class="bold primary ">Contacts: </span>{{$company->contact}}</p>
				<p><span class="bold primary">Website: </span>Not Available. </p>
				<p><span class="bold primary">Detail Description: </span> We do not have detail of the company at this moment. <br><br> <strong>If you own this business , please <a href="/contact-us">contact us</a> with detail information. We will be happy to add it here.</strong>
				</p>
				

			</div>
			<div class="col-2 col-md-4 mb-5">

					
				<ul class="list-group">
				  <li class="list-group-item text-center"><h4 class="primary bold">Similar businesses</h4></li>
				  @foreach($similars as $similar)
				  <a href="/business/{{$similar->slug}}/{{$similar->company_slug}}"><li class="list-group-item primary"><p> <i class="far fa-hand-point-up"></i> {{$similar->company }} </p></li></a>
				  @endforeach
				</ul>			
			</div>

    		

		</div>


	</div>


   
@endsection


