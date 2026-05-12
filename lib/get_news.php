<?php
require_once 'db.php';

function getLatestNews($pdo) {
    $stmt = $pdo->query("SELECT * FROM news ORDER BY date_added DESC LIMIT 10");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Если запрос идет через AJAX
if (isset($_GET['ajax'])) {
    echo json_encode(getLatestNews($pdo));
    exit;
}
?>