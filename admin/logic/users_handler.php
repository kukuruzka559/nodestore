<?php
require_once '../../lib/db.php';
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

switch($action) {
    case 'get':
        $search = $_GET['search'] ?? '';
        if (!empty($search)) {
            $stmt = $pdo->prepare("SELECT id, username, email FROM users WHERE id LIKE ? OR email LIKE ? OR username LIKE ? ORDER BY id DESC");
            $stmt->execute(["%$search%", "%$search%", "%$search%"]);
        } else {
            $stmt = $pdo->query("SELECT id, username, email FROM users ORDER BY id DESC");
        }
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'get_one':
        $id = (int)$_GET['id'];
        $stmt = $pdo->prepare("SELECT id, username, email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        break;

    case 'save':
        $id = $_POST['id'] ?? '';
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($id)) {
            // Добавление нового
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPass]);
        } else {
            // Редактирование
            if (!empty($password)) {
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
                $stmt->execute([$username, $email, $hashedPass, $id]);
            } else {
                $stmt = $pdo->prepare("UPDATE users SET username=?, email=? WHERE id=?");
                $stmt->execute([$username, $email, $id]);
            }
        }
        echo json_encode(['success' => true]);
        break;

    case 'delete':
        $id = (int)$_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);
        break;
}
?>