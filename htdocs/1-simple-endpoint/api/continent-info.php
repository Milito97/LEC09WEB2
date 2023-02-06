<?php

// 

require '../database/DatabaseHelper.php';
$config = require '../database/config.php';

$db = new DatabaseHelper($config);

// ❓❓ What do we want to actually return? We can't code unless we have a goal!


$query = <<<QUERY
  SELECT
    ContinentCode AS code,
    ContinentName AS name 
  FROM
    continents
  WHERE 
  	ContinentCode  = :code
QUERY;


$query_result = $db->run($query, [":code" => $_GET['code']])->fetch();
// var_dump($query_result); // ❓❓ If we try this before the header() calls, boom. Why? 

if ($query_result) {
  $resp = json_encode($query_result, JSON_FORCE_OBJECT);
} else {
  $resp =
    json_encode([], JSON_FORCE_OBJECT);
}


// var_dump($resp);
// header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo ($resp);

// ⚠️ I'd validate your JSON using something like https://jsonformatter.curiousconcept.com
