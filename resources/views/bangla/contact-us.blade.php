@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 
  <script src="https://www.google.com/recaptcha/api.js?render=6Lc0950UAAAAAM5_2pmnDbsYqjQ7Cib9bExzzNyG"></script>
  

@endsection



@section('title', 'Contact Us: Bangla Toronto')




@section('content')

      <div class="jumbotron text-center">

        <h2 class="primary bold"> <i class="fas fa-envelope-square primary mr-2"></i>Contact Us<h2>
        <p>Please feel free to contact us for any reason you might think we could be of any help.</p>
      </div>
       <!---contact us-->
       <form method="post" action="">
        {{ csrf_field() }}
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
                 <label for="email">Email</label>
                 <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email">
               </div>
               <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" name="name" id="name" placeholder="Password">
               </div>
               <div class="form-group">
                 <label for="phone">Phone</label>
                 <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
               </div>
                 
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                     <label for="Information">Information to send</label>
                     <textarea class="form-control" name="info" id="Information" rows="8"></textarea>
                   </div>
               </div>
               <input type="hidden" name="g-recaptcha-response" id="re_captcha">
               
               
               <div class="col-md-6">
                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
               </div>
             
              
          </div>
          
        </div>
       
       </form>
       <!---end contact us-->
       
   
@endsection

@section('pagejs')
<script type="text/javascript">
  grecaptcha.ready(function() {
      grecaptcha.execute('6Lc0950UAAAAAM5_2pmnDbsYqjQ7Cib9bExzzNyG', {action: 'contact'}).then(function(token) {
        document.querySelector('#re_captcha').value = token;
      });
  });
  
</script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $('#errors').fadeOut(10000);
  $('#flash').fadeOut(10000);
</script>

  
  

@endsection


