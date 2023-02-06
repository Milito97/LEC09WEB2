<?php

// 

require '../database/DatabaseHelper.php';
$config = require '../database/config.php';

$db = new DatabaseHelper($config);

// ❓❓ What are successful results supposed to look like?
// ⚠️ That's imporant to know, because it drives the creation of our query! 


// var_dump($query_result); // ❓❓ If we try this before the header() calls, boom. Why? 

$resp = json_encode($query_result, JSON_FORCE_OBJECT);

header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo ($resp);

// ⚠️ I'd validate your JSON using something like https://jsonformatter.curiousconcept.com
