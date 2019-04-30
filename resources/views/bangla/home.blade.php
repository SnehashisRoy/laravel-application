@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 

@endsection



@section('title', 'Bangla Toronto: Usefull Information for Bangla Speaking Canadian')




@section('content')

     
       <div class="hero-image">
         <div class="text-center">
                  <h2 class="hero-text bold">Rent a house in your community </h2>
                 <a href="/map-view"><button class="btn btn-light btn-lg bgprimary white">Connect</button></a>
                          
         </div>
         <div class="text-center">
                   <h2 class="hero-text bold">Community Businesses</h2>
                   <button class="btn btn-light btn-lg bgprimary white" id="click-community">Connect</button>
                         
         </div>
       </div>
       <div class="container-fluid">
       <div class="row" style="background-color: #001f3f; padding: 20px;" id="target-community">
        <div class="col-12">
          <div class="text-center pb-5">
            <i class="fas fa-briefcase fa-3x white"></i>
            <h3 class="white" > Community Businesses </h3>
          </div>
            
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>House</u></li>
              <li><a href="/businesses/real-estate-agent" class="white">Realtors</a></li>
              <li><a href="/businesses/house-repair" class="white">House Repair and Electric</a></li>
              <li><a href="#" class="white">Rent a house</a></li>
              <li><a href="/businesses/mover" class="white">House Mover</a></li>
            </ul>
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>Car </u></li>
              <li><a href="/businesses/rental" class="white">Rent a car</a></li>
              <li><a href="/businesses/buy-cars" class="white">Buy Cars</a></li>
              <li><a href="/businesses/driving" class="white">Learn Driving</a></li>
              <li><a href="/businesses/auto-repair" class="white">Auto Repair</a></li>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>Business Services</u></li>
              <li><a href="/businesses/travel-agents" class="white">Travel Agents</a></li>
              <li><a href="/businesses/law-immigration" class="white">Law and Immigration</a></li>
              <li><a href="/businesses/insurance" class="white">Insurance</a></li>
              <li><a href="/businesses/mortgage" class="white">Mortgage and Debt</a></li>
              <li><a href="/businesses/tax-return" class="white">Tax Return</a></li>
              <li><a href="/businesses/computer-graphics" class="white">Computer and Graphics</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>Life Style</u></li>
              <li><a href="/businesses/restaurant-party" class="white">Restaurant and Party Hall</a></li>
              <li><a href="/businesses/grocery" class="white">Grocery</a></li>
              <li><a href="/businesses/catering" class="white">Catering</a></li>
              <li><a href="/businesses/shopping" class="white">Shopping</a></li>
              
            </ul>
            
          </div>
          
        </div>
        <div class="col col-md-3 white">
          <div>
            <ul class="business-list">
              <li class="secondary" style="font-size: 130%;"><u>Health and Edu</u></li>
              <li><a href="/businesses/doctor" class="white">Doctor</a></li>
              <li><a href="/businesses/pharmacy" class="white">Pharmacy</a></li>
              <li><a href="/businesses/dental-clinic" class="white">Dental Clinic</a></li>
              <li><a href="/businesses/homeopath" class="white">Homeopath</a></li>
              <li><a href="/businesses/tutorial" class="white">Tutorial</a></li>
            </ul>
            
          </div>
          
        </div>
         
       </div>
       <!---partners-->
        <div class="container p-5">
          <div class="text-center p-2">
            <i class="fas fa-handshake fa-3x primary"></i>
            <h2 class="primary bold">Community Partners<h2>
          </div>
          <div class="row text-center" >

               <p class="p-3"> We are trying build this online platform as a great source of usefull information. We believe that 'Ease of getting information is not a priority. It's essential for life. Information opens up new horizon.'
               If you want to be the part of our journey, please <a href="/contact-us">contact us</a>. We will display the logo of our partners in this section. We are looking for partners who will help to make our journey a success. </p>
              
          </div>
          
        </div>
       
       <!---end partners-->
       
   
@endsection

@section('pagejs')

  <script type="text/javascript">
    // var link1 = document.querySelector('#click-contact-1');
    // var target1 = document.querySelector('#target-contact-1');
    var link2 = document.querySelector('#click-community');
    var target2 = document.querySelector('#target-community');

    //link1.addEventListener('click', function(){

    //   window.scroll({
    //       top: target1.offsetTop,
    //       left: 0,
    //       behavior: 'smooth'
    //     });
    // })
    console.log(link2);
    link2.addEventListener('click', function(){

      console.log(target2);

      window.scroll({
          top: target2.offsetTop,
          left: 0,
          behavior: 'smooth'
        });
    })

  </script>

@endsection


