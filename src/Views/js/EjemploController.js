var app = angular.module('EjemploAngular', []);
app.controller('EjemploController', function($scope, $http) {
    $http({
        method: "GET",
        url: "http://localhost:8080/src/Controllers/hola-mundo"
    }).then(function success(res) {
        $scope.msg = res.data.hola;
    }, function error(res) {
        $scope.msg = res.statusText;
    });
});

app.controller("HttpGetController", function ($scope, $http) {


    $scope.SendData = function () {

      var req = {
          method: 'POST',
          url: 'http://localhost:8080/src/Controllers/upper-case',
          data: {fName: $scope.firstName, lName: $scope.lastName}
      }

      $http(req).then(function success(res) {
          $scope.msg = res.data.name;
      }, function error(res) {
          $scope.msg = res.statusText;
      });
    };

});
