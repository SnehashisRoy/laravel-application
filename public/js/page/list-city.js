
var API_HOST = 'http://www.banglatoronto.ca';

var app = angular.module('myApp', [], function($interpolateProvider)
  {
      $interpolateProvider.startSymbol('${');
      $interpolateProvider.endSymbol('}$'); 
  });


app.controller("myCtrl", function($scope, $http) {


	$http.get(API_HOST+'/web-api/v1/cities/').then(function(d){
		
		    $scope.cities = d.data;
	});
    
});