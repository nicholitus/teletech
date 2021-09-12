<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <style>
        body {
            padding-top: 30px;
        }
    </style>

    <!-- JS -->
    <script src="https://code.angularjs.org/1.4.0-rc.1/angular.js"></script>
    <script src="./assets/js/app.js"></script>
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <title>Review</title>
</head>

<body ng-app="validationApp" ng-controller="mainController">
    <div class="container">
        <!-- PAGE HEADER -->
        <div class="page-header">
            <h1>Rules Of Invasion: Madheart</h1>
        </div>

        <!-- pass in the variable if our form is valid or invalid -->
        <form ng-init="getReviews()" name="ratingForm" ng-submit="submitForm(ratingForm.$valid)" novalidate>
            <!--  Name -->
            <div class="form-group" ng-class="{ 'has-error' : ratingForm.name.$invalid && !ratingForm.name.$pristine }">
                <label>Name*</label>
                <input type="text" name="name" class="form-control" ng-model="rating.name" required>
                <p ng-show="ratingForm.name.$invalid && !ratingForm.name.$pristine" class="help-block">You name is required.</p>
            </div>
            <!-- Email -->
            <div class="form-group" ng-class="{ 'has-error' : ratingForm.email.$invalid && !ratingForm.email.$pristine }">
                <label>Email</label>
                <input type="email" name="email" class="form-control" ng-model="rating.email" required>
                <p ng-show="ratingForm.name.$invalid && !ratingForm.name.$pristine" class="help-block">Email is required.</p>
            </div>
            <!-- Rating -->
            <div class="form-group" ng-class="{ 'has-error' : ratingForm.rating.$invalid && !ratingForm.rating.$pristine }">
                <label>Rating</label>
                <input type="number" name="rating" class="form-control" ng-model="rating.rating" ng-minlength="1" required>
                <p ng-show="ratingForm.name.$invalid && !ratingForm.name.$pristine" class="help-block">Rating is required.</p>
            </div>
            <!-- Review -->
            <div class="form-group" ng-class="{ 'has-error' : ratingForm.review.$invalid && !ratingForm.review.$pristine }">
                <label>Review</label>
                <textarea name="review" class="form-control" ng-model="rating.review" required></textarea>
                <p ng-show="ratingForm.review.$invalid && !ratingForm.review.$pristine" class="help-block">Enter a valid review.</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    <div class="container">
        <!--Repeat Review Here from API  -->
        <div class="card mt-3" style="width: 100%;">
            <div class="card-header">
                Reviews
            </div>
            <div ng-repeat="review in reviews" class="card-body ">
                <p class="first-name" ng-bind="review.firstName"></p>
                <p class="email" ng-bind="review.email"></p>
                <p class="rating" ng-bind="review.rating"></p>
                <p class=" review" ng-bind="review.review"></p>
            </div>
        </div>
    </div>

    </div>
    <script src=" https://code.jquery.com/jquery-3.1.1.min.js">
    </script>
    <script script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>