<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница - Магазин электроники</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/top-products.css">
    <link rel="stylesheet" href="css/workspace.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?PHP require_once 'blocks/header.php'; ?>

    <main>
        <section class="hero">
            <div class="container hero__inner">
                <div class="hero__content">
                    <h1 class="hero__title">NOTHING PHONE 4A PRO</h1>
                    <p class="hero__desc">Lorem ipsum dolor sit amet consectetur. Egestas sem dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="hero__tags">
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                        <span class="tag">Lorem ipsum</span>
                    </div>
                </div>

                <div class="hero__bottom">
                    <div class="hero__videos">
                        <div class="video-thumb"><span>▶ Смотреть</span></div>
                        <div class="video-thumb"><span>▶ Смотреть</span></div>
                        <div class="video-thumb"><span>▶ Смотреть</span></div>
                    </div>
                    <div class="hero__cta">
                        <button class="btn btn--outline">Каталог</button>
                        <button class="btn btn--primary">Перейти к товару</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="top-products">
            <div class="container">
                <h2 class="section-title">ТОП ТОВАРОВ</h2>
                <div class="products-grid">

                    <?php
                        require_once 'lib/db.php';

//                        $sql = 'SELECT * FROM trending ORDER BY id DESC LIMIT 4';
                    $sql = 'SELECT * FROM trending ORDER BY id LIMIT 4';



                        $query = $pdo->prepare($sql);
                        $query->execute();
                        $trendprod = $query->fetchAll(PDO::FETCH_OBJ);

                        /*print_r($trendprod);*/
                        foreach ($trendprod as $prod) {
                            echo '
                                <article class="product-card">
                                    <div class="product-card__img-placeholder" style="background: url(\'img/'.$prod->img.'\') no-repeat center / contain;">
                                        <button class="wishlist-btn">♡</button>
                                    </div>
                                    <h3 class="product-card__title"> '.$prod->productname.' </h3>
                                    <div class="product-card__tags">
                                        <!--<span class="tag-small"></span>-->
                                        <span class="tag-small">'.$prod->tags.'</span>
                                        <!--span class="tag-small">Tag 3</span>-->
                                    </div>
                                    <div class="product-card__footer">
                                        <span class="product-card__price">'.$prod->price.' р.</span>
                                        <button class="btn btn--primary btn--small">В корзину</button>
                                    </div>
                                </article>
                            
                            ';
                        }
                    ?>




                    <!--<article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <h3 class="product-card__title">Lorem ipsum</h3>
                        <div class="product-card__tags">
                            <span class="tag-small">Tag 1</span>
                            <span class="tag-small">Tag 2</span>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">$1,199.00</span>
                            <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <h3 class="product-card__title">Lorem ipsum</h3>
                        <div class="product-card__tags">
                            <span class="tag-small">Tag 1</span>
                            <span class="tag-small">Tag 2</span>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">$1,199.00</span>
                            <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                        </div>
                    </article>

                    <article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <h3 class="product-card__title">Lorem ipsum</h3>
                        <div class="product-card__tags">
                            <span class="tag-small">Tag 1</span>
                            <span class="tag-small">Tag 2</span>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">$1,199.00</span>
                            <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                        </div>
                    </article>-->
                </div>
            </div>
        </section>

        <section class="workspace">
            <div class="container">
                <h2 class="section-title section-title--left">УЛУЧШИ РАБОЧЕЕ МЕСТО</h2>




                    <?php
                    require_once 'lib/db.php';

                    //                        $sql = 'SELECT * FROM trending ORDER BY id DESC LIMIT 4';
                    $sql1 = 'SELECT * FROM products where id = 1';
                    $sql2 = 'SELECT * FROM products where id = 2 ';
                    $sql3 = 'SELECT * FROM products where id = 3 ';
                    $sql4 = 'SELECT * FROM products where id = 4 ';
                    $sql5 = 'SELECT * FROM products where id = 5 ';



                    $query = $pdo->prepare($sql1);
                    $query->execute();
                    $workspaceprods1 = $query->fetch(PDO::FETCH_OBJ);

                    $query = $pdo->prepare($sql2);
                    $query->execute();
                    $workspaceprods2 = $query->fetch(PDO::FETCH_OBJ);

                    $query = $pdo->prepare($sql3);
                    $query->execute();
                    $workspaceprods3 = $query->fetch(PDO::FETCH_OBJ);

                    $query = $pdo->prepare($sql4);
                    $query->execute();
                    $workspaceprods4 = $query->fetch(PDO::FETCH_OBJ);

                    $query = $pdo->prepare($sql5);
                    $query->execute();
                    $workspaceprods5 = $query->fetch(PDO::FETCH_OBJ);




                        echo '
                         <div class="workspace-grid">    
                            <div class="workspace-item workspace-item--large">
                                <div class="workspace-item__img-placeholder large-img" style="background: url(\'img/'.$workspaceprods1->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods1->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods1->tags.'</span>
                                    <!--<span class="tag-small">Tag 2</span>-->
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods1->price.'</span>
                                    <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                                </div>
                            </div>
                            
                            
                            <div class="workspace-item__stacked">
                                <div class="workspace-item">
                                    <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods2->img.'\') no-repeat center / contain;">
                                        <button class="wishlist-btn">♡</button>
                                    </div>
                                    <div class="product-card__footer">
                                        <span class="product-card__price">'.$workspaceprods2->price.'</span>
                                        <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                                    </div>
                                </div>
                                <div class="workspace-item">
                                    <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods3->img.'\') no-repeat center / contain;">
                                        <button class="wishlist-btn">♡</button>
                                    </div>
                                    <div class="product-card__footer">
                                        <span class="product-card__price">'.$workspaceprods3->price.'</span>
                                        <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            
                            
                            
                <div class="workspace-grid workspace-grid--bottom">
                    <div class="workspace-item">
                        <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods4->img.'\') no-repeat center / contain;">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">'.$workspaceprods4->price.'</span>
                            <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                        </div>
                    </div>
                    <div class="workspace-item">
                        <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods5->img.'\') no-repeat center / contain;">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">'.$workspaceprods4->price.'</span>
                            <button class="btn btn--primary btn--small">Купить в 1 клик</button>
                        </div>
                    </div>
                </div>                
                            ';

                    ?>








            </div>
        </section>

        <section class="sponsors">
            <div class="container">
                <p class="sponsors__title">Наши партнёры</p>
                <div class="sponsors__list">
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                    <div class="sponsor-box"></div>
                </div>
            </div>
        </section>
    </main>

    <?PHP require_once 'blocks/footer.php'; ?>


</body>
</html>