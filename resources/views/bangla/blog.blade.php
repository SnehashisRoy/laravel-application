@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs')
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cafe885240a800012587427&product=sticky-share-buttons' async='async'></script>

@endsection



@section('title', 'Page Title')




@section('content')

<div>Tes</div>

     
     <div class="container">
        <div class="row">
          <div class="col-md-6 bgprimary text-center p-2">

            <h4 class="white-anchor">
              <a href="/">
                Connect to community business 
                <i class="fas fa-external-link-alt"></i>
                
              </a>
              
            </h4>
            
            
          </div>
          <div class="col-md-6 bgprimary text-center p-2">
              <h4 class="white-anchor">
                <a href="/">
                  Rent a house in your community 
                  <i class="fas fa-external-link-alt"></i>
                  
                </a>
                
              </h4>
          </div>
          
        </div>
        

        <div class="row mt-5">
          <div class="row">
            <div class="col-md-9 p-4">
              <h1 class="text-center"><strong>{!!$blog->title!!}</strong></h1>

                <p class="text-center"><strong> <i>{!! $blog->excerpt !!}</i></strong></p>
                <div class="sharethis-inline-share-buttons"></div>
               <p class="mt-5">{!! $blog->content !!}</p>
            </div>
            <div class="col-md-3" style="background-color: #e9ecef;">
              <h3 class="mb-3"> <u>Similar Posts</u></h3>
              @foreach($blog->similar_blogs as $similar)
              <a href="/blog/{{$similar->slug}}" class="primary"><h5>{{ $similar->title }}</h5></a>
              @endforeach

            </div>
          </div>
            
        </div>
     </div>
   
@endsection

@section('pagejs')

  
@endsection


