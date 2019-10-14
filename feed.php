<?php 
    session_start();
    if(!isset($_SESSION["userauth"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <h1><?php if(isset($_COOKIE['username'])) {echo "Hello " . $_COOKIE['username'];} ?></h1>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>