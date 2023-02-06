<?php

// ⚠️ from Security chapter in textbook (16.5 Security Best Practices, Listing 16.3)

require 'database/DatabaseHelper.php';
$config = require 'database/config.php';

$db = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT digest
    FROM adminlogin
    WHERE username = :user
QUERY;


$retrieved_digest = $db->run($query, [":user" => "jp"])->fetch(PDO::FETCH_COLUMN);
var_dump($retrieved_digest);
var_dump(password_verify("bagel", $retrieved_digest));
