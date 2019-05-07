@extends('layouts.admin')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'login')




@section('content')

<div class="container">
	
	<div class="row justify-content-md-center">
		<div class="col-12 col-md-6 ">
			<form method="post" action="">
				@csrf
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		
	</div>

	
</div>



   
@endsection


