'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
  .controller('MainCtrl', ['$scope', '$route', function($scope, $route) {
    $scope.$route = $route;
  }])
  .controller('MyCtrl1', ['$scope', '$http', 'Messages', function($scope, $http, Messages) {

  	$scope.title = "Title of view 1";

    $scope.errors = [];
    $scope.messages = Messages.get();
    $scope.message = {
      title: "",
      content: ""
    };

    $scope.addMessage = function() 
    {
      Messages.save(this.message, function(res) {
        $scope.messages.unshift({
          'id': res.id,
          'title': res.title,
          'content': res.content
        });
        $scope.empty();
      }, function(res) {
        $scope.errors.push(res.message);
      });
    };

    $scope.empty = function() {
      $scope.message.title = '';
      $scope.message.content = '';
    };

  }])
  .controller('MyCtrl2', ['$scope', function($scope) {
  	$scope.title = "Title of view 2"
  }]);