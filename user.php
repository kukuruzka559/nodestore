<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <!--    <link rel="stylesheet" href="css/hero.css">-->
    <!--    <link rel="stylesheet" href="css/top-products.css">-->
    <!--    <link rel="stylesheet" href="css/workspace.css">-->
    <!--    <link rel="stylesheet" href="css/sponsors.css">-->
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
<?php include 'blocks/header.php'; ?>

<link rel="stylesheet" href="css/auth/auth.css">
<link rel="stylesheet" href="css/product-card.css">
<link rel="stylesheet" href="css/profile/profile.css">

<h1 class="auth-title">
    <?php echo $_COOKIE['username']; ?>

</h1>

<!--можно сделать корзину и изрбранное на куках, а потом передавать их в бд при заказе. -->


<main class="profile-page">
    <div class="container">
        <h1 class="profile-title">Личный кабинет</h1>

        <div class="profile-flex-container">

            <section class="profile-col orders-col">
                <h2 class="col-title">Завершенные заказы</h2>


                <div class="orders-list">
                    <div class="order-item">
                        <div class="order-item__header">
                            <span class="order-number">Заказ №4521</span>
                            <span class="order-status">Доставлено</span>
                        </div>
                        <div class="order-item__info">
                            <p>24 марта 2026</p>
                            <p class="order-price">$1,299.00</p>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-item__header">
                            <span class="order-number">Заказ №3980</span>
                            <span class="order-status">Доставлено</span>
                        </div>
                        <div class="order-item__info">
                            <p>10 февраля 2026</p>
                            <p class="order-price">$450.00</p>
                        </div>
                    </div>
                </div>
            </section>



            <section class="profile-col wishlist-col">
                <h2 class="col-title">Избранное</h2>



                <div class="profile-products">


                    <article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn active">❤️</button>
                        </div>
                        <h3 class="product-card__title">Nothing Phone 2</h3>
                        <div class="product-card__footer">
                            <span class="product-card__price">$799.00</span>
                            <button class="btn btn--primary btn--small">В корзину</button>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn active">❤️</button>
                        </div>
                        <h3 class="product-card__title">Механическая клавиатура</h3>
                        <div class="product-card__footer">
                            <span class="product-card__price">$150.00</span>
                            <button class="btn btn--primary btn--small">В корзину</button>
                        </div>
                    </article>
                </div>
            </section>







            <section class="profile-col cart-col">
                <h2 class="col-title">Корзина</h2>


                <div class="profile-products">





                    <div class="cart-item">
                        <div class="cart-item__img"></div>
                        <div class="cart-item__details">
                            <h4 class="cart-item__name">Sony WH-1000XM5</h4>
                            <p class="cart-item__price">$399.00</p>
                            <div class="cart-item__counter">
                                <button>-</button>
                                <span>1</span>
                                <button>+</button>
                            </div>
                        </div>
                        <button class="cart-item__remove">×</button>
                    </div>

                    <div class="cart-item">
                        <div class="cart-item__img"></div>
                        <div class="cart-item__details">
                            <h4 class="cart-item__name">Видеокарта RTX 4070</h4>
                            <p class="cart-item__price">$650.00</p>
                            <div class="cart-item__counter">
                                <button>-</button>
                                <span>1</span>
                                <button>+</button>
                            </div>
                        </div>
                        <button class="cart-item__remove">×</button>
                    </div>
                </div>



                <div class="cart-total">
                    <div class="total-row">
                        <span>Итого:</span>
                        <span class="total-price">$1,049.00</span>
                    </div>
                    <button class="btn btn--primary btn--full">Оформить заказ</button>
                </div>
            </section>

        </div>
    </div>
</main>



<?php include 'blocks/footer.php'; ?>
</body>
</html>
