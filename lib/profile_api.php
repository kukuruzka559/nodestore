<?php
require_once 'db.php';
header('Content-Type: application/json');

if (!isset($_COOKIE['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Не авторизован']);
    exit;
}

$email = $_COOKIE['email'];
$action = $_POST['action'] ?? '';

// Получаем данные юзера
$stmt = $pdo->prepare("SELECT id, cart, favorites FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $user['id'];

if ($action === 'update_cart') {
    $product_id = $_POST['product_id'];
    $type = $_POST['type']; // 'plus' или 'minus'

    $cart = array_filter(explode(',', $user['cart'] ?? ''));

    if ($type === 'plus') {
        $cart[] = $product_id;
    } elseif ($type === 'minus') {
        $pos = array_search($product_id, $cart);
        if ($pos !== false) {
            unset($cart[$pos]);
        }
    }

    $new_cart = implode(',', $cart);
    $stmt = $pdo->prepare("UPDATE users SET cart = ? WHERE id = ?");
    $stmt->execute([$new_cart, $user_id]);

    echo json_encode(['status' => 'success']);
    exit;
}

if ($action === 'toggle_fav') {
    $product_id = $_POST['product_id'];
    $favs = array_filter(explode(',', $user['favorites'] ?? ''));

    $pos = array_search($product_id, $favs);
    if ($pos !== false) {
        unset($favs[$pos]); // Удаляем
        $state = 'removed';
    } else {
        $favs[] = $product_id; // Добавляем
        $state = 'added';
    }

    $new_favs = implode(',', $favs);
    $stmt = $pdo->prepare("UPDATE users SET favorites = ? WHERE id = ?");
    $stmt->execute([$new_favs, $user_id]);

    echo json_encode(['status' => 'success', 'state' => $state]);
    exit;
}

if ($action === 'delete_order') {
    $order_id = $_POST['order_id'];
    $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ? AND user_id = ?");
    $stmt->execute([$order_id, $user_id]);
    echo json_encode(['status' => 'success']);
    exit;
}

if ($action === 'checkout') {
    $product_ids = json_decode($_POST['product_ids'], true);
    if (empty($product_ids)) {
        echo json_encode(['status' => 'error', 'message' => 'Не выбраны товары']);
        exit;
    }

    $cart_items = array_filter(explode(',', $user['cart'] ?? ''));
    $date = date('Y-m-d');

    // Считаем сколько штук каждого ВЫБРАННОГО товара в корзине
    $counts = array_count_values($cart_items);

    foreach ($product_ids as $p_id) {
        if (!isset($counts[$p_id])) continue;
        $qty = $counts[$p_id];

        // Узнаем цену товара
        $stmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->execute([$p_id]);
        $price = $stmt->fetchColumn();

        // Создаем заказ (status = 'в обработке', warehouse/shop по дефолту 1)
        $stmt = $pdo->prepare("INSERT INTO orders (product_id, user_id, count, priceforone, status, warehouse_id, shop_id, order_date) VALUES (?, ?, ?, ?, 'в обработке', 1, 1, ?)");
        $stmt->execute([$p_id, $user_id, $qty, $price, $date]);
    }

    // Удаляем оформленные товары из строки корзины
    $remaining_cart = array_filter($cart_items, function($item) use ($product_ids) {
        return !in_array($item, $product_ids);
    });

    $new_cart = implode(',', $remaining_cart);
    $stmt = $pdo->prepare("UPDATE users SET cart = ? WHERE id = ?");
    $stmt->execute([$new_cart, $user_id]);

    echo json_encode(['status' => 'success']);
    exit;
}
?>