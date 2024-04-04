<?php

$cities_array = require './cities.php';

$my_cities = [];

foreach ($cities_array as $state => $cities) {
    $stateName = preg_split("/\s\(\w{2}\)/", $state)[0];
    preg_match("/\(\w{2}\)/", $state, $stateCodeExtract);
    $stateCode = preg_split("/[\(\)]/", $stateCodeExtract[0])[1];
    $city_array = [
        "stateCode" => $stateCode,
        "stateName" => $stateName,
        "cities" => $cities
    ];
    array_push($my_cities, $city_array);
}

// var_dump(json_encode($my_cities));

$file1 = fopen("./cities.json", 'w');
fwrite($file1, json_encode($my_cities));
fclose($file1);
