<?php

$cities_array = require './cities.php';

$my_cities = [];

foreach ($cities_array as $state => $cities) {
    $cityName = preg_split("/\s\(\w{2}\)/", $state)[0];
    preg_match("/\(\w{2}\)/", $state, $cityCodeExtract);
    $cityCode = preg_split("/[\(\)]/", $cityCodeExtract[0])[1];
    $city_array = [
        "cityCode" => $cityCode,
        "cityName" => $cityName,
        "cities" => $cities
    ];
    array_push($my_cities, $city_array);
}

// var_dump(json_encode($my_cities));

$file1 = fopen("./cities.json", 'w');
fwrite($file1, json_encode($my_cities));
fclose($file1);
