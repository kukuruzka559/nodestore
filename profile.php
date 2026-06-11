<?php
require_once 'lib/db.php';


$email = $_COOKIE['email'];

// Получаем данные пользователя
$stmt = $pdo->prepare("SELECT id, cart, favorites FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $user['id'];

// Парсим корзину (считаем количество каждого товара)
$cart_items = array_filter(explode(',', $user['cart'] ?? ''));
$cart_counts = array_count_values($cart_items);
$cart_products = [];
if (!empty($cart_counts)) {
    $in = str_repeat('?,', count($cart_counts) - 1) . '?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($in)");
    $stmt->execute(array_keys($cart_counts));
    $cart_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Парсим избранное
$fav_items = array_filter(explode(',', $user['favorites'] ?? ''));
$fav_products = [];
if (!empty($fav_items)) {
    $in = str_repeat('?,', count($fav_items) - 1) . '?';
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($in)");
    $stmt->execute($fav_items);
    $fav_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Получаем заказы пользователя
$stmt = $pdo->prepare("
    SELECT o.*, p.name, p.img, p.category 
    FROM orders o 
    JOIN products p ON o.product_id = p.id 
    WHERE o.user_id = ? 
    ORDER BY o.order_id DESC
");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/product-card.css">
    <link rel="stylesheet" href="css/profile/profile.css">
    <link rel="stylesheet" href="css/profile/profile-extra.css"> <!-- Новые стили -->

    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>
</head>
<body>
<?php include 'blocks/header.php'; ?>

<h1 class="auth-title"><?= htmlspecialchars($email) ?></h1>

<main class="profile-page">
    <div class="container">
        <h1 class="profile-title">Личный кабинет</h1>
        <!-- Разместить в блоке с заголовком профиля -->
        <div class="profile-header-actions">
            <a href="lib/logout.php" class="btn btn--outline btn--small">Выйти из аккаунта</a>
        </div>

        <div class="profile-flex-container">

            <!-- ЗАКАЗЫ -->
            <section class="profile-col orders-col">
                <h2 class="col-title">Ваши заказы</h2>
                <div class="orders-list">
                    <?php if(empty($orders)): ?>
                        <p>У вас пока нет заказов.</p>
                    <?php endif; ?>

                    <?php foreach($orders as $order): ?>
                        <div class="order-item" data-order-id="<?= $order['order_id'] ?>">
                            <div class="order-item__header">
                                <div>
                                    <span class="order-number">Заказ №<?= $order['order_id'] ?></span>
                                    <span class="order-status"><?= htmlspecialchars($order['status']) ?></span>
                                </div>
                                <!-- Иконка корзины для удаления заказа -->
<!--                                <button class="delete-order-btn">🗑</button>-->
                            </div>
                            <div class="order-item__info">
                                <div style="display:flex; gap: 30px; align-items: center; margin-bottom: 10px;">
                                    <img src="img/<?= $order['img'] ?>" alt="" style="width: -40px; height: 160px; object-fit: contain;">
                                    <div>
                                        <p style="font-weight: bold;"><?= htmlspecialchars($order['name']) ?></p>
                                        <p style="font-size: 12px; color: #888;"><?= htmlspecialchars($order['category']) ?> x<?= $order['count'] ?></p>
                                    </div>
                                </div>
                                <div style="display:flex; justify-content: space-between; width: 100%;">
                                    <p><?= $order['order_date'] ?></p>
                                    <p class="order-price">$<?= number_format($order['priceforone'] * $order['count'], 2) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ИЗБРАННОЕ -->
            <section class="profile-col wishlist-col">
                <h2 class="col-title">Избранное</h2>
                <?php if(!empty($fav_products)): ?>
<!--                    <div class="select-all-wrapper">-->
<!--                        <label><input type="checkbox" id="selectAllFav"> Выбрать все</label>-->
<!--                    </div>-->
                <?php else: ?>
                    <p>Нет избранных товаров.</p>
                <?php endif; ?>

                <div class="profile-products fav-list">
                    <?php foreach($fav_products as $prod): ?>
                        <article class="product-card fav-item" data-id="<?= $prod['id'] ?>">
<!--                            <div class="card-checkbox-wrapper">-->
<!--                                <input type="checkbox" class="fav-checkbox" value="--><?php //= $prod['id'] ?><!--">-->
                            <button class="wishlist-btn active" data-id="<?= $prod['id'] ?>" style="position: absolute; left: 20px; top: 20px">❤️</button>
<!--                            </div>-->
                            <div class="product-card__img-placeholder" style="background: url('img/<?= $prod['img'] ?>') no-repeat center / contain;"></div>

                            <div class="profile-prod-wraper">
                                <div style="display: flex; flex-direction: column; gap: 10px; align-items: flex-end;">
                                    <h3 class="product-card__title"><?= htmlspecialchars($prod['name']) ?></h3>
                                    <small><?= htmlspecialchars($prod['category']) ?></small>
                                </div>

                                <div class="product-card__footer">
                                    <span class="product-card__price">$<?= $prod['price'] ?></span>
                                    <button class="btn btn--primary btn--small" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>

                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- КОРЗИНА -->
            <section class="profile-col cart-col">
                <h2 class="col-title">Корзина</h2>
                <?php if(!empty($cart_products)): ?>
                    <div class="select-all-wrapper">
                        <label><input type="checkbox" id="selectAllCart"> Выбрать все</label>
                    </div>
                <?php else: ?>
                    <p>Корзина пуста.</p>
                <?php endif; ?>

                <div class="profile-products cart-list">
                    <?php foreach($cart_products as $prod):
                        $count = $cart_counts[$prod['id']];
                        ?>
                        <div class="cart-item" data-id="<?= $prod['id'] ?>">
                            <input type="checkbox" class="cart-checkbox" value="<?= $prod['id'] ?>" data-price="<?= $prod['price'] ?>">
                            <div class="cart-item__img" style="background: url('img/<?= $prod['img'] ?>') no-repeat center / contain;"></div>
                            <div class="cart-item__details">
                                <h4 class="cart-item__name"><?= htmlspecialchars($prod['name']) ?></h4>
                                <p class="cart-item__category" style="font-size:12px; color:#888;"><?= htmlspecialchars($prod['category']) ?></p>
                                <p class="cart-item__price" data-base-price="<?= $prod['price'] ?>">$<?= $prod['price'] ?></p>
                                <div class="cart-item__counter">
                                    <button class="count-btn minus">-</button>
                                    <span class="item-count"><?= $count ?></span>
                                    <button class="count-btn plus">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="cart-total">
                    <div class="total-row">
                        <span>Итого (выбрано):</span>
                        <span class="total-price" id="cartTotalPrice">$0.00</span>
                    </div>
                    <button class="btn btn--primary btn--full" id="checkoutBtn" disabled>Оформить заказ</button>
                </div>
            </section>

        </div>
    </div>
</main>

<!-- Контейнер для уведомлений (Toast) -->
<div id="toast-container"></div>

<?php include 'blocks/footer.php'; ?>
<script src="js/profile.js"></script> <!-- Подключение скрипта -->
</body>
</html>