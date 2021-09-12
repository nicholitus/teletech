<?php
// array
$review = array(
    "firstName" => $_POST['name'],
    "email" => $_POST['email'],
    "rating" => $_POST['rating'],
    "review" => $_POST['review'],
);
// Check if file is existing
$checkfile = file_exists("review.json");
if ($checkfile == 1) {

    $inp = file_get_contents('review.json');


    $tempdata = json_decode($inp, true);
    $tempdata[] = $review;
    $jsonData = json_encode($tempdata);
    file_put_contents('review.json', $jsonData);
    echo json_encode(array('result' => 1, 'message' => 'Review Submitted'));
    exit();
}
// encode array to json
$json = json_encode(array("0" => $review));

//write json to file
if (file_put_contents("review.json", $json))
    echo json_encode(array('result' => 1, 'message' => 'Review Submitted'));
else
    echo json_encode(array('result' => 1, 'message' => 'Check your inputs'));
