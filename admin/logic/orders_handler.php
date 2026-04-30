<?php
require_once '../../lib/db.php';
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

switch($action) {
    case 'get':
        $status = $_GET['status'] ?? 'all';
        $search = $_GET['search'] ?? '';

        $query = "SELECT o.*, u.email as user_email, p.name as product_name 
                  FROM orders o 
                  JOIN users u ON o.user_id = u.id 
                  JOIN products p ON o.product_id = p.id";

        $params = [];
        $conditions = [];

        if ($status !== 'all') {
            $conditions[] = "o.status = ?";
            $params[] = $status;
        }

        if (!empty($search)) {
            $conditions[] = "(o.order_id LIKE ? OR u.email LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $query .= " ORDER BY o.order_id DESC";

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'update_status':
        $id = (int)$_POST['id'];
        $status = $_POST['status'];
        $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
        $stmt->execute([$status, $id]);
        echo json_encode(['success' => true]);
        break;

    case 'save':
        $id = $_POST['order_id'] ?? '';
        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];
        $count = $_POST['count'];
        $price = $_POST['priceforone'];
        $status = $_POST['status'];
        $date = date('Y-m-d');

        if (empty($id)) {
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, count, priceforone, status, order_date, warehouse_id, shop_id) VALUES (?, ?, ?, ?, ?, ?, 1, 1)");
            $stmt->execute([$user_id, $product_id, $count, $price, $status, $date]);
        } else {
            $stmt = $pdo->prepare("UPDATE orders SET user_id=?, product_id=?, count=?, priceforone=?, status=? WHERE order_id=?");
            $stmt->execute([$user_id, $product_id, $count, $price, $status, $id]);
        }
        echo json_encode(['success' => true]);
        break;

    case 'delete':
        $id = (int)$_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);
        break;
}
?>