<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
<!--    <link rel="stylesheet" href="css/hero.css">-->
<!--    <link rel="stylesheet" href="css/top-products.css">-->
<!--    <link rel="stylesheet" href="css/workspace.css">-->
<!--    <link rel="stylesheet" href="css/sponsors.css">-->
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
<?php include 'blocks/header.php'; ?>

<link rel="stylesheet" href="css/auth/auth.css">

<main class="auth-section">
    <div class="auth-container">
        <h1 class="auth-title">Регистрация</h1>

        <div class="auth-card">
            <div class="auth-tabs">
                <button type="button" class="tab-btn tab-btn--active">Телефон</button>
                <button type="button" class="tab-btn">Почта</button>
            </div>

            <form action="lib/handle-registration.php" method="POST" class="auth-form">
                <input type="text" name="username" class="auth-input" placeholder="Введите имя пользователя" required>
                <input type="email" name="email" class="auth-input" placeholder="Введите адрес эл почты" required>
                <input type="password" name="password" class="auth-input" placeholder="Введите пароль" required>

                <div class="auth-social">
                    <p class="auth-social__title">Войти с помощью</p>
                    <div class="social-icons">
                        <div class="social-box">
                            <img src="icons/Google.svg">
                        </div>
                        <div class="social-box">
                            <img src="icons/LogoApple.svg">
                        </div>
                        <div class="social-box">
                            <img src="icons/Yandex.svg">
                        </div>
                    </div>
                </div>

                <div class="auth-actions">
                    <a href="login.php" class="btn btn--auth-secondary" style="display: flex; align-items: center; justify-content: center; border-radius: 100px; font-size: 24px;">Вход</a>
                    <button type="submit" class="btn btn--primary" style="border-radius: 100px; ">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'blocks/footer.php'; ?>
</body>
</html>
