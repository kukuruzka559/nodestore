<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница - Магазин электроники</title>


    <link rel="stylesheet" href="css/product.css">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/top-products.css">
    <link rel="stylesheet" href="css/workspace.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/news_section.css">
    <link rel="stylesheet" href="css/pc_config.css">
    <link rel="stylesheet" href="css/product.css">


    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>
    <script src="js/news_logic.js" defer></script>
    <script src="js/pc_config.js" defer></script>


<!--    aos js-->
<!--    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">-->
    <link rel="stylesheet" href="aos.css">
<!--    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>-->
    <script defer>
        AOS.init();
    </script>
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <?PHP require_once 'blocks/header.php'; ?>
    <?PHP require_once 'blocks/header2.php'; ?>




    <main>

        <?PHP
        require_once 'lib/db.php';

//        style="background: url(\'img/'.$workspaceprods1->img.'\') no-repeat center / contain;"
        ?>
        <section class="hero" style="background: url(backgrounds/bg2.png) no-repeat center / cover;">
            <div class="container hero__inner">
                <div class="hero__content">
                        <div class="hero3">
                            <div class="hero2" data-aos="fade-up">
                                <div class="hero1">
                                    <h1 class="hero__title" >NOTHING PHONE 4A PRO</h1>
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

                            <div class="hero4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
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
<!--                    data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"-->
                        <div class="hero__cta">
                            <a href="/catalog.php"><button class="btn btn--outline" style="color: var(--color-bg); border-color: var(--color-bg); border-radius: 100px; width: 310px" >Каталог</button></a>

                            <a href="/product.php"><button class="btn btn--primary" style="border-radius: 100px;" >Перейти к товару</button></a>

                        </div>
                </div>

<!--                <div class="hero__bottom">-->
                <div class="hero__img">
                    <img src="backgrounds/mobila1.png" data-aos="zoom-in">
                </div>

                </div>
            </div>
        </section>


        <section class="top-products">
            <div class="container">
                <h2 class="section-title">ТОП ТОВАРОВ</h2>
                <div class="similar-grid">
                    <?php
                    require_once 'lib/db.php';
                    $sql = 'SELECT * FROM products ORDER BY id LIMIT 5';
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $products = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach ($products as $prod) {
                        echo
                                '
                                    <article class="product-card" style="height: auto; width: auto; border: none">
                                            <div class="pc_logic">
                                                <div>'.$prod->category.'</div>
                
                                                <button class="wishlist-btn" data-id="'.$prod->id.'"><img src="icons/Like.svg"></button>
                                            </div>
                
                                            <a href="product-page.php?id='.$prod->id.'" class="product-card__link">
                                                <div class="product-card__img-placeholder" style="background: url(\'img/'.$prod->img.'\') no-repeat center / contain;"></div>
                                            </a>
                                            
                
                                            <div class="pc_logic3">
                                                <div class="pc_logic2">
                                                    <h3 class="product-card__title">'.$prod->name.'</h3>
                                                    <span class="product-card__price">'.$prod->price.' руб.</span>
                                                </div>
                
                
                                                <div class="product-card__footer">
                                                    <div class="product-card__tags">
                                                        <span class="tag-small">'.$prod->tags.'</span>
                                                        
                                                    </div>
                                                    <div style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
                                                    <button class="btn btn--primary btn--small add-to-cart-btn" onclick="CompareManager.add('.$prod->id.')" style="background: none; border: 1px solid var(--color-border); color: var(--color-dark)">Сравнить</button>
                                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                    </article>

                            ';
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="workspace">


            <div class="container_work">

                <div class="workspace_img_container">


                    <div class="workspace__descr">
                        <h1>Удобство на рабочем столе</h1>
                        <h3>Каждый момент будет чистым кайфом</h3>
                    </div>

                    <div class="workspace__products">
                        <div class="w__product">
                            <div class="img-container"><img class="w__product_img" src="8bitdo/8bitdo0.png"></div>

                            <div class="font_wrap">
                                <div style="display: flex; flex-direction: column;">
                                    <h2>8BitDo Ultimate 2</h2>
                                    <h3>Геймпад</h3>
                                </div>

                                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-start">
                                    <button class="btn--small">В корзину</button>
                                    <button class="btn--small" style="background: none; color: var(--color-border); border: 1px solid var(--color-border)">В сравнение</button>
                                </div>

                            </div>
                        </div>

                        <div class="w__product">
                            <div class="img-container">
                                <img class="w__product_img" src="8bitdo/2.png">
                            </div>

                            <div class="font_wrap">
                                <div style="display: flex; flex-direction: column;">
                                    <h2>Наушники беспроводные</h2>
                                    <h3>Наушники</h3>
                                </div>

                                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-start">
                                    <button class="btn--small">В корзину</button>
                                    <button class="btn--small" style="background: none; color: var(--color-border); border: 1px solid var(--color-border)">В сравнение</button>
                                </div>

                            </div>
                        </div>

                        <div class="w__product">
                            <div class="img-container"><img class="w__product_img" src="8bitdo/3.png"></div>

                            <div class="font_wrap">
                                <div style="display: flex; flex-direction: column;">
                                    <h2>Мышь беспроводная</h2>
                                    <h3>Мышь копьютерная</h3>
                                </div>

                                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-start">
                                    <button class="btn--small">В корзину</button>
                                    <button class="btn--small" style="background: none; color: var(--color-border); border: 1px solid var(--color-border)">В сравнение</button>
                                </div>

                            </div>
                        </div>

                        <div class="w__product">
                            <div class="img-container"><img class="w__product_img" src="8bitdo/1.png"></div>

                            <div class="font_wrap">
                                <div style="display: flex; flex-direction: column;">
                                    <h2>Клавиатура беспроводная</h2>
                                    <h3>Клавиатура</h3>
                                </div>

                                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-start">
                                    <button class="btn--small">В корзину</button>
                                    <button class="btn--small" style="background: none; color: var(--color-border); border: 1px solid var(--color-border)">В сравнение</button>
                                </div>

                            </div>
                        </div>

                        <div class="w__product">
                            <div class="img-container"><img class="w__product_img" src="8bitdo/4.png"></div>

                            <div class="font_wrap">
                                <div style="display: flex; flex-direction: column;">
                                    <h2>Лампа на монитор</h2>
                                    <h3>Лампа</h3>
                                </div>

                                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: flex-start">
                                    <button class="btn--small">В корзину</button>
                                    <button class="btn--small" style="background: none; color: var(--color-border); border: 1px solid var(--color-border)">В сравнение</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>

        <?php require_once 'lib/get_news.php'; $all_news = getLatestNews($pdo); ?>

        <section class="news-section">
            <div class="news-1">
                <h1>Новости</h1>
                <div class="news-3">
                    Следи за новинками в соц. сетях:
                    <div class="social-networcks">
                        <img src="icons/Instagram.svg">
                        <img src="icons/Telegram.svg">
                        <img src="icons/Tiktok.svg">
                        <img src="icons/Youtube.svg">
                    </div>
                </div>
            </div>
            <div class="news-grid">

                <div class="news-featured" id="featuredNews">
                    <div class="news-slider">
                        <div class="slider-track" id="sliderTrack">
                        </div>
                        <button class="slider-btn prev" id="prevImg">←</button>
                        <button class="slider-btn next" id="nextImg">→</button>
                    </div>
                    <div class="news-featured__content">
                        <span class="news-date" id="featDate">--.--.----</span>
                        <h2 class="news-title" id="featTitle">Загрузка...</h2>
                        <p class="news-desc" id="featDesc">Пожалуйста, подождите.</p>
                    </div>
                </div>

                <div class="news-sidebar">
                    <div class="news-list" id="newsList">
                        <?php foreach($all_news as $index => $news): ?>
                            <div class="news-item <?php echo $index === 0 ? 'active' : ''; ?>"
                                 data-index="<?php echo $index; ?>"
                                 data-images="<?php echo $news['image']; ?>"
                                 data-title="<?php echo htmlspecialchars($news['title']); ?>"
                                 data-desc="<?php echo htmlspecialchars($news['announce']); ?>"
                                 data-date="<?php echo $news['date_added']; ?>">

<!--                                <div class="news-item__progress"></div>-->
                                <div class="news-item__info">
                                    <span class="news-item__date"><?php echo date('d.m', strtotime($news['date_added'])); ?></span>
                                    <h2 class="news-item__title"><?php echo $news['title']; ?></h2>
                                    <button class="btn--small newsbtn">смотреть ></button>
                                </div>

<!--                                <div class="news-item-img" style="background: url("newsimgs/--><?php //echo $news['image']; ?><!--") no-repeat center / contain;"></div>-->
                                <?php
                                // Разбиваем строку с названиями файлов по запятой
                                $images = explode(',', $news['image']);
                                // Берем первый файл (удаляем лишние пробелы)
                                $firstImage = trim($images[0]);
                                ?>
                                <div class="news-item-img" style="background: url('newsimgs/<?php echo $firstImage; ?>') no-repeat center / cover;"></div>


                            </div>
                        <?php endforeach; ?>
                    </div>
<!--                    <div class="news-scroll-indicator">-->
<!--                        <div class="scroll-bar" id="scrollBar"></div>-->
<!--                    </div>-->
                </div>

            </div>
        </section>

        <section class="pc-configurator" id="pc-configurator">
<!--            <div class="container">-->

                <div class="config-grid">

                    <div class="config-left config-box">
                        <div class="confdescr">
                            <div class="conf1">
                                <h2 class="section-title" style="text-align: left; margin-bottom: 0px">КОНФИГУРАТОР ПК</h2>
                                <h3>Собери компик так как тебе нужно без переплаты</h3>
                            </div>

                            <button class="btn btn--primary" style="border-radius: 100px; font-size: 18px; min-width: fit-content;">создать сборку</button>
                        </div>


                        <div class="config-list-wrapper">
                            <h3>Готовые сборки</h3>
                            <div class="config-list" id="buildsList">
                                <div class="build-loading">Загрузка сборок...</div>
                            </div>
                        </div>
                    </div>

                    <div class="config-image-placeholder">
                        <img src="" alt="PC Build" id="activeBuildImage" class="config-image">
                    </div>

                    <div class="config-right config-box">
                        <div class="config-header">
                            <span class="tag-outline" id="activeBuildTag">...</span>
                            <h3 class="config-title" id="activeBuildTitle">Загрузка...</h3>
                        </div>

                        <div class="config-specs">
                            <div class="spec-row"><span class="spec-label">Процессор:</span><span class="spec-value" id="specCpu">-</span></div>
                            <div class="spec-row"><span class="spec-label">Видеокарта:</span><span class="spec-value" id="specGpu">-</span></div>
                            <div class="spec-row"><span class="spec-label">Мат. плата:</span><span class="spec-value" id="specMobo">-</span></div>
                            <div class="spec-row"><span class="spec-label">ОЗУ:</span><span class="spec-value" id="specRam">-</span></div>
                            <div class="spec-row"><span class="spec-label">Накопитель:</span><span class="spec-value" id="specStorage">-</span></div>
                            <div class="spec-row"><span class="spec-label">Блок питания:</span><span class="spec-value" id="specPower">-</span></div>
                            <div class="spec-row"><span class="spec-label">Корпус:</span><span class="spec-value" id="specCase">-</span></div>
                        </div>

                        <div class="config-footer">
                            <div class="price-value" id="activeBuildPrice">$0.00</div>
                            <a href="#" id="activeBuildLink" class="btn btn-orange-outline">Смотреть</a>
                        </div>
                    </div>

                </div>
<!--            </div>-->
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



    <script src="aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>