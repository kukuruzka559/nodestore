<?php
// Подключаем БД (путь на два уровня вверх от /admin/logic/)
require_once '../../lib/db.php';

$action = $_GET['action'] ?? '';

switch($action) {
    case 'get':
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'get_one':
        $id = (int)$_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        break;

    case 'delete':
        $id = (int)$_POST['id'];
        // По-хорошему тут еще надо физически удалить файл картинки из папки, если нужно
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);
        break;

    case 'save':
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'];
        $price = (int)$_POST['price'];
        $tags = $_POST['tags'] ?? '';
        $description = $_POST['description'] ?? '';
        $category = $_POST['category'] ?? '';

        $imgName = $_POST['existing_img'] ?? '';

        // Обработка загрузки файла
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $_FILES['image']['tmp_name'];
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            // Сохраняем в папку img в корне сайта. Убедись, что у папки есть права на запись!
            $uploadPath = '../../img/' . $fileName;

            if (move_uploaded_file($tmpPath, $uploadPath)) {
                $imgName = $fileName;
            } else {
                echo json_encode(['success' => false, 'error' => 'Ошибка загрузки файла']);
                exit;
            }
        }

        if (empty($id)) {
            // Добавление
            $stmt = $pdo->prepare("INSERT INTO products (name, price, tags, description, category, img) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $price, $tags, $description, $category, $imgName]);
        } else {
            // Обновление
            $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, tags=?, description=?, category=?, img=? WHERE id=?");
            $stmt->execute([$name, $price, $tags, $description, $category, $imgName, $id]);
        }

        echo json_encode(['success' => true]);
        break;
}
?>