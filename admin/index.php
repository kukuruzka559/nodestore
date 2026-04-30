<?php
// Ограничение доступа можно добавить позже (сессии и тд)
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/global.css">


</head>
<body>
<div class="admin-layout">
    <!-- Сайдбар -->
    <?PHP require_once 'blocks/sidebar.php'; ?>


    <!-- Основной контент -->
    <main class="main-content">
        <header class="topbar">
            <a href="../index.php"><button class="btn btn--primary">Главная</button></a>
            <div class="search-bar">
                <input type="text" placeholder="Поиск">
            </div>
        </header>

        <div class="content-header">
            <div class="title-block">
                <h1>Каталог <span id="total-products" class="text-muted">0 товаров</span></h1>
            </div>
            <div class="actions-block">
                <button class="btn btn-primary" id="openAddModalBtn">+ Добавить товар</button>
            </div>
        </div>

        <!-- Таблица товаров -->
        <div class="table-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>ФОТО</th>
                    <th>НАИМЕНОВАНИЕ</th>
                    <th>КАТЕГОРИЯ</th>
                    <th>ЦЕНА</th>
                    <th>ДЕЙСТВИЯ</th>
                </tr>
                </thead>
                <tbody id="productsTableBody">
                <!-- Данные будут загружаться через JS -->
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Модальное окно (Добавление / Редактирование) -->
<div class="modal-overlay" id="productModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="modalTitle">Добавить товар</h2>
            <button class="close-btn" id="closeModalBtn">&times;</button>
        </div>
        <div class="modal-body">
            <form id="productForm">
                <input type="hidden" id="productId" name="id">

                <div class="form-group">
                    <label>Название товара</label>
                    <input type="text" id="productName" name="name" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Цена ($)</label>
                        <input type="number" id="productPrice" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <input type="text" id="productCategory" name="category">
                    </div>
                </div>

                <div class="form-group">
                    <label>Теги (через запятую)</label>
                    <input type="text" id="productTags" name="tags">
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <textarea id="productDescription" name="description" rows="3"></textarea>
                </div>

                <!-- Drag and Drop зона -->
                <div class="form-group">
                    <label>Фото товара</label>
                    <div class="drop-zone" id="dropZone">
                        <span class="drop-zone__prompt">Перетащите картинку сюда или кликните</span>
                        <input type="file" name="image" id="fileInput" class="drop-zone__input" accept="image/*">
                    </div>
                    <input type="hidden" id="existingImage" name="existing_img">
                </div>

                <button type="submit" class="btn btn-primary btn-full">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script src="js/sidebar.js"></script>
<script src="js/admin.js"></script>

</body>
</html>
