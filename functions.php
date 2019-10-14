<?php 
try {
    $conn = new PDO('mysql:host=localhost;dbname=PHPLoginTemplate', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
function hashpassword($plain_pswd) {
    return password_hash($plain_pswd, PASSWORD_DEFAULT, ['cost' => 10]); // password_default = bcrypt. Returns hashed password
}
function login($username, $password) {
    global $conn;
    if(empty($username) || empty($password)) {
        echo "Password or username wrong";
        return False;
    } else {
        $stmt = $conn->prepare("SELECT pswd FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $res['pswd'])) {
            setcookie("username", $username, time()+60);
            return True;
        } else {
            return False;
        }
    }
}
function register($username, $email, $password, $confpassword) {
    global $conn;
    if(empty($username) || empty($email) || empty($password) || empty($confpassword)) {
        return False;
    } else {
        if($password === $confpassword) {
            $hashedpassword = hashpassword($password);
            $stmt = $conn->prepare("INSERT INTO users (username, email, pswd) VALUES (:username, :email, :pswd)");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":pswd", $hashedpassword);
            $stmt->execute();
            return True;
        } else {
            return False;
        }
    }
}