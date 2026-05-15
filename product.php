

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <title>--><?php //echo $productName; ?><!-- - Купить</title>-->
    <title>Nothing Phone 4a</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/product.css">

<!--    <link rel="stylesheet" href="css/global.css">-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/top-products.css">
    <link rel="stylesheet" href="css/workspace.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/news_section.css">
    <link rel="stylesheet" href="css/pc_config.css">


    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>

    <script src="js/product.js"></script>
</head>
<body>
<?php
include 'blocks/header.php';
// Предположим, что данные о товаре мы будем получать из БД в будущем,
// сейчас захардкодим данные Nothing Phone 4a
$productName = "Nothing Phone 4a";
$productDesc = "Продолжение легендарной линейки с обновленным глиф-интерфейсом и сбалансированной производительностью.";
?>
<main class="product-page">
<!--    <div class="container">-->

        <!-- БЛОК 1: HERO (ФОТО И КУПИТЬ) -->
        <section class="product-hero">

                <!-- Слева: Квадраты с превью -->
                <div class="hero-thumbnails">
                    <div class="thumb-box" >
                        <img src="nothing_phone_4_a/nf4amain.png">
                    </div>
                    <div class="thumb-box" >
                        <img src="nothing_phone_4_a/image-51.png" >
                    </div>
                    <div class="thumb-box">
                        <img src="nothing_phone_4_a/image-50.png">
                    </div>
                    <div class="thumb-box">
                        <img src="nothing_phone_4_a/image-49.png">
                    </div>
                    <div class="thumb-box">
                        <img src="nothing_phone_4_a/image-48.png">
                    </div>
                    <div class="thumb-box">
                        <img src="nothing_phone_4_a/image-47.png">
                    </div>
                    <div class="thumb-box">
                        <img src="nothing_phone_4_a/image-46.png">
                    </div>
<!--                    <div class="thumb-box" style="background: url(nothing_phone_4_a/image-51.png) no-repeat center / contain;"></div>-->

                </div>

<!--            tyle="background: url(nothing_phone_4_a/nf4amain.png) no-repeat center / contain;"-->
                <div class="hero-main-image">
                    <img src="nothing_phone_4_a/nf4amain.png">
                </div>

                <!-- Справа снизу: Конфигурация (через CSS positioning внутри грида) -->
                <div class="hero-buy-block">
                    <div class="config-selection">
                        <p class="config-label">Выберите конфигурацию</p>
                        <div class="config-options">
                            <button class="config-btn active">8/128 GB</button>
                            <button class="config-btn">12/256 GB</button>
                        </div>
                    </div>
                    <div class="buy-actions">
                        <div class="price">$499.00</div>
                        <div style="display: flex; flex-direction: row; gap: 20px">
                            <button class="btn btn-outline">В сравнение</button>
                            <button class="btn btn-orange">В корзину</button>
                        </div>

                    </div>
                </div>

                <!-- Слева снизу: Название и описание -->
                <div class="hero-info">
                    <h1 class="product-title"><?php echo $productName; ?></h1>
                    <p class="product-description"><?php echo $productDesc; ?></p>
                </div>

        </section>

        <!-- БЛОК 2: ПОХОЖИЕ ТОВАРЫ -->
        <section class="similar-products">
            <h2 class="section-title">Похожие товары</h2>
            <div class="similar-grid">
                <article class="product-card">
                    <div class="pc_logic">
                        <div>смартфон</div>

                        <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                    </div>


                    <div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain; "></div>

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
                </article>


                <article class="product-card">
                    <div class="pc_logic">
                        <div>смартфон</div>

                        <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                    </div>


                    <div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain; "></div>

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
                </article>


                <article class="product-card">
                    <div class="pc_logic">
                        <div>смартфон</div>

                        <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                    </div>


                    <div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain; "></div>

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
                </article>


                <article class="product-card">
                    <div class="pc_logic">
                        <div>смартфон</div>

                        <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                    </div>


                    <div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain; "></div>

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
                </article>


                <article class="product-card">
                    <div class="pc_logic">
                        <div>смартфон</div>

                        <button class="wishlist-btn"><img src="icons/Like.svg"></button>
                    </div>


                    <div class="product-card__img-placeholder" style="background: url('img/apple.webp') no-repeat center / contain; "></div>

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
                </article>
            </div>
        </section>

        <!-- БЛОК 3: ТЕХНИЧЕСКИЕ ХАРАКТЕРИСТИКИ (БЕНТО) -->
        <section class="specs-bento">
<!--            <h2 class="section-title">Технологии будущего</h2>-->
            <div class="bento-grid">
                <div class="bento-item item-large" style="background-image: url('img/bento-glyph.jpg');">
                    <h2>Glyph Interface 2.0</h2>
                    <h3>Новые сценарии подсветки для уведомлений и таймеров.</h3>
                </div>
                <div class="bento-item" style="background-image: url('img/bento-screen.jpg');">
                    <h2>LTPO OLED</h2>
                    <h3>Частота 120Гц для идеальной плавности.</h3>
                </div>
                <div class="bento-item" style="background-image: url('img/bento-camera.jpg');">
                    <h2>Sony IMX</h2>
                    <h3>Двойная камера 50Мп с OIS.</h3>
                </div>
                <div class="bento-item item-medium" style="background-image: url('img/bento-chip.jpg');">
                    <h2>Snapdragon 7s Gen 2</h2>
                    <h3>Энергоэффективность и мощь в одном чипе.</h3>
                </div>
            </div>
        </section>

        <!-- БЛОК 4: ПОДРОБНЫЕ ХАРАКТЕРИСТИКИ (АККОРДЕОН НА ЧИСТОМ CSS) -->
        <section class="detailed-specs">
            <h2 class="section-title">Характеристики</h2>

            <div class="accordion">
<!--                 ПУНКТ 1: АККУМУЛЯТОР-->
                <div class="accordion-item">
                    <input type="checkbox" id="spec-1" class="accordion-input">
                    <label for="spec-1" class="accordion-label">
                        <span class="label-main">Аккумулятор</span>
                        <span class="label-short">5000 mAh</span>
                    </label>
                    <div class="accordion-content">
                        <ul>
                            <li><strong>Тип:</strong> Li-Pol, несъемный</li>
                            <li><strong>Проводная зарядка:</strong> 45W (PD 3.0)</li>
                            <li><strong>Беспроводная зарядка:</strong> 15W</li>
                            <li><strong>Реверсивная зарядка:</strong> 5W</li>
                            <li><strong>Время работы:</strong> до 2 дней</li>
                        </ul>
                    </div>
                </div>

<!--                 ПУНКТ 2: ДИСПЛЕЙ-->
                <div class="accordion-item">
                    <input type="checkbox" id="spec-2" class="accordion-input">
                    <label for="spec-2" class="accordion-label">
                        <span class="label-main">Дисплей</span>
                        <span class="label-short">6.7" OLED</span>
                    </label>
                    <div class="accordion-content">
                        <ul>
                            <li><strong>Разрешение:</strong> 2412 x 1080 (FHD+)</li>
                            <li><strong>Яркость:</strong> 1600 нит (пик)</li>
                            <li><strong>Защита:</strong> Gorilla Glass 5</li>
                            <li><strong>Особенности:</strong> HDR10+, 10-bit</li>
                        </ul>
                    </div>
                </div>

<!--                 ПУНКТ 3: КАМЕРЫ-->
                <div class="accordion-item">
                    <input type="checkbox" id="spec-3" class="accordion-input">
                    <label for="spec-3" class="accordion-label">
                        <span class="label-main">Камеры</span>
                        <span class="label-short">50 + 50 Мп</span>
                    </label>
                    <div class="accordion-content">
                        <ul>
                            <li><strong>Основная:</strong> 50 Мп, f/1.9, OIS</li>
                            <li><strong>Ультраширик:</strong> 50 Мп, 114°</li>
                            <li><strong>Фронтальная:</strong> 32 Мп</li>
                            <li><strong>Видео:</strong> 4K @ 60fps</li>
                        </ul>
                    </div>
                </div>
            </div>

<!--            --><?php
//            // Получаем JSON и декодируем
//            $specData = json_decode($product['specifications'], true);
//            $specs = $specData['specs'];
//            $media = $specData['media'];
//            ?>
<!---->
<!--            <div class="accordion">-->
<!--                --><?php //$i = 0; foreach ($specs as $catName => $items): $i++; ?>
<!--                    <div class="accordion-item">-->
<!--                        <input type="checkbox" id="spec---><?php //echo $i; ?><!--" class="accordion-input">-->
<!--                        <label for="spec---><?php //echo $i; ?><!--" class="accordion-label">-->
<!--                            <span class="label-main">--><?php //echo $catName; ?><!--</span>-->
<!--                        </label>-->
<!--                        <div class="accordion-content">-->
<!--                            <ul>-->
<!--                                --><?php //foreach ($items as $key => $val): ?>
<!--                                    <li><strong>--><?php //echo $key; ?><!--:</strong> --><?php //echo $val; ?><!--</li>-->
<!--                                --><?php //endforeach; ?>
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->
        </section>

        <!-- БЛОК 5: ОЦЕНКИ И ОБЗОРЫ -->
        <section class="reviews-section">
            <div class="reviews-grid">
                <!-- Слева: Общая оценка и видео -->
                <div class="reviews-left">
                    <div class="total-rating-card">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h3>Общая оценка</h3>
                            <h1>4.6</h1>
                        </div>

                        <div class="rating-stats">
                            <div class="stat-row"><span>Производительность</span> <b>8.5</b></div>
                            <div class="stat-row"><span>Камеры</span> <b>8.0</b></div>
                            <div class="stat-row"><span>Автономность</span> <b>9.2</b></div>
                            <div class="stat-row"><span>Ремонтопригодность</span> <b>7.5</b></div>
                            <div class="stat-row"><span>Дизайн</span> <b>10.0</b></div>
                        </div>
                    </div>

                    <div class="video-reviews">
                        <h3>Видеообзоры</h3>
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

                <!-- Справа: Отзывы -->
                <div class="reviews-right">
                    <h3>Отзывы пользователей</h3>
                    <div class="user-reviews-list">
                        <div class="review-item">
                            <div class="review-header">
                                <div class="user-avatar"></div>
                                <span class="username">Alex_Tech</span>
                            </div>
                            <p class="review-text">Глифы — это не просто игрушка, а реально удобно. Заряд держит отлично.</p>
                            <div class="review-images">
                                <div class="review-img-thumb"></div>
                                <div class="review-img-thumb"></div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="user-avatar"></div>
                                <span class="username">Alex_Tech</span>
                            </div>
                            <p class="review-text">Глифы — это не просто игрушка, а реально удобно. Заряд держит отлично.</p>
                            <div class="review-images">
                                <div class="review-img-thumb"></div>
                                <div class="review-img-thumb"></div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="user-avatar"></div>
                                <span class="username">Alex_Tech</span>
                            </div>
                            <p class="review-text">Глифы — это не просто игрушка, а реально удобно. Заряд держит отлично.</p>
                            <div class="review-images">
                                <div class="review-img-thumb"></div>
                                <div class="review-img-thumb"></div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="user-avatar"></div>
                                <span class="username">Alex_Tech</span>
                            </div>
                            <p class="review-text">Глифы — это не просто игрушка, а реально удобно. Заряд держит отлично.</p>
                            <div class="review-images">
                                <div class="review-img-thumb"></div>
                                <div class="review-img-thumb"></div>
                            </div>
                        </div>
                    </div>
                    <div class="review-buttons">
                        <button class="btn btn-outline">Оставить отзыв</button>
                        <button class="btn btn-outline">Все отзывы</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- БЛОК 6: ТЕСТЫ ТЕЛЕФОНА -->
        <section class="phone-tests">
            <h2 class="section-title">Результаты тестирования</h2>
            <div class="tests-grid">
                <div class="test-card">
                    <h3>Тест камер</h3>
                    <div class="camera-samples">
                        <div class="sample"></div>
                        <div class="sample"></div>
                        <div class="sample"></div>
                        <div class="sample"></div>
                    </div>
                    <p>Примеры дневной и ночной съемки.</p>
                </div>
                <div class="test-card">
                    <h3>Производительность</h3>
                    <div class="benchmark-results">
                        <div class="bench-row"><span>AnTuTu 10:</span> <b>750,000</b></div>
                        <div class="bench-row"><span>Geekbench 6 (Multi):</span> <b>3,200</b></div>
                    </div>
                </div>
                <div class="test-card">
                    <h3>Тест аккумулятора</h3>
                    <div class="battery-results">
                        <div class="bench-row"><span>PCMark Work 3.0:</span> <b>16ч 20м</b></div>
                    </div>
                </div>
            </div>
        </section>

<!--    </div>-->
</main>

<?php include 'blocks/footer.php'; ?>


</body>
</html>