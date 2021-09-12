// create angular app
var validationApp = angular.module('validationApp', []);

// create angular controller
validationApp.controller('mainController', function ($scope, $rootScope, $http) {
    $scope.rating = {};
    $rootScope.reviews = [];
    $rootScope.limitCount = 0;

    // function to submit the form after all validation has occurred			
    $scope.submitForm = function (isValid) {
        console.log($scope.rating)
        // check to make sure the form is completely valid
        if (isValid) {
            var url = "./rest/store_reviews.php";
            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.rating), // pass in data as strings
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                } // set the headers so angular passing info as form data (not request payload)
            }).success(function (data) {
                $scope.getReviews();
            }).error(function (data, result) {
                console.error('Repos error', result, data);
            })["finally"](function () {
            });
        }
        else {

        }

    };
    $scope.getReviews = function () {
        var url = "./rest/getReviews.php";
        $http({
            method: 'GET',
            url: url,
            // pass in data as strings
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            } // set the headers so angular passing info as form data (not request payload)
        }).success(function (data) {
            angular.forEach(data, function (value, key) {
                $rootScope.reviews = value;
                $rootScope.limitCount = $rootScope.limitCount + 1;
                console.log($rootScope.reviews)
            });
        }).error(function (data, result) {
            console.error('Repos error', result, data);
        })["finally"](function () {
        });
    }
});