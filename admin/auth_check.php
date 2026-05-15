<?php
session_start();

// Если в сессии нет метки авторизации — выкидываем на логин
if (!isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] !== true) {
    header('Location: login.php');
    exit;
}
?>