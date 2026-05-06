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


    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>
</head>
<body>
    <?PHP require_once 'blocks/header.php'; ?>




    <main>

        <?PHP
        require_once 'lib/db.php';

//        style="background: url(\'img/'.$workspaceprods1->img.'\') no-repeat center / contain;"
        ?>
        <section class="hero" style="background: url(backgrounds/bg.png) no-repeat center / cover;">
            <div class="container hero__inner">
                <div class="hero__content">
                        <div class="hero3">
                            <div class="hero2">
                                <div class="hero1">
                                    <h1 class="hero__title">NOTHING PHONE 4A PRO</h1>
                                    <p class="hero__desc">Lorem ipsum dolor sit amet consectetur. Egestas sem dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
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

                            <!--                        <span class="divider"> </span>-->
                            <div class="divider"></div>

                            <div class="hero4">
                                Обзоры
                                <div class="hero__videos">
                                    <div class="video-thumb">
                                        <div class="preview" style="background: url(backgrounds/Rectangle.png) no-repeat center / cover;">
                                            <img src="icons/play.svg">
                                            <div class="youtube"><img src="icons/youtube.png" style="width: 10px; height: 10px;">YouTube</div>
                                        </div>

                                        <div class="descr">
                                            <div class="name">🔥 СМАРТФОН Nothing Phone (4a)</div>
                                            <div class="auth"><img src="icons/Ellipse.png" >Польза NET</div>
                                        </div>
                                    </div>
                                    <div class="video-thumb">
                                        <div class="preview" style="background: url(backgrounds/Rectangle.png) no-repeat center / cover;">
                                            <img src="icons/play.svg">
                                            <div class="youtube"><img src="icons/youtube.png" style="width: 10px; height: 10px;">YouTube</div>
                                        </div>

                                        <div class="descr">
                                            <div class="name">🔥 СМАРТФОН Nothing Phone (4a)</div>
                                            <div class="auth"><img src="icons/Ellipse.png" >Польза NET</div>
                                        </div>
                                    </div>
                                    <div class="video-thumb">
                                        <div class="preview" style="background: url(backgrounds/Rectangle.png) no-repeat center / cover;">
                                            <img src="icons/play.svg">
                                            <div class="youtube"><img src="icons/youtube.png" style="width: 10px; height: 10px;">YouTube</div>
                                        </div>

                                        <div class="descr">
                                            <div class="name">🔥 СМАРТФОН Nothing Phone (4a)</div>
                                            <div class="auth"><img src="icons/Ellipse.png" >Польза NET</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="hero__cta">
                            <button class="btn btn--outline" style="color: var(--color-bg); border-color: var(--color-bg); border-radius: 100px; width: 310px">Каталог</button>
                            <button class="btn btn--primary" style="border-radius: 100px;">Перейти к товару</button>
                        </div>
                </div>

<!--                <div class="hero__bottom">-->
                <div class="hero__img">
                    <img src="backgrounds/mobila.png">
                </div>

                </div>
            </div>
        </section>


        <span class="line-left"></span>
        <span class="line-right"></span>
        <span class="line-bot"></span>
        <span class="line-top"></span>

<!--        <div class="lines">-->
<!--            -->
<!--            -->
<!--            -->
<!--            -->
<!--            -->
<!--        </div>-->

        <section class="top-products">
            <span class="line-bot"></span>
            <span class="line-top"></span>
            <img class="plus-left" src="icons/plus.svg">
            <img class="plus-right" src="icons/plus.svg">
            <img class="plus-bot-left" src="icons/plus.svg">
            <img class="plus-bot-right" src="icons/plus.svg">
            <div class="container">
                <h2 class="section-title">ТОП ТОВАРОВ</h2>
                <div class="products-grid">

<!--                    --><?php
//                        require_once 'lib/db.php';
//
////                        $sql = 'SELECT * FROM trending ORDER BY id DESC LIMIT 4';
//                    $sql = 'SELECT * FROM trending ORDER BY id LIMIT 4';
//
//
//
//                        $query = $pdo->prepare($sql);
//                        $query->execute();
//                        $trendprod = $query->fetchAll(PDO::FETCH_OBJ);
//
//                        /*print_r($trendprod);*/
//                        foreach ($trendprod as $prod) {
//                            echo '
//                                <article class="product-card">
//                                    <div class="product-card__img-placeholder" style="background: url(\'img/'.$prod->img.'\') no-repeat center / contain;">
//                                        <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
//                                    </div>
//                                    <h3 class="product-card__title"> '.$prod->productname.' </h3>
//                                    <div class="product-card__tags">
//                                        <!--<span class="tag-small"></span>-->
//                                        <span class="tag-small">'.$prod->tags.'</span>
//                                        <!--span class="tag-small">Tag 3</span>-->
//                                    </div>
//                                    <div class="product-card__footer">
//                                        <span class="product-card__price">'.$prod->price.' р.</span>
//                                        <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
//                                    </div>
//                                </article>
//
//                            ';
//                        }
//                    ?>

                    <article class="product-card">
                        <div class="card-wraper">
                            <div class="pc_logic">
                                смартфон
                                <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                            </div>
                            <div class="pc_logic3">
                                <div class="pc_logic2">
                                    <h3 class="product-card__title">Apple Iphone 17 pro max</h3>
                                    <span class="product-card__price">4000 р.</span>
                                </div>


                                <div class="product-card__footer">
                                    <div class="product-card__tags">
                                        <span class="tag-small">x8 zoom</span>
                                        <span class="tag-small">120 гц</span>
                                        <span class="tag-small">Tag 3</span>
                                    </div>
                                    <button class="btn btn--primary btn--small add-to-cart-btn">В корзину</button>
                                </div>
                            </div>
                        </div>

                        <div class="product-card__img-placeholder">
                            <img src="img/apple.webp">
                        </div>
                        <!--<div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain;"></div>-->
                    </article>

                    <article class="product-card">
                        <!--<img class="plus-left" src="icons/plus.svg">
                        <img class="plus-right" src="icons/plus.svg">
                        <img class="plus-bot-left" src="icons/plus.svg">
                        <img class="plus-bot-right" src="icons/plus.svg">-->
                        <div class="card-wraper">

                            <div class="pc_logic">
                                смартфон
                                <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                            </div>
                            <div class="pc_logic3">
                                <div class="pc_logic2">
                                    <h3 class="product-card__title">Apple Iphone 17 pro max</h3>
                                    <span class="product-card__price">4000 р.</span>
                                </div>


                                <div class="product-card__footer">
                                    <div class="product-card__tags">
                                        <span class="tag-small">x8 zoom</span>
                                        <span class="tag-small">120 гц</span>
                                        <span class="tag-small">Tag 3</span>
                                    </div>
                                    <button class="btn btn--primary btn--small add-to-cart-btn">В корзину</button>
                                </div>
                            </div>
                        </div>

                        <div class="product-card__img-placeholder">
                            <img src="img/apple.webp">
                        </div>
                        <!--<div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain;"></div>-->
                    </article>

                    <article class="product-card">
                        <div class="card-wraper">
                            <div class="pc_logic">
                                смартфон
                                <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                            </div>
                            <div class="pc_logic3">
                                <div class="pc_logic2">
                                    <h3 class="product-card__title">Apple Iphone 17 pro max</h3>
                                    <span class="product-card__price">4000 р.</span>
                                </div>


                                <div class="product-card__footer">
                                    <div class="product-card__tags">
                                        <span class="tag-small">x8 zoom</span>
                                        <span class="tag-small">120 гц</span>
                                        <span class="tag-small">Tag 3</span>
                                    </div>
                                    <button class="btn btn--primary btn--small add-to-cart-btn">В корзину</button>
                                </div>
                            </div>
                        </div>

                        <div class="product-card__img-placeholder">
                            <img src="img/apple.webp">
                        </div>
                        <!--<div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain;"></div>-->
                    </article>

                    <article class="product-card">
                        <div class="card-wraper">
                            <div class="pc_logic">
                                смартфон
                                <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                            </div>
                            <div class="pc_logic3">
                                <div class="pc_logic2">
                                    <h3 class="product-card__title">Apple Iphone 17 pro max</h3>
                                    <span class="product-card__price">4000 р.</span>
                                </div>


                                <div class="product-card__footer">
                                    <div class="product-card__tags">
                                        <span class="tag-small">x8 zoom</span>
                                        <span class="tag-small">120 гц</span>
                                        <span class="tag-small">Tag 3</span>
                                    </div>
                                    <button class="btn btn--primary btn--small add-to-cart-btn">В корзину</button>
                                </div>
                            </div>
                        </div>

                        <div class="product-card__img-placeholder">
                            <img src="img/apple.webp">
                        </div>
                        <!--<div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain;"></div>-->
                    </article>

                    <article class="product-card">
                        <div class="card-wraper">
                            <div class="pc_logic">
                                смартфон
                                <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                            </div>
                            <div class="pc_logic3">
                                <div class="pc_logic2">
                                    <h3 class="product-card__title">Apple Iphone 17 pro max</h3>
                                    <span class="product-card__price">4000 р.</span>
                                </div>


                                <div class="product-card__footer">
                                    <div class="product-card__tags">
                                        <span class="tag-small">x8 zoom</span>
                                        <span class="tag-small">120 гц</span>
                                        <span class="tag-small">Tag 3</span>
                                    </div>
                                    <button class="btn btn--primary btn--small add-to-cart-btn">В корзину</button>
                                </div>
                            </div>
                        </div>

                        <div class="product-card__img-placeholder">
                            <img src="img/apple.webp">
                        </div>
                        <!--<div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain;"></div>-->
                    </article>

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
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods1->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods1->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods1->tags.'</span>
                                  
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods1->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods2->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods2->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods2->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods2->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods3->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods3->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods3->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods3->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods4->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods4->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods4->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods4->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods5->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods5->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods5->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods5->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                </div>
                            </div>
                            
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods5->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods5->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods5->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods5->price.'</span>
                                    <button class="btn btn--primary btn--small">В корзину</button>
                                </div>
                            </div>
                            
                            <div class="workspace-item">
                                <div class="workspace-item__img-placeholder" style="background: url(\'img/'.$workspaceprods1->img.'\') no-repeat center / contain;">
                                    <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                </div>
                                <h3 class="workspace-item__title">'.$workspaceprods1->productname.'</h3>
                                <div class="product-card__tags">
                                    <span class="tag-small">'.$workspaceprods1->tags.'</span>
                                    
                                </div>
                                <div class="product-card__footer">
                                    <span class="product-card__price">'.$workspaceprods1->price.'</span>
                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
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



        <?PHP require_once 'blocks/footer.php'; ?>
    </main>




</body>
</html>