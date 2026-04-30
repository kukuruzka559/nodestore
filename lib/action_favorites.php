<?php
require_once 'db.php';

// Указываем, что ответ будет в формате JSON
header('Content-Type: application/json');

// Проверяем, авторизован ли пользователь (есть ли куки)
if (!isset($_COOKIE['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Пожалуйста, войдите в аккаунт']);
    exit;
}

$email = $_COOKIE['email'];
$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    echo json_encode(['status' => 'error', 'message' => 'ID товара не передан']);
    exit;
}

// Получаем текущие избранные товары пользователя
$stmt = $pdo->prepare("SELECT favorites FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['status' => 'error', 'message' => 'Пользователь не найден']);
    exit;
}

// Превращаем строку "1,5,12" в массив. Если строка пустая - создаем пустой массив.
$favorites_str = $user['favorites'];
$favorites_array = empty($favorites_str) ? [] : explode(',', $favorites_str);

$action = '';

// Проверяем, есть ли уже этот товар в избранном
$key = array_search($product_id, $favorites_array);

if ($key !== false) {
    // Товар найден -> удаляем его из массива (убираем лайк)
    unset($favorites_array[$key]);
    $action = 'removed';
} else {
    // Товар не найден -> добавляем в массив (ставим лайк)
    $favorites_array[] = $product_id;
    $action = 'added';
}

// Склеиваем массив обратно в строку через запятую
$new_favorites_str = implode(',', $favorites_array);

// Обновляем базу данных
$update_stmt = $pdo->prepare("UPDATE users SET favorites = ? WHERE email = ?");
$update_stmt->execute([$new_favorites_str, $email]);

// Отправляем ответ обратно в JS
echo json_encode(['status' => 'success', 'action' => $action]);
?>