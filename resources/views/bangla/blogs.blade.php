@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

	<div class="jumbotron text-center primary text-center">
		<h2 class="bold">BanglaToronto Blogs</h2>
		<p>A rich source of information you need to know to live better in Toronto</p>
		<div class="container">
			<ul class="nav nav-pills">
			  <li class="nav-item">
			    <a class="nav-link {{ url()->current() == url('blogs')? 'active': ' '}}" href="/blogs">All Blogs</a>
			  </li>
			  @foreach($cats as $cat)
			  <li class="nav-item">
			    <a class="nav-link {{ url()->current() == url('blogs/'.$cat->id)? 'active': ' '}}" href="/blogs/{{$cat->id}}">{{$cat->category}}</a>
			  </li>
			  @endforeach
			  
			</ul>
			
		</div>
		
	</div>
	<div class="container">
		<div class="row">
		  
  			@foreach($blogs as $blog)
  			
	  			<div class="col-12 col-md-6 mb-5">

	  				<div class="row">
	  					<div class="col-12">
	  						<a href="/blog/{{$blog->slug}}" class="primary">
	  							<h3>{!!$blog->title!!}</h3>
	  						</a>
	  					</div>
	  					<div class="col-12 col-md-7">	  						
	  							<p>{!!$blog->post_intro!!} <a href="/blog/{{$blog->slug}}" class="primary">..more >></a></p>
	  						
	  					</div>	
	  					<div class="col-12 col-md-5" style="
	  					background-image: url({{$blog->featured_medium->image_url ?? $blog->first_}}); 
	  					 background-repeat: no-repeat; /* Do not repeat the image */
	  					 background-size: cover;
	  					 padding: 10px;">
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
	</div>
		
					
	
   
@endsection

@section('pagejs')

  
@endsection


