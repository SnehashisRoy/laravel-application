@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
@endsection



@section('title', 'Bangla Toronto: List of Cities')




@section('content')




    
   
    <div ng-app="myApp" ng-controller="myCtrl">
        <div class="jumbotron text-center">
            <h3>Start typing  your city in search box below and click on desired City </h3>
        </div>
        <div class="container" style="min-height: 400px;">
            
            <div class="row mb-3">
                <div class="col">

                    <input class="form-control form-control-lg" ng-model="searchText" placeholder="Start Typing Your City" style="width:100%;">

                </div>
                
            </div>
            <div class="row" >
                <div ng-repeat="city in cities | filter: searchText" class="col-6 col-md-3 ">
                    <a href="/rent-basement-house-room-in/${city.city}$"><p>${ city.city}$</p></a>
                </div>
                
            </div>
            
        </div>
        
       
    </div>



    


   
@endsection


@section('pagejs')
            
	<script src="{{ url('/js/page/list-city.js')}}"></script>
	
@endsection