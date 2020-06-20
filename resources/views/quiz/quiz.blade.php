@extends('layouts.app')


@section('vendorcss') 

@endsection

@section('vendorjs') 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cafe885240a800012587427&product=sticky-share-buttons' async='async'></script>

@endsection



@section('title', 'Bangla Toronto: List of Cities')




@section('content')




    
   
    <div ng-app="myApp" ng-controller="myCtrl" class="container" >
        <div class="text-center m-5">

            <h2>${ quiz.title }$ </h2>
        </div>
                <div ng-repeat="q in quiz.questions"  ng-show="show($index)" style="min-height: 400px;">
                     <div  class="row" ng-hide="answer[q.id]">
                         <div class="col-12 col-md-4">
                             <img src="${ 'http://localhost:8085/'+ quiz.image }$" class="img-fluid">
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

                    <div class="row">

                        <div class="col">
                            <p>বন্ধুদের সাথে শেয়ার করুন</p> 
                            <div class="sharethis-inline-share-buttons"></div>


                        </div>
                        
                    </div>

                    

                    

                        
            </div>
       
    </div>


    


   
@endsection


@section('pagejs')
    <script type="text/javascript">
        
        var quiz_id = {!! $id !!};
        var quiz = {!! json_encode($quiz) !!}
    </script>
            
	<script src="{{ url('/js/page/quiz.js')}}"></script>
	
@endsection