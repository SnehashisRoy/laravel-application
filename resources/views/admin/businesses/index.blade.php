@extends('layouts.admin')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Admin Businesses')




@section('content')

		<div class="container">
			<div class="text-right">
					<a href="/admin/dashboard/businesses/create"><button class="btn btn-success"> Add a Property</button></a>
					
			</div>
			<div class="row">

		@foreach($companies as $company)

		
				<div class="col-md-12">

					<a href="/admin/dashboard/businesses/edit/{{$company->id}}"><p>{{$company->company}}</p>
					
				</div>

		@endforeach
		<div>
			{{ $companies->links() }}
			
		</div>

	    	</div>
	    </div>



   
@endsection


