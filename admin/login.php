<?php
session_start();

// Если уже залогинен — отправляем в админку
if (isset($_SESSION['admin_auth'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Проверка дефолтных данных
    if ($login === 'admin' && $pass === 'admin') {
        $_SESSION['admin_auth'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в панель управления</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
        .login-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4;
        }
        .login-card {
            background: #fff;
            padding: 40px;
            border: 1px solid #eee;
            width: 100%;
            max-width: 360px;
            display: flex;
            flex-direction: column; align-items: center
        }
        .login-title {
            margin-bottom: 25px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 1px;
            width: fit-content;
        }
        .error-msg {
            color: #ff4500;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .form-group { margin-bottom: 15px; display: flex; flex-direction: column; align-items: center}
        .form-group label { display: block; margin-bottom: 5px; font-size: 18px; text-transform: uppercase; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ddd; outline: none; font-size: 18px}
        .form-group input:focus { border-color: #000; }
    </style>
</head>
<body class="login-page">
<div class="login-card">
    <h2 class="login-title">Вход</h2>

    <?php if ($error): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" style="flex-direction: column; align-items: center; display: flex;">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" required autofocus>
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn btn--primary btn--full">Войти</button>
    </form>
</div>
</body>
</html>