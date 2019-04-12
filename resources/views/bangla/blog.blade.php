@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs')
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cafe885240a800012587427&product=sticky-share-buttons' async='async'></script>

@endsection



@section('title', 'Page Title')




@section('content')
    <div class="jumbotron text-center primary">

        <h1><strong>{!!$blog->title!!}</strong></h1>
        <div class="container">
          <p><strong> <i>{!! $blog->excerpt !!}</i></strong></p>
        </div>
        
      
    </div>

     
     <div class="container">
        <div class="row">
          <div class="col-md-6 bgprimary text-center p-4">

            <h4 class="white-anchor">
              <a href="/">
                Connect to community business 
                <i class="fas fa-external-link-alt ml-2"></i>
                
              </a>
              
            </h4>
            
            
          </div>
          <div class="col-md-6 bgprimary text-center p-4">
              <h4 class="white-anchor">
                <a href="/">
                  Rent a house in your community 
                  <i class="fas fa-external-link-alt ml-2"></i>
                  
                </a>
                
              </h4>
          </div>
          
        </div>
        <div class="sharethis-inline-share-buttons"></div>

        <div class="row mt-5">
          <div class="row">
            <div class="col-md-8 p-4">
              <j{!! $blog->content !!}
            </div>
            <div class="col-md-4" style="background-color: #e9ecef;">
              <h3> Similar Posts</h3>
              @foreach($blog->similar_blogs as $similar)
              <h5>{{ $similar->title }}</h5>
              @endforeach

            </div>
          </div>
            
        </div>
     </div>
   
@endsection

@section('pagejs')

  
@endsection


