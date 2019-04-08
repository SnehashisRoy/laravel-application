@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Page Title')




@section('content')

     <div class="container-fluid">
       <div class="row">
         <div class="col-12 col-md-6 hero-div-1">
           <div class="hero-image-1">
                        <div class="hero-text">
                            <h2 style="letter-spacing: 2px;"> <span style="font-size: 140%;"><strong>Community Businesses are right here!</strong></span></h2>
                           <button class="btn btn-light btn-lg" id="click-community">Connect</button>
                          </div>
                          
            </div>
         </div>
         <div class="col-12 col-md-6 hero-div-2">
          <div class="hero-image-2" >
                       <div class="hero-text">
                           <h2 style="letter-spacing: 2px;"> <span style="font-size: 140%;"><strong>Find a house in your community</strong></span></h2>
                           <button class="btn btn-light btn-lg">Connect</button>
                         </div>
                         
           </div>
         </div>
       </div>
       <div class="row" style="background-color: #001f3f; padding: 20px;" id="target-community">
        <div class="col-12">
          <div class="text-center pb-5">
            <i class="fas fa-briefcase fa-3x white"></i>
            <h3 class="white bold" > Community Businesses </h3>
          </div>
            
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              <li><a href="#" class="white">Dapibus ac facilisis in</a></li>
              
            </ul>
            
          </div>
          
        </div>
         
       </div>
       <!---contact us-->
       <form>
        <div class="container p-5">
          <div class="text-center p-2">
            <i class="fas fa-envelope-square fa-3x primary"></i>
            <h2 class="primary bold">Contact Us<h2>
          </div>
          <div class="row" id="target-contact-1">

               <div class="col-md-6">
                 <div class="form-group">
                 <label for="exampleInputEmail1">Email</label>
                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1">Name</label>
                 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
               </div>
               <div class="form-group">
                 <label for="exampleInputPassword1">Phone</label>
                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
               </div>
                 
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                     <label for="exampleFormControlTextarea1">Example textarea</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                   </div>
               </div>
               
               
               <div class="col-12">
                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
               </div>
             
              
          </div>
          
        </div>
       
       </form>
       <!---end contact us-->
       <!---footer-->
       <div class="row bgprimary white p-4 pl-5">

            
          <div class="col col-md-6 ">
            <ul class="business-list" style="list-style: none;">
              <li><a href="#" class="white"> Contact Us</a></li>
              <li><a href="#" class="white"> Blogs</a></li>
              <li><a href="#" class="white"> Rent Your House</a></li>
              
              
            </ul>
          </div>
          <div class="col col-md-6 social">

            <a href="#" class="white"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="white"><i class="fab fa-google-plus fa-2x"></i></a>
            <a href="#" class="white"><i class="fab fa-pinterest fa-2x"></i></a>
            <a href="#" class="white"><i class="fab fa-twitter fa-2x"></i></a>


          </div>


         
       </div>
       <!---end footer-->
       <div class="text-center primary bold p-3">
         This site is developed, managed and marketed by Web360. For your web solutions , please contact at 647745840.
       </div>

      </div>
   
@endsection

@section('pagejs')

  <script type="text/javascript">
    var link1 = document.querySelector('#click-contact-1');
    var target1 = document.querySelector('#target-contact-1');
    var link2 = document.querySelector('#click-community');
    var target2 = document.querySelector('#target-community');

    link1.addEventListener('click', function(){

      window.scroll({
          top: target1.offsetTop,
          left: 0,
          behavior: 'smooth'
        });
    })

    link2.addEventListener('click', function(){

      window.scroll({
          top: target2.offsetTop,
          left: 0,
          behavior: 'smooth'
        });
    })

  </script>

@endsection


