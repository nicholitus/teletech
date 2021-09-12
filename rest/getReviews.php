<?php
$inp = file_get_contents('review.json');

$tempArray = json_decode($inp, true);
echo json_encode(array($tempArray));
