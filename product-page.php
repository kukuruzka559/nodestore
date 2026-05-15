<?php
require_once 'lib/db.php';

// 1. Получаем ID товара из URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id <= 0) {
    die("Товар не найден");
}

// 2. Достаем данные товара
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Товар не существует");
}

// 3. Парсим JSON с характеристиками и фото
$specData = json_decode($product['specifications'], true);

// Подготавливаем основные данные для удобства
$media = $specData['media'] ?? [];
$variants = $specData['variants'] ?? [];
$specs = $specData['specs'] ?? [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <title>--><?php //echo $productName; ?><!-- - Купить</title>-->
    <title>Nothing Phone 4a</title>

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



    <link rel="stylesheet" href="css/global.css">
    <script src="js/compare.js" defer></script>
</head>
<body>
<?php
include 'blocks/header.php';
// Предположим, что данные о товаре мы будем получать из БД в будущем,
// сейчас захардкодим данные Nothing Phone 4a
$productName = "Nothing Phone 4a";
$productDesc = "Продолжение легендарной линейки с обновленным глиф-интерфейсом и сбалансированной производительностью.";
?>

<?php
include 'blocks/header2.php';
?>
<main class="product-page">
    <!--    <div class="container">-->

    <!-- БЛОК 1: HERO (ФОТО И КУПИТЬ) -->
    <section class="product-hero">

        <!-- Слева: Квадраты с превью -->
        <div class="hero-thumbnails">
            <?php
            // Собираем все фото из всех цветов в один список для слайдера
            foreach ($media as $colorName => $images) {
                foreach ($images as $imgUrl) {
                    echo '<div class="thumb-box" onclick="changeMainImage(\''.$imgUrl.'\')">
                            <img src="'.$imgUrl.'" alt="'.$colorName.'">
                          </div>';
                }
            }
            ?>

        </div>

        <!--            tyle="background: url(nothing_phone_4_a/nf4amain.png) no-repeat center / contain;"-->
        <div class="hero-main-image">
            <?php
            // Получаем первый ключ массива media для PHP 7.1
            reset($media);
            $firstColor = key($media);

            // Проверяем, есть ли картинка для этого цвета, если нет — берем заглушку
            $defaultImg = ($firstColor && isset($media[$firstColor][0]))
                    ? $media[$firstColor][0]
                    : 'img/'.$product['img'];
            ?>
            <img src="<?php echo $defaultImg; ?>" id="mainProductImg" alt="">
        </div>

        <!-- Справа снизу: Конфигурация (через CSS positioning внутри грида) -->
<!--        <div class="hero-buy-block">-->
<!--            <div class="config-selection">-->
<!--                <p class="config-label">Выберите конфигурацию</p>-->
<!--                <div class="config-options">-->
<!--                    <button class="config-btn active">8/128 GB</button>-->
<!--                    <button class="config-btn">12/256 GB</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="buy-actions">-->
<!--                <div class="price">$499.00</div>-->
<!--                <div style="display: flex; flex-direction: row; gap: 20px">-->
<!--                    <button class="btn btn-outline">В сравнение</button>-->
<!--                    <button class="btn btn-orange">В корзину</button>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->

        <div class="hero-buy-block">
<!--            <h1 class="section-title">--><?php //echo $product['name']; ?><!--</h1>-->
            <div class="config-selection">
                <p>Выберите цвет:</p>
                <div style="display: flex; flex-direction: row; gap: 20px; justify-content: left">
                    <button class="color-config-btn" style="background: #9f9f9f;"></button>
                    <button class="color-config-btn" style="background: #ff9bdf;"></button>
                    <button class="color-config-btn" style="background: #729aff;"></button>
                    <button class="color-config-btn" style="background: #000000;"></button>
                </div>
                <p>Объём оперативной памяти:</p>
                <div class="config-options">
                    <?php foreach ($variants as $variant): ?>
                        <button class="config-btn" onclick="updatePrice(<?php echo $variant['price']; ?>)">
                            <?php echo $variant['name']; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <p>Объём постоянной памяти:</p>
                <div class="config-options">
                    <button class="config-btn" >128 гб</button>
                    <button class="config-btn" >256 гб</button>
                    <button class="config-btn" >512 гб</button>
                </div>

                <button class="wishlist-btn" style="position: absolute; left: 0px; top: 0px;" data-id="<?php echo $product['id']; ?>">♥</button>
            </div>

            <div class="price-big"><?php echo $product['price']; ?> руб.</div>



            <div class="product-actions">


                <button class="btn btn-outline" onclick="CompareManager.add('.$prod->id.')" style="background: none; border: 1px solid var(--color-border); color: var(--color-dark); font-size: 24px; border-radius: 100px">Сравнить</button>
                <button class="btn btn-outline" data-id="<?php echo $product['id']; ?>" style="font-size: 24px; background: var(--color-primary); border-radius: 100px; border: none">В корзину</button>
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
    </section>

    <!-- БЛОК 3: ТЕХНИЧЕСКИЕ ХАРАКТЕРИСТИКИ (БЕНТО) -->
    <section class="specs-bento">
        <!--            <h2 class="section-title">Технологии будущего</h2>-->
        <div class="bento-grid">
            <div class="bento-item item-large" style="background-image: url('nothing_phone_4_a/bentotecs/glifs.png');">
                <h2>Glyph Interface 2.0</h2>
                <h3>Новые сценарии подсветки для уведомлений и таймеров.</h3>
            </div>
            <div class="bento-item" style="background-image: url('nothing_phone_4_a/bentotecs/display.png');">
                <h2>LTPO OLED</h2>
                <h3>Частота 120Гц для идеальной плавности.</h3>
            </div>
            <div class="bento-item" style="background-image: url('nothing_phone_4_a/bentotecs/cams.png');">
                <h2>Sony IMX</h2>
                <h3>Двойная камера 50Мп с OIS.</h3>
            </div>
            <div class="bento-item item-medium" style="background-image: url('nothing_phone_4_a/bentotecs/7-gen-4-social-badge.jpg');">
                <h2>Snapdragon 7s Gen 2</h2>
                <h3>Энергоэффективность и мощь в одном чипе.</h3>
            </div>
        </div>
    </section>

    <!-- БЛОК 4: ПОДРОБНЫЕ ХАРАКТЕРИСТИКИ (АККОРДЕОН НА ЧИСТОМ CSS) -->
    <section class="detailed-specs">
        <h2 class="section-title">Характеристики</h2>



<!--        --><?php
//        // Получаем JSON и декодируем
//        $specData = json_decode($product['specifications'], true);
//        $specs = $specData['specs'];
//        $media = $specData['media'];
//        ?>
<!---->
<!--        <div class="accordion">-->
<!--            --><?php //$i = 0; foreach ($specs as $catName => $items): $i++; ?>
<!--                <div class="accordion-item">-->
<!--                    <input type="checkbox" id="spec---><?php //echo $i; ?><!--" class="accordion-input">-->
<!--                    <label for="spec---><?php //echo $i; ?><!--" class="accordion-label">-->
<!--                        <span class="label-main">--><?php //echo $catName; ?><!--</span>-->
<!--                    </label>-->
<!--                    <div class="accordion-content">-->
<!--                        <ul>-->
<!--                            --><?php //foreach ($items as $key => $val): ?>
<!--                                <li><strong>--><?php //echo $key; ?><!--:</strong> --><?php //echo $val; ?><!--</li>-->
<!--                            --><?php //endforeach; ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->


<!--        <h2 class="section-title">Технические характеристики</h2>-->
        <div class="accordion">
            <?php foreach ($specs as $groupName => $fields): ?>
                <div class="accordion-item">
                    <input type="checkbox" id="spec-1" class="accordion-input">
                    <label for="spec-1" class="accordion-label">
                        <span class="label-main"><h3><?php echo $groupName; ?></h3></span>
                    </label>
                    <div class="accordion-content">
                        <ul>
                            <?php foreach ($fields as $label => $value): ?>
                                <li><strong><?php echo $label; ?>:</strong> <?php echo $value; ?></li>

<!--                                <div class="specs-row">-->
<!--                                    <span class="specs-label">--><?php //echo $label; ?><!--</span>-->
<!--                                    <span class="specs-value">--><?php //echo $value; ?><!--</span>-->
<!--                                </div>-->
                            <?php endforeach; ?>
                        </ul>

                    </div>

                </div>
            <?php endforeach; ?>
        </div>
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
                            <div class="user-avatar" style="background: url('/profiles/p4.png') no-repeat center/contain"></div>
                            <span class="username" >Tech_Voyager_404</span>
                        </div>
                        <p class="review-text">Перешел на Nothing Phone 4a с Pixel 7a — и ни разу не пожалел. Ди
                            зайн снова переосмыслили: убрали лишние светодиоды с задней крышки, оставив только тонкую светящуюся линию
                            по периметру и камеру в стиле «минимализм». Самое крутое — тактильные ощущения: матовый софт-тач пластик не собирает отпечатки, а шов между рамкой и дисплеем почти не ощущается. По производительности Snapdragon 7+ Gen 3 — запас на пару лет точно ес
                            ть, приложения летают. Но главный сюрприз — обновленная Nothing OS 3.0 без единого пресета от Google, при этом б
                            агов я не нашел за месяц использования.</p>
                        <div class="review-images">
                            <div class="review-img-thumb" style="background: url('https://static.rozetked.me/imager/full/uploads/9y/9y2rpfHZUsLu.webp') no-repeat center / cover"></div>
                            <div class="review-img-thumb" style="background: url('https://static.rozetked.me/imager/full/uploads/Ka/Ka4iGSUnE3OV.webp') no-repeat center / cover"></div>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="user-avatar" style="background: url('/profiles/p3.png') no-repeat center/contain"></div>
                            <span class="username">In_The_Matrix</span>
                        </div>
                        <p class="review-text">Купил Nothing Phone 4a исключительно ради «лампочек» (Glyph 2.0), хотя в рекламе их теперь почти не показывают. И знаете — они стал
                            и умнее. Раньше это была просто игрушка, теперь световая индикация адаптируется под приложения: когда ждешь заказ в доставке, полоски горят пульсирующим белым, а д
                            ля важных уведомлений от шефа — холодным синим. Полезно, когда телефон лежит экраном вниз на встрече.
                            Plus: добавили функцию «световой пульс» под музыку — выглядит как дискотека 90-х, но весело.</p>
                        <div class="review-images">
                            <div class="review-img-thumb" style="background: url('https://resizer.mail.ru/p/adcc25f1-0132-5a0f-842b-69e0933b8663/AQAKEXedmQeArKaG7ZN9oFycvR9BtfiDKx0eCrBJwPubunQc9_f7jFe_F4XVIe-7CCRaA-qSSIbOsQff1EeaqQ33mjk.webp') no-repeat center / cover"></div>
                            <div class="review-img-thumb" style="background: url('https://resizer.mail.ru/p/7b7e1277-152d-5d1e-962d-abee8f85b080/AQAKf-yShhrLkmsd5SV9OZLkdcmCe6d5-mYky0UuZBA0cnObUBizzsvMrO6AKqqdvA999zfxdqfG8yoHvBve3VXQEA8.webp') no-repeat center / cover"></div>
                            <div class="review-img-thumb" style="background: url('https://resizer.mail.ru/p/d632d3ec-28b6-53ce-971d-b5f7eab705fd/AQAKJzMe1hh5U1i1gvEn4b6__YDoYV8cUrIGePjQ8Hw0v9eTics6wlfa9Jp0ssnV11qV69XSxNH2BrKkrEAHFJW9pow.webp') no-repeat center / cover"></div>
                            <div class="review-img-thumb" style="background: url('https://resizer.mail.ru/p/5ee86669-1439-56eb-9f6b-3259aa60fb14/AQAK_pnBFh66yFEDNEf6uxn5j-cbIiLT1MlvYCWJZAGjqBRRoblX17knky7Q_IR8x6A1P55XkO2wWPqLJZSXMA5vyVU.webp') no-repeat center / cover"></div>
                            <div class="review-img-thumb" style="background: url('https://resizer.mail.ru/p/19ffed3b-6533-538e-9e27-34b549726a94/AQAKV9iDszmjD5mZAccB1UZUKLKaXIujYUwWg-GWEGiR3uPrXC6g-gbNK7VFYH9WLl--AkWb-idBZ_RApt6x6W3izys.webp') no-repeat center / cover"></div>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="user-avatar" style="background: url('/profiles/p1.png') no-repeat center/contain"></div>
                            <span class="username">Eco_Pragmatist</span>
                        </div>
                        <p class="review-text">Пользоваться им одно удовольствие — тонкий (7.8 мм) и легкий (179 г). Из фишек: программное отключение 80% фоновых трекеров без рут-прав (спасибо Nothing OS 3.0) и умный режим «Анти-залипание»,
                            который блокирует уведомления от ненужных приложений в рабочие часы. Фото: основной модуль от Sony (IMX890), качество как у Pixel 6a, но постобработка чуть агрессивнее в тенях.
                            Жаль, нет телевика и запись slow-motion только 240 fps в HD.
                            Для своей цены ($450) — идеальный «рабочий инструмент», который не стыдно достать в кафе.</p>
                        <div class="review-images">

                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="user-avatar" style="background: url('/profiles/p2.png') no-repeat center/contain"></div>
                            <span class="username">Old_School_Reviewer</span>
                        </div>
                        <p class="review-text">Главный компромисс — вибро. Оно здесь слабое, как у бюджетных Samsung A-серии. И второе: поддержка обновлений обещана только 3 года (а не 5, как у Google или Samsung). Это для меня жирный минус, если хочешь брать телефон «на вырост». Но за эти деньги (я брал за 399 евро по акции) 4a — отличный кандидат для тех, кто устал от MIUI и One UI. Плюс беспроводная зарядка 15 Вт есть, реверсивная зарядка для наушников — тоже. Рекомендую, если вы цените дизайн и чистый Android, но не гонитесь за мегапикселями.</p>
                        <div class="review-images">
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
                <div>
                    <div class="camera-samples">
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/cR/cRlUuhUuzWpM.webp') no-repeat center/cover"></div>
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/zW/zWieoAvGV1kK.webp') no-repeat center/cover"></div>
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/1I/1ISIMhizPcJW.webp') no-repeat center/cover"></div>
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/KL/KLAXeQnTleTR.webp') no-repeat center/cover"></div>
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/eM/eMIErymcqOHj.webp') no-repeat center/cover"></div>
                        <div class="sample" style="background: url('https://static.rozetked.me/imager/full/uploads/Lt/LtssyKdP3Kas.webp') no-repeat center/cover"></div>
                    </div>
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

<script>
    // Простая логика смены картинки
    function changeMainImage(src) {
        document.getElementById('mainProductImg').src = src;
    }

    // Обновление цены при выборе конфига (визуальное)
    function updatePrice(price) {
        document.querySelector('.price-big').textContent = price + ' руб.';
    }
</script>


</body>
</html>