@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs')

@endsection



@section('title', 'Bangla Toronto: create listing ')




@section('content')

    <form method="post" action="">
     @csrf
     <div class="container pt-2 pb-5">
       <div class="text-center p-2">
           @if ($errors->any())
               <div class="alert alert-danger validation-message" id="errors">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           @if (session('status'))
               <div class="alert alert-success validation-message" id="flash">
                   {{ session('status') }}
               </div>
           @endif
           
       </div>
       <div class="row justify-content-md-center" id="target-contact-1">


            <div class="col-md-6">
              
            <div class="form-group">
              <label for="title">Title of Ad</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Title of Ad">
            </div>
            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" class="form-control" name="Address" id="Address" placeholder="Address">
            </div>

            <div class="form-group">
                <label for="type">Type of House</label>
                <select class="form-control" id="type" name="type" placeholder="Type of House">
                  <option>Main Floor/Full house</option>
                  <option>Basement</option>
                  
                </select>
              </div>
              
             
              
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" rows="8"></textarea>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="bedroom">Bedroom</label>
                  <select class="form-control" id="bedroom" name="bedroom" placeholder="Number of Bedroom">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    
                  </select>
                </div>
              
              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                  <label for="bathroom">Bathroom</label>
                  <select class="form-control" id="bathroom" name="bathroom" placeholder="Number of Bathroom">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>

                  </select>
                </div>
              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="size">Size (in sq. feet)</label>
                <input type="number" class="form-control" name="size" id="size" placeholder="Size of Rent Property">
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Monthly rent of property">
              </div>
              
            </div>

            
            
          </div>
          <div class="row justify-content-md-center">

            <div class="col-md-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="pet_friendly"  name="pet_friendly" value="1">
                <label class="form-check-label" for="pet_friendly"> Pet Friendly</label>
              </div>
              
            </div>

            <div class="col-md-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="parking" name="parking" value="1">
                <label class="form-check-label" for="parking">Parking</label>
              </div>
              
            </div>

             <input type="hidden" name="g-recaptcha-response" id="re_captcha">


          </div>

            <div class="row justify-content-md-center mt-3">
                <div class="col-md-6">
                     <button type="submit" class="btn btn-dark btn-block">Submit</button>
                </div>
              
            </div>

       </div>
       
     </div>
    
    </form>

   
@endsection

@section('pagejs')

  
@endsection


