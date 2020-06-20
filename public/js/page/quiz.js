var API_HOST = 'http://localhost:8085';

var app = angular.module('myApp', [], function($interpolateProvider)
  {
      $interpolateProvider.startSymbol('${');
      $interpolateProvider.endSymbol('}$'); 
  });


app.controller("myCtrl", function($scope, $http) {


			$scope.currentQuiz = 0;

			$scope.answer = {};


			

			$scope.resultPercent = 40;
		    $scope.quiz = quiz;

		    $scope.resultSlide = false;

		    console.log($scope.quiz);

		    $scope.next = function(){

		    		$scope.currentQuiz +=1;

		    		

		    		if($scope.currentQuiz == $scope.quiz.questions.length){

		    			$scope.calculateScore();

		    			$scope.resultSlide = true;


		    		}

		    	
		    	
		    }

		    $scope.calculateScore = function(){

		    	let totalAnswer = 0;

		    	let totalCorrectAnswer = 0;

		    	for(let key in $scope.answer){

		    		totalAnswer +=1;


		    		if($scope.answer[key] == 'correct'){
		    			totalCorrectAnswer +=1;
		    		};
		    	}

		    	$scope.resultPercent = Math.ceil(totalCorrectAnswer*100/totalAnswer);


		    }

		    
		    

		    $scope.show = function(id){

		    	return $scope.currentQuiz == id;
		    }

		    $scope.isCorrect = function(){
		    	return false;
		    }

		    $scope.checkAnswer = function(choice_id, question_id){

		    	for(i in $scope.quiz.questions){
		    		if($scope.quiz.questions[i].answer == choice_id){
		    			
		    			$scope.answer[question_id] = 'correct';

		    			return;
		    		}
		    	}
		    	$scope.answer[question_id] = 'wrong';
		    	
		    }
	
    
});