@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

	<div class="jumbotron text-center primary">
		<h2 class="bold">BanglaToronto Blogs</h2>
		<p>A rich source of information you need to know to live better in Toronto</p>
		<div class="text-center">
			<ul class="nav nav-pills">
			  <li class="nav-item">
			    <a class="nav-link active" href="/blogs">All Blogs</a>
			  </li>
			  @foreach($cats as $cat)
			  <li class="nav-item">
			    <a class="nav-link" href="/blogs/{{$cat->id}}">{{$cat->category}}</a>
			  </li>
			  @endforeach
			  
			</ul>
			
		</div>
		
	</div>
	<div class="container">
		<div class="row">
		  
  			@foreach($blogs as $blog)
  			
	  			<div class="col-12 col-md-6">

	  				<div class="row">
	  					<div class="col-12 col-md-6">
	  						<a href="/blog/{{$blog->slug}}" class="primary">
	  							<h2>{!!$blog->title!!}</h2>
	  						</a>
	  						
	  							<p>{!!$blog->post_intro!!}</p>
	  						
	  					</div>	
	  					<div class="col-12 col-md-6">
	  						<img src="{{$blog->featured_medium->image_url ?? $blog->first_}}" class="img-fluid" alt="">
	  					</div>	
	  				</div> 
	  				
	  			</div>
  			
  			@endforeach


  			@if($blogs->count() > 20)
  			<div>
  				{{$blogs->links()}}
  			</div>
  			@endif


		  			
	</div>
		
					
	
   
@endsection

@section('pagejs')

  
@endsection


