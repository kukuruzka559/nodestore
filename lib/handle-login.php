<?php
$email = trim(filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));


if (strlen($email) < 3 || strlen($email) > 70) {echo "Error email"; exit; }
if (strlen($password) < 3 || strlen($password) > 100) {echo "Error password"; exit; }


//Password
$salt = 'rehrhenemy45275hrJBG944I3UJHB./BE/H';
$password = md5($password . $salt);

require "db.php";

$sql = "SELECT id FROM `users` WHERE `email` = ? AND `password` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);


if ($stmt->rowCount() == 0)
    {echo "Такого подльзоватиеля нет"; exit; }
else {
//    echo "Done";
//    $sql = "SELECT first username FROM `users` WHERE `email` = ? AND `password` = ?";
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute([$email, $password]);
    setcookie("email", $email, time() + (60 * 60 * 24 * 30), "/");

    header("Location: /profile.php");
}


