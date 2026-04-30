<?php
require_once 'db.php';

header('Content-Type: application/json');

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

// Получаем текущую корзину пользователя
$stmt = $pdo->prepare("SELECT cart FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['status' => 'error', 'message' => 'Пользователь не найден']);
    exit;
}

// Превращаем строку в массив
$cart_str = $user['cart'];
$cart_array = empty($cart_str) ? [] : explode(',', $cart_str);

// В корзине нам не нужно проверять, есть ли уже товар.
// Мы просто добавляем его ID еще раз.
// В будущем на странице профиля функция array_count_values()
// сама посчитает, что если массив [1, 1, 5], значит товар #1 добавлен 2 раза.
$cart_array[] = $product_id;

// Склеиваем обратно
$new_cart_str = implode(',', $cart_array);

// Обновляем базу данных
$update_stmt = $pdo->prepare("UPDATE users SET cart = ? WHERE email = ?");
$update_stmt->execute([$new_cart_str, $email]);

echo json_encode(['status' => 'success']);
?>