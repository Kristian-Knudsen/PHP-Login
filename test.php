<?php
$timeTarget = 0.05; // 50 milliseconds 

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;

require 'functions.php';
echo("hashed password is " . hashpassword('123'));