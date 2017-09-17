var myApp = angular.module('ClientesCRUD', []);

myApp.controller('ClientesController', function($scope, $http){
  $scope.init = function() {
     $scope.listar();
     $scope.cliente = {};
  };

  $scope.listar = function(){
    $http.get('http://localhost/CrudCodeIgniterAngularJS/index.php/Clientes/ListarTodos')
        .then(function successCallback(response)
         {
            $scope.clientes = response.data;
         },
         function errorCallback(response) {
         }
       );
   };

   $scope.salvar = function(){
       $http({method: 'POST',
              url: 'http://localhost/CrudCodeIgniterAngularJS/index.php/Clientes/salvar',
              data: $scope.cliente
        }).then(function successCallback(){
           $scope.listar();
        });
   };

  $scope.init();

});
