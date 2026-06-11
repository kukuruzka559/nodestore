<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>


    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/top-products.css">
    <link rel="stylesheet" href="css/workspace.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/footer.css">

    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>

    <link rel="stylesheet" href="css/catalog/categories-nav.css">
    <link rel="stylesheet" href="css/catalog/catalog-layout.css">
    <link rel="stylesheet" href="css/catalog/filters.css">
    <link rel="stylesheet" href="css/product-card.css">
    <link rel="stylesheet" href="css/catalog/pagination.css">




    <!-- Дополнительные стили для фильтров -->
    <link rel="stylesheet" href="css/catalog/catalog-filters.css">
    <!-- noUiSlider -->
    <link href="https://cdn.jsdelivr.net/npm/nouislider@15.8.1/dist/nouislider.min.css" rel="stylesheet">

    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.8.1/dist/nouislider.min.js" defer></script>
    <script src="js/catalog-filters.js" defer></script>

    <link rel="stylesheet" href="css/catalog/catalogfix.css">

    <link rel="stylesheet" href="css/global.css">
    <script src="js/compare.js" defer></script>
<!--    <style-->
<!--    .noUi-handle{-->
<!--    -->
<!--    }-->
<!--    ></style>-->

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

<?php include 'blocks/header.php'; ?>
<?php include 'blocks/header2.php'; ?>
<main>


    <section class="categories-nav">
        <div class="container">
            <ul class="categories-list">
                <li><a href="#" class="cat-item active">Все товары</a></li>
                <li><a href="#" class="cat-item">Смартфоны</a></li>
                <li><a href="#" class="cat-item">Комплектующие для ПК</a></li>
                <li><a href="#" class="cat-item">Ноутбуки</a></li>
                <li><a href="#" class="cat-item">Периферия</a></li>
                <li><a href="#" class="cat-item">Аудио</a></li>
                <li><a href="#" class="cat-item">Аксессуары</a></li>
            </ul>
        </div>
    </section>

    <div class="container catalog-wrapper">
        <aside class="catalog-sidebar" style="transform-origin: left top;scale: 0.9;margin-top: 80px;">
            <form id="filter-form" action="#" method="get">

                <!-- Блок ЦЕНА -->
                <div class="filter-group" data-filter-group="price">
                    <div class="filter-group__header">
                        <h3 class="filter-title">Цена, р.</h3>
                    </div>
                    <div class="price-range-slider" data-min="39" data-max="15298"></div>
                    <div class="price-inputs">
                        <input type="number" class="price-min" placeholder="от 39">
                        <span>—</span>
                        <input type="number" class="price-max" placeholder="до 15298">
                    </div>
                </div>

                <!-- ПРОИЗВОДИТЕЛЬ (пример с "Показать еще") -->
                <div class="filter-group" data-filter-group="brand">
                    <h3 class="filter-title">
                        Производитель
                        <span class="help-icon" data-tooltip="Выберите одного или несколько производителей">?</span>
                    </h3>
                    <div class="filter-options">
                        <label class="filter-checkbox"><input type="checkbox" value="apple"> Apple</label>
                        <label class="filter-checkbox"><input type="checkbox" value="samsung"> Samsung</label>
                        <label class="filter-checkbox"><input type="checkbox" value="xiaomi"> Xiaomi</label>
                        <label class="filter-checkbox"><input type="checkbox" value="honor"> HONOR</label>
                        <label class="filter-checkbox"><input type="checkbox" value="poco"> POCO</label>
                        <div class="extra-options hidden">
                            <label class="filter-checkbox"><input type="checkbox" value="google"> Google</label>
                            <label class="filter-checkbox"><input type="checkbox" value="oneplus"> OnePlus</label>
                            <label class="filter-checkbox"><input type="checkbox" value="nokia"> Nokia</label>
                            <label class="filter-checkbox"><input type="checkbox" value="realme"> Realme</label>
                            <!-- ... остальные ... -->
                        </div>
                        <button type="button" class="show-more-btn">Показать еще 20</button>
                    </div>
                </div>

                <!-- АКЦИЯ -->
                <div class="filter-group">
                    <h3 class="filter-title">Акция</h3>
                    <div class="filter-options">
                        <label class="filter-checkbox"><input type="checkbox" value="sale"> Акция</label>
                    </div>
                </div>

                <!-- ДАТА ВЫХОДА (с ползунком) -->
                <div class="filter-group" data-filter-group="year">
                    <h3 class="filter-title">Дата выхода</h3>
                    <div class="year-range-slider" data-min="2003" data-max="2026"></div>
                    <div class="price-inputs">
                        <input type="number" class="year-min" placeholder="2003">
                        <span>—</span>
                        <input type="number" class="year-max" placeholder="2026">
                    </div>
                </div>

                <!-- ТИП УСТРОЙСТВА -->
                <div class="filter-group">
                    <h3 class="filter-title">Тип устройства</h3>
                    <div class="filter-options">
                        <label class="filter-checkbox"><input type="checkbox" value="smartphone"> Смартфон</label>
                        <label class="filter-checkbox"><input type="checkbox" value="button"> Кнопочный телефон</label>
                        <label class="filter-checkbox"><input type="checkbox" value="elderly"> Телефон для пожилых</label>
                    </div>
                </div>

                <!-- ПЛАТФОРМА / ОС -->
                <div class="filter-group">
                    <h3 class="filter-title">
                        Платформа
                        <span class="help-icon" data-tooltip="Операционная система устройства">?</span>
                    </h3>
                    <div class="filter-options">
                        <label class="filter-checkbox"><input type="checkbox" value="android"> Android</label>
                        <label class="filter-checkbox"><input type="checkbox" value="ios"> iOS</label>
                        <label class="filter-checkbox"><input type="checkbox" value="harmony"> HarmonyOS</label>
                        <div class="extra-options hidden">
                            <label class="filter-checkbox"><input type="checkbox" value="windows"> Windows Phone</label>
                            <label class="filter-checkbox"><input type="checkbox" value="kaios"> KaiOS</label>
                        </div>
                        <button type="button" class="show-more-btn">Показать еще 2</button>
                    </div>
                </div>

                <!-- ДИАГОНАЛЬ ЭКРАНА (ползунок) -->
                <div class="filter-group" data-filter-group="diagonal">
                    <h3 class="filter-title">Диагональ экрана, "</h3>
                    <div class="diagonal-slider" data-min="0.66" data-max="10.2"></div>
                    <div class="price-inputs">
                        <input type="number" class="diagonal-min" step="0.01" placeholder="0.66">
                        <span>—</span>
                        <input type="number" class="diagonal-max" step="0.01" placeholder="10.2">
                    </div>
                </div>

                <!-- РАЗРЕШЕНИЕ ЭКРАНА (поле поиска + чекбоксы с "Показать ещё") -->
                <div class="filter-group">
                    <h3 class="filter-title">Разрешение экрана, точек</h3>
                    <div class="filter-options">
                        <input type="text" class="filter-search" placeholder="Поиск">
                        <div class="options-scroll">
                            <label class="filter-checkbox"><input type="checkbox" value="1280x720"> 1280x720</label>
                            <label class="filter-checkbox"><input type="checkbox" value="1920x1080"> 1920x1080</label>
                            <label class="filter-checkbox"><input type="checkbox" value="2400x1080"> 2400x1080</label>
                            <label class="filter-checkbox"><input type="checkbox" value="1440x3120"> 1440x3120</label>
                            <div class="extra-options hidden">
                                <label class="filter-checkbox"><input type="checkbox" value="1179x2556"> 1179x2556</label>
                                <label class="filter-checkbox"><input type="checkbox" value="1206x2622"> 1206x2622</label>
                                <!-- и так далее ... -->
                            </div>
                            <button type="button" class="show-more-btn">Показать еще 10</button>
                        </div>
                    </div>
                </div>

                <!-- ОПЕРАТИВНАЯ ПАМЯТЬ (ползунок + чекбоксы) -->
                <div class="filter-group" data-filter-group="ram">
                    <h3 class="filter-title">Оперативная память, ГБ</h3>
                    <div class="ram-slider" data-min="1" data-max="24"></div>
                    <div class="price-inputs">
                        <input type="number" class="ram-min" placeholder="1">
                        <span>—</span>
                        <input type="number" class="ram-max" placeholder="24">
                    </div>
                    <div class="filter-options mt-2">
                        <label class="filter-checkbox"><input type="checkbox" value="4"> 4 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="6"> 6 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="8"> 8 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="12"> 12 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="16"> 16 ГБ</label>
                    </div>
                </div>

                <!-- ВСТРОЕННАЯ ПАМЯТЬ -->
                <div class="filter-group" data-filter-group="storage">
                    <h3 class="filter-title">Встроенная память, ГБ</h3>
                    <div class="storage-slider" data-min="32" data-max="1024"></div>
                    <div class="price-inputs">
                        <input type="number" class="storage-min" placeholder="32">
                        <span>—</span>
                        <input type="number" class="storage-max" placeholder="1024">
                    </div>
                    <div class="filter-options mt-2">
                        <label class="filter-checkbox"><input type="checkbox" value="128"> 128 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="256"> 256 ГБ</label>
                        <label class="filter-checkbox"><input type="checkbox" value="512"> 512 ГБ</label>
                    </div>
                </div>

                <!-- ЕМКОСТЬ АККУМУЛЯТОРА -->
                <div class="filter-group" data-filter-group="battery">
                    <h3 class="filter-title">Емкость аккумулятора, мАч</h3>
                    <div class="battery-slider" data-min="1000" data-max="33000"></div>
                    <div class="price-inputs">
                        <input type="number" class="battery-min" placeholder="1000">
                        <span>—</span>
                        <input type="number" class="battery-max" placeholder="33000">
                    </div>
                </div>

                <!-- NFC, БЕСПРОВОДНАЯ ЗАРЯДКА (радио/чекбоксы) -->
                <div class="filter-group">
                    <h3 class="filter-title">Беспроводная зарядка</h3>
                    <div class="filter-options">
                        <label class="filter-radio"><input type="radio" name="wireless" value="any" checked> Не важно</label>
                        <label class="filter-radio"><input type="radio" name="wireless" value="yes"> Есть</label>
                        <label class="filter-radio"><input type="radio" name="wireless" value="no"> Нет</label>
                    </div>
                </div>

                <div class="filter-group">
                    <h3 class="filter-title">NFC</h3>
                    <div class="filter-options">
                        <label class="filter-radio"><input type="radio" name="nfc" value="any" checked> Не важно</label>
                        <label class="filter-radio"><input type="radio" name="nfc" value="yes"> Есть</label>
                        <label class="filter-radio"><input type="radio" name="nfc" value="no"> Нет</label>
                    </div>
                </div>

                <!-- КНОПКА ПРИМЕНИТЬ -->
                <button type="submit" class="btn btn--primary btn--full">Применить</button>
                <button type="reset" class="btn btn--secondary btn--full mt-2">Сбросить фильтр</button>
            </form>
        </aside>








        <section class="catalog-main" style="margin-top: 80px;">
            <div class="catalog-toolbar">
                <p class="results-count">Найдено: 124 товара</p>
                <div class="sorting">
                    <span>Сортировать:</span>
                    <select>
                        <option>По популярности</option>
                        <option>Сначала дешевле</option>
                        <option>Сначала дороже</option>
                    </select>
                </div>
            </div>

            <div class="catalog-grid" style="margin-top: 80px;">

                <?php
                        require_once 'lib/db.php';
                        $sql = 'SELECT * FROM products ORDER BY id';
                        $query = $pdo->prepare($sql);
                        $query->execute();
                        $products = $query->fetchAll(PDO::FETCH_OBJ);
                // Создаем переменную для задержки с начальным значением 0
                $delay = 0;
                        foreach ($products as $prod) {
                            echo
                                    '
                                    <article class="product-card" style="height: auto; width: auto; border: none" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="200" data-aos-delay="'.$delay.'">
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
                                                    <div class="product-card__tags">';
                            // Разбиваем строку тегов по разделителю (запятая)
                            $tagsArray = explode(',', $prod->tags);
                            // Проходим по каждому тегу и выводим его в отдельном контейнере
                            foreach ($tagsArray as $tag) {
                                $cleanTag = trim($tag);
                                if (!empty($cleanTag)) {
                                    echo '<span class="tag-small">' . htmlspecialchars($cleanTag) . '</span>';
                                }
                            }echo '

                                                    </div>
                                                    <div style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
                                                    <button class="btn btn--primary btn--small add-to-cart-btn" onclick="CompareManager.add('.$prod->id.')" style="background: none; border: 1px solid var(--color-border); color: var(--color-dark)">Сравнить</button>
                                                    <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                    </article>

                            ';
                            // Увеличиваем задержку на 100 для следующей карточки
                            $delay += 100;
                        }
                ?>
            </div>

            <div class="pagination">
                <a href="#" class="page-link prev">←</a>
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-link">12</a>
                <a href="#" class="page-link next">→</a>
            </div>
        </section>
    </div>
</main>

<?php include 'blocks/footer.php'; ?>
<script src="aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>

