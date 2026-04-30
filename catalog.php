<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>

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
<?php include 'blocks/header.php'; ?>

<link rel="stylesheet" href="css/catalog/categories-nav.css">
<link rel="stylesheet" href="css/catalog/catalog-layout.css">
<link rel="stylesheet" href="css/catalog/filters.css">
<link rel="stylesheet" href="css/product-card.css">
<link rel="stylesheet" href="css/catalog/pagination.css">

<main>
    <section class="categories-nav">
        <div class="container">
            <ul class="categories-list">
                <li><a href="#" class="cat-item active">Смартфоны</a></li>
                <li><a href="#" class="cat-item">Комплектующие для ПК</a></li>
                <li><a href="#" class="cat-item">Ноутбуки</a></li>
                <li><a href="#" class="cat-item">Периферия</a></li>
                <li><a href="#" class="cat-item">Аудио</a></li>
                <li><a href="#" class="cat-item">Аксессуары</a></li>
            </ul>
        </div>
    </section>

    <div class="container catalog-wrapper">
        <aside class="catalog-sidebar">
            <div class="filter-group">
                <h3 class="filter-title">Цена, $</h3>
                <div class="price-inputs">
                    <input type="number" placeholder="От">
                    <input type="number" placeholder="До">
                </div>
            </div>

            <div class="filter-group">
                <h3 class="filter-title">Бренд</h3>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>Apple</span>
                </label>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>Samsung</span>
                </label>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>Nothing</span>
                </label>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>Xiaomi</span>
                </label>
            </div>

            <div class="filter-group">
                <h3 class="filter-title">Наличие</h3>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>В наличии</span>
                </label>
                <label class="filter-checkbox">
                    <input type="checkbox"> <span>Под заказ</span>
                </label>
            </div>

            <button class="btn btn--primary btn--full">Применить</button>
        </aside>

        <section class="catalog-main">
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

            <div class="products-grid">
                <?php /*for($i=0; $i<9; $i++): */?><!--
                    <article class="product-card">
                        <div class="product-card__img-placeholder">
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <h3 class="product-card__title">Смартфон Nothing Phone 2</h3>
                        <div class="product-card__tags">
                            <span class="tag-small">12/256 ГБ</span>
                            <span class="tag-small">Gray</span>
                        </div>
                        <div class="product-card__footer">
                            <span class="product-card__price">$799.00</span>
                            <button class="btn btn--primary btn--small">В корзину</button>
                        </div>
                    </article>
                --><?php /*endfor; */?>

                <?php
//                    for ($i = 1; $i <= 2; $i++) {
                        require_once 'lib/db.php';
                        $sql = 'SELECT * FROM products ORDER BY id';
                        $query = $pdo->prepare($sql);
                        $query->execute();
                        $products = $query->fetchAll(PDO::FETCH_OBJ);
                        foreach ($products as $prod) {
                            echo
                            '
                                <article class="product-card">
                                    <div class="product-card__img-placeholder" style="background: url(\'img/'.$prod->img.'\') no-repeat center / contain;">
                                        <button class="wishlist-btn" data-id="'.$prod->id.'">♡</button>
                                    </div>
                                    <h3 class="product-card__title">'.$prod->name.'</h3>
                                    <div class="product-card__tags">
                                        <span class="tag-small">'.$prod->tags.'</span>
                                        <!--<span class="tag-small">Gray</span>-->
                                    </div>
                                    <div class="product-card__footer">
                                        <span class="product-card__price">'.$prod->price.'</span>
                                        <button class="btn btn--primary btn--small add-to-cart-btn" data-id="'.$prod->id.'">В корзину</button>
                                    </div>
                                </article>
                            
                            
                            ';
                        }
//                    }

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
</body>
</html>

