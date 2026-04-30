<header class="header">
    <div class="container header__inner">
        <a href="/index.php"><div class="header__logo">NODE</div></a>

        <div class="header__search">
            <input type="text" placeholder="Поиск">
            <button class="search-btn">🔍</button>
        </div>
        <nav class="header__nav">
            <a href="/catalog.php">Каталог</a>
            <a href="#">Доставка и оплата</a>
            <a href="#">О нас</a>
            <a href="#">Контакты</a>
            <a href="#">Помощь</a>
        </nav>
        <div class="header__actions">
            <?php
                if(isset($_COOKIE['email'])){
                    echo '<a href="../admin/index.php"><button class="icon-btn">Админ-панель</button></a>';
                    echo '<button class="icon-btn">🛒</button>';
                    echo '<button class="icon-btn">♡</button>';
                  echo  '<a href="/profile.php"><button class="btn btn--header">👤 Личный кабинет</button></a>';
                }
                else{
                    echo '<a href="/login.php"><button class="btn btn--header">Войти</button></a>';
                    echo '<a href="/register.php"><button class="btn btn--header">Зарегистрироватся</button></a>';
                }
            ?>
        </div>
    </div>
</header>
