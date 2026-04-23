<?php

$username = trim(filter_var($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));

    /*$email = $_POST["email"];
    $password = $_POST["password"];*/


/*echo $username;
echo $email;
echo $password;*/

if (strlen($username) < 3 || strlen($username) > 12) {echo "Error"; exit; }
if (strlen($email) < 3 || strlen($username) > 70) {echo "Error email"; exit; }
if (strlen($password) < 3 || strlen($password) > 100) {echo "Error password"; exit; }


//Password
$salt = 'rehrhenemy45275hrJBG944I3UJHB./BE/H';
$password = md5($password . $salt);



//DB

//$pdo = new PDO('mysql:host=localhost;dbname=php-website;port=3306', 'root', '');

require "db.php";

$sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $password]);
header("Location: /index.php");