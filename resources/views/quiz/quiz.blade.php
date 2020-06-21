@extends('layouts.app')


@section('vendorcss') 
    <meta property="og:url"                content="{{$quiz->url}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$quiz->title}}" />
    <meta property="og:description"        content="{{$quiz->description}}" />
    <meta property="og:image"              content="{{$quiz->image_url}}" />

    <link rel="stylesheet" type="text/css" href="/js/vendors/angular-social/angular-social.css">

@endsection

@section('vendorjs') 
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script src="/js/vendors/angular-social/angular-social.js" type="text/javascript"></script>

@endsection



@section('title',  $quiz->title )




@section('content')




    
   
    <div ng-app="myApp" ng-controller="myCtrl">
        <div class="text-center m-5">

            

            <h2>${ quiz.title }$ </h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                        <div ng-repeat="q in quiz.questions"  ng-show="show($index)" style="min-height: 400px;">
                             <div  class="row" ng-hide="answer[q.id]">
                                 <div class="col-12 col-md-4">
                                     <img src="${ 'http://banglatoronto.ca/'+ quiz.image }$" class="img-fluid">
                                 </div>
                                 <div class="col-12 col-md-8" >
                                     <p>${ q.question}$</p>
                                     
                                     <div class="form-check" ng-repeat = "choice in q.choices">
                                       <label class="form-check-label">
                                         <input  ng-click= "checkAnswer(choice.id, q.id)" class="from-check-input" type="radio" name="${q.id+'options'}$"> ${ choice.choice}$
                                       </label>
                                     </div>
                                 </div>
                            </div>
                            <div class="row" ng-show="answer[q.id]">
                                <div class="col-12 col-md-3">
                                    <p> 
                                     <span ng-if="answer[q.id] == 'wrong' " style="color: red;"><i class="fas fa-times-circle fa-2x"></i></span>
                                     <span ng-if="answer[q.id] == 'correct' "style="color: green;"><i class="fas fa-check-circle fa-2x"></i></span> Answer: ${answer[q.id]}$
                                     </p>
                                </div>
                                 <div class="col-12 col-md-9" >
                                     <p>${ q.question}$</p>
                                     <p>${q.explanation}$</p>
                                     <button ng-click="next()" type="button" class="btn btn-success">Next</button>
                                 </div>
                            </div>


                            
                        </div>

                        <div  class="container text-center" ng-if = "resultSlide">

                            <div class="row justify-content-center">

                                <div class="col"> <h2>আপনার স্কোর</h2> </div>
                                
                            </div>

                            <div class="row justify-content-center">

                                <div class="col">
                                    <div class="semi-donut-model-2 margin"
                                         style="--percentage : ${ resultPercent }$ ; --fill: #039BE5 ;">
                                       ${ resultPercent + '%'}$
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row justify-content-center">

                                <div class="col mt-5 mb-5">
                                    <p>বন্ধুদের সাথে শেয়ার করুন</p>
                                    <ul ng-social-buttons>
                                         
                                        <li class="ng-social-facebook">Facebook</li>
                                        <li class="ng-social-twitter">Twitter</li>
                                        <li class="ng-social-pinterest">Pinterest</li>
                                    </ul> 


                                </div>
                                
                            </div>

                            

                            

                                
                    </div>
                    
                </div>
                <div class="col-12 col-md-3 text-center">
                    <h3>Other quizes</h3>
                </div>
            </div>
            
        </div>

                
       
    </div>


    


   
@endsection


@section('pagejs')
    <script type="text/javascript">
        
        var quiz_id = {!! $id !!};
        var quiz = {!! json_encode($quiz) !!};
    </script>
            
	<script src="{{ url('/js/page/quiz.js')}}"></script>
	
@endsection