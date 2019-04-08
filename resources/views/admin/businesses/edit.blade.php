@extends('layouts.admin')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Admin Businesses')




@section('content')

<div class="container">
	

	<form method="post" action="" >
		 @csrf
	  <div class="form-group">
	    <label for="company">Name of Company</label>
	    <input type="text" class="form-control" id="company" name="company" value="{{ $business->company}}" placeholder="Company name">
	  </div>
	  <div class="form-group">
	    <label for="Contact">Contact</label>
	    <input type="text" class="form-control" id="Contact" name="contact" value="{{ $business->contact}}" placeholder="Contact">
	  </div>
	  <div class="form-group">
	    <label for="service">Services</label>
	    <input type="text" class="form-control" id="service" name="service" value="{{ $business->service}}" placeholder="Services">
	  </div>
	  
	  <div class="form-group">
	      <label for="category">Category</label>
	      <select class="form-control" id="category" name="category">
	      	@foreach($companies as $company)
	        	@if( $business->slug == $company->slug)
	        	      <option value="{{ $company->slug }}" selected>{{ $company->slug }}</option>
	        	@else
	        	      <option value="{{ $company->slug}}">{{ $company->slug }}</option>
	        	@endif
	        
	        @endforeach
	      </select>
	    </div>
	  
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	
</div>

	

		
@endsection

@section('pagejs')
	
@endsection



