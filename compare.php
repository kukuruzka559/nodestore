<?php
// ПОДКЛЮЧЕНИЕ К БАЗЕ
require_once 'lib/db.php'; // Убедись, что путь верный

// 1. Получаем ID товаров из GET-запроса (например, ?ids=1,2,3)
$ids_raw = $_GET['ids'] ?? '';
$product_ids = !empty($ids_raw) ? explode(',', $ids_raw) : [];

$products = [];
$common_specs = [];

if (!empty($product_ids)) {
    // Безопасно подготавливаем массив ID для SQL
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($product_ids);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($products) > 0) {
        // --- ЛОГИКА ПОИСКА ОБЩИХ ХАРАКТЕРИСТИК ---

        // Берем характеристики первого товара за эталон
        $first_prod_data = json_decode($products[0]['specifications'], true);
        $base_specs = $first_prod_data['specs'] ?? [];

        // Перебираем каждую группу (например, "Экран") и каждую характеристику в ней
        foreach ($base_specs as $group_name => $fields) {
            foreach ($fields as $field_name => $value) {

                $is_common = true;
                // Проверяем, есть ли эта характеристика у ВСЕХ остальных товаров
                foreach ($products as $p) {
                    $current_data = json_decode($p['specifications'], true);
                    if (!isset($current_data['specs'][$group_name][$field_name])) {
                        $is_common = false;
                        break;
                    }
                }

                // Если характеристика есть у всех, записываем её в список для вывода
                if ($is_common) {
                    $common_specs[$group_name][] = $field_name;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сравнение товаров</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">


    <script src="js/favorites.js" defer></script>
    <script src="js/cart.js" defer></script>

    <style>
        /* СТИЛИ ТАБЛИЦЫ */
        .compare-table { width: 100%; border-collapse: collapse; margin-top: 20px; table-layout: fixed; }
        .compare-row { border-bottom: 1px solid #ddd; }
        .cell-label { background: #f5f5f5; font-weight: bold; width: 250px; padding: 15px; text-align: left; border-right: 1px solid #ddd; }
        .cell-value { padding: 15px; text-align: center; word-wrap: break-word; }
        .category-header { background: #000; color: #fff; padding: 10px 15px; font-weight: bold; text-transform: uppercase; }

        /* ФИКСИРОВАННАЯ ШАПКА */
        .sticky-head { position: sticky; top: 80px; background: #fff; z-index: 10; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .product-card-info { padding: 15px; text-align: center; }
        .product-card-info img { max-width: 80px; display: block; margin: 0 auto 10px; }
        .btn-remove { color: red; cursor: pointer; border: none; background: none; font-size: 18px; border: 1px solid var(--color-border); border-radius: 100px; padding: 6px 12px;}

    </style>
</head>
<body>

<?php include 'blocks/header.php'; ?>

<main class="container" style="padding-top: 140px">
    <h1>Сравнение товаров</h1>

    <?php if (empty($products)): ?>
        <p>Список сравнения пуст. <a href="catalog.php">Вернуться в каталог</a></p>
    <?php else: ?>

        <table class="compare-table">
            <thead class="sticky-head">
            <tr class="compare-row">
                <th class="cell-label">Параметры</th>
                <?php foreach ($products as $p): ?>
                    <th class="product-card-info">
                        <img src="img/<?php echo $p['img']; ?>" alt="">
                        <div><?php echo $p['name']; ?></div>
                        <button class="wishlist-btn" data-id="<?php echo $p['id']; ?>">
                            <img src="icons/Like.svg" alt="Like">
                        </button>

                        <button class="btn-remove" onclick="removeFromCompare(<?php echo $p['id']; ?>)">✕ Удалить</button>

                        <button class="btn btn--primary btn--small add-to-cart-btn" data-id="<?php echo $p['id']; ?>">
                            В корзину
                        </button>
                    </th>
                <?php endforeach; ?>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($common_specs as $group_name => $fields): ?>
                <tr>
                    <td colspan="<?php echo count($products) + 1; ?>" class="category-header">
                        <?php echo $group_name; ?>
                    </td>
                </tr>

                <?php foreach ($fields as $field_name): ?>
                    <tr class="compare-row">
                        <td class="cell-label"><?php echo $field_name; ?></td>
                        <?php foreach ($products as $p):
                            $data = json_decode($p['specifications'], true);
                            $val = $data['specs'][$group_name][$field_name];
                            ?>
                            <td class="cell-value"><?php echo $val; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>

            <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</main>

<?php include 'blocks/footer.php'; ?>

<script>
    // МОСТ МЕЖДУ LOCALSTORAGE И PHP
    const CompareManager = {
        key: 'product_comparison',
        get() { return JSON.parse(localStorage.getItem(this.key) || '[]'); },
        remove(id) {
            let list = this.get().filter(item => item != id);
            localStorage.setItem(this.key, JSON.stringify(list));
            // Перезагружаем страницу с новым списком ID в URL
            window.location.href = 'compare.php?ids=' + list.join(',');
        }
    };

    // Если зашли на страницу без параметров в URL, но в localStorage что-то есть — редиректим на URL с ID
    const urlParams = new URLSearchParams(window.location.search);
    const idsInUrl = urlParams.get('ids');
    const idsInStorage = CompareManager.get();

    if (!idsInUrl && idsInStorage.length > 0) {
        window.location.href = 'compare.php?ids=' + idsInStorage.join(',');
    }

    function removeFromCompare(id) {
        CompareManager.remove(id);
    }
</script>

</body>
</html>