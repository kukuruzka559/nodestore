<aside class="sidebar">
    <div class="sidebar__logo">
        <span class="logo-icon"></span> Админ-панель
    </div>
    <nav class="sidebar__nav">
        <a href="index.php" class="nav-item">📦 Каталог</a>
        <a href="orders.php" class="nav-item">🛒 Заказы</a>
        <a href="users.php" class="nav-item">👥 Пользователи</a>

        <!-- Разворачивающийся список -->
        <div class="nav-dropdown">
            <div class="nav-item dropdown-toggle" id="pagesDropdown">
                <span>📄 Контент страниц</span>
                <span class="dropdown-arrow">→</span>
            </div>
            <div class="dropdown-content" id="pagesMenu">
                <a href="edit_home.php" class="nav-item sub-item">Главная</a>
                <a href="edit_delivery.php" class="nav-item sub-item">Доставка</a>
                <a href="edit_payment.php" class="nav-item sub-item">Оплата</a>
                <a href="edit_about.php" class="nav-item sub-item">О нас</a>
                <a href="edit_catalog.php" class="nav-item sub-item">Каталог</a>
            </div>
        </div>
    </nav>
</aside>
