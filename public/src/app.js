var app = angular.module("app", [
    "ngRoute"
]);

// http://stackoverflow.com/questions/22996760/use-of-undefined-constant-assumed-id
app.config( function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/list', {
            templateUrl: '/partials/member/index',
            controller: 'listMemberCtrl'
        })
        .when('/add', {
            templateUrl: '/partials/member/create',
            controller: 'addMemberCtrl'
        })
        .when('/edit/:id?', {
            templateUrl: '/partials/member/edit',
            controller: 'editMemberCtrl'
        })
        .otherwise({
            redirectTo: '/list'
        });
}]);

app.factory("Member", function($resource) {
    return $resource('/api/v1/member/:id');
});

// Create a service to share data between controllers
// http://stackoverflow.com/questions/22408790/angularjs-passing-data-between-pages
app.factory("shareService", function() {
    var savedData = {};
    function set(data) {
        savedData = data;
        console.log("shareService SET " + JSON.stringify(data, 4, 2));
    }
    function get(data) {
        console.log("shareService GET " + JSON.stringify(savedData, 4, 2));
        return savedData;
    }
    return {
        set: set,
        get: get
    }
});

app.controller("editMemberCtrl", ['$scope', '$http', '$location', '$route', 'shareService', '$routeParams',
    function($scope, $http, $location, $route, shareService, $routeParams)
{
    $scope.mem = {};
    $http.get("/api/v1/member/" + $routeParams.id)
        .success(function(data, status, headers, config) {
            $scope.mem = data;
        })
        .error(function(data, status, headers, config) {
            alert("f");
        });
}]);

app.controller("listMemberCtrl", ['$scope', '$http', '$location', '$route', 'shareService', '$timeout',
    function($scope, $http, $location, $route, shareService, $timeout)
{
    $scope.members = [];
    $scope.onEdit = function(mem) {
        shareService.set(mem);
        $timeout(function () {
        });
        $location.path('#/edit'); if(!$scope.$$phase) $scope.$apply();
        window.location.href = "#/edit";
        console.log("absURL: " + $location.absUrl());
    };

    $scope.onDelete = function(id) {
        if (confirm("Co thuc su muon xoa ko?")) {
            $http.delete('/api/v1/member/' + id)
                .success(function(data, status, headers, config) {
                    alert("Success");
                    $location.path('#/list');
                    //$route.reload();
                })
                .error(function(data, status, headers, config) {
                    alert("Error!");
                });
        }
    };

    $http.get("/api/v1/member")
        .success(function(data, status, headers, config) {
            $scope.members = angular.fromJson(data);
            console.log("mems:" + JSON.stringify(
                $scope.members,
                4,
                2
            ));
        })
        .error(function(data, status, headers, config) {
            alert("F");
        });
}]);

app.controller("addMemberCtrl", function($scope, $http) {

});
