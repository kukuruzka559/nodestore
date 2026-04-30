<?php
// Здесь можно добавить проверку прав доступа
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы | Админ-панель</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/orders_admin.css">
    <link rel="stylesheet" href="../css/global.css">


</head>
<body>
<div class="admin-layout">
    <!-- Сайдбар -->
    <?PHP require_once 'blocks/sidebar.php'; ?>

    <main class="main-content">
        <header class="topbar">
            <a href="../index.php"><button class="btn btn--primary">На сайт</button></a>
            <div class="search-bar">
                <input type="text" id="orderSearch" placeholder="Поиск по ID заказа или Email...">
            </div>
        </header>

        <div class="content-header">
            <h1>Управление заказами <span id="total-orders" class="text-muted">0 записей</span></h1>
            <button class="btn btn-primary" id="openAddOrderModalBtn">+ Новый заказ</button>
        </div>

        <!-- Быстрая фильтрация -->
        <div class="status-filters">
            <button class="filter-btn active" data-status="all">Все</button>
            <button class="filter-btn" data-status="В обработке">В обработке</button>
            <button class="filter-btn" data-status="Отправлен">Отправлен</button>
            <button class="filter-btn" data-status="Транспортировка">Транспортировка</button>
            <button class="filter-btn" data-status="Готов к получению">Готов к получению</button>
            <button class="filter-btn" data-status="Получен">Получен</button>
            <button class="filter-btn" data-status="Завершен">Завершен</button>
        </div>

        <div class="table-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>ДАТА</th>
                    <th>КЛИЕНТ (ID/Email)</th>
                    <th>ТОВАР</th>
                    <th>КОЛ-ВО</th>
                    <th>СУММА</th>
                    <th>СТАТУС</th>
                    <th>ДЕЙСТВИЯ</th>
                </tr>
                </thead>
                <tbody id="ordersTableBody">
                <!-- Загрузка через JS -->
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Модальное окно заказа -->
<div class="modal-overlay" id="orderModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="orderModalTitle">Редактировать заказ</h2>
            <button class="close-btn" id="closeOrderModalBtn">&times;</button>
        </div>
        <div class="modal-body">
            <form id="orderForm">
                <input type="hidden" id="orderId" name="order_id">

                <div class="form-row">
                    <div class="form-group">
                        <label>ID Пользователя</label>
                        <input type="number" id="orderUserId" name="user_id" required>
                    </div>
                    <div class="form-group">
                        <label>ID Товара</label>
                        <input type="number" id="orderProductId" name="product_id" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Количество</label>
                        <input type="number" id="orderCount" name="count" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Цена за шт. ($)</label>
                        <input type="number" step="0.01" id="orderPrice" name="priceforone" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Статус</label>
                    <select name="status" id="orderStatus">
                        <option value="В обработке">В обработке</option>
                        <option value="Отправлен">Отправлен</option>
                        <option value="Транспортировка">Транспортировка</option>
                        <option value="Готов к получению">Готов к получению</option>
                        <option value="Получен">Получен</option>
                        <option value="Завершен">Завершен</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-full">Сохранить заказ</button>
            </form>
        </div>
    </div>
</div>

<script src="js/orders_admin.js"></script>
<script src="js/sidebar.js"></script>
</body>
</html>