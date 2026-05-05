<header class="header">
    <div class="container header__inner">
        <a href="/index.php">
            <img src="../icons/logo.svg" width="100">
        </a>

        <nav class="header__nav">
            <a class="header__links" href="/catalog.php">Каталог</a>
            <a class="header__links" href="#">Доставка и оплата</a>
            <a class="header__links" href="#">О нас</a>
            <a class="header__links" href="#">Контакты</a>
<!--            <a href="#">Помощь</a>-->
        </nav>

        <div class="header__search">
            <input type="text" placeholder="Поиск">
            <button class="search-btn">
                <img src="../icons/search.svg" width="24">
            </button>
        </div>

        <div class="header__actions">
            <?php
                if(isset($_COOKIE['email'])){
//                    echo '<a href="../admin/index.php"><button class="icon-btn">Админ-панель</button></a>';
                    echo '<button class="icon-btn">
                            <img src="../icons/Cart.svg" width="24">
                        </button>';
                    echo '<button class="icon-btn">
                            <img src="../icons/Like.svg" width="24">
                        </button>';
                  echo  '<a href="/profile.php"><button class="btn btn--header">
<img src="../icons/profile.png" width="30">
Личный кабинет</button></a>';
                }
                else{
                    echo '<a href="/login.php"><button class="btn btn--header">
<img src="../icons/user.svg">
Войти</button></a>';
                    echo '<a href="/register.php"><button class="btn btn--header">
<img src="../icons/user-add.svg">
Зарегистрироватся</button></a>';
                }
            ?>
        </div>
    </div>
</header>
