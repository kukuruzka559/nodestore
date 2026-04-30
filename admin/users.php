<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи | Админ-панель</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/users_admin.css">
    <link rel="stylesheet" href="../css/global.css">


</head>
<body>
<div class="admin-layout">
    <!-- Сайдбар -->
    <?PHP require_once 'blocks/sidebar.php'; ?>

    <main class="main-content">
        <header class="topbar">
            <a href="../index.php"><button class="btn btn--primary">На сайт</button></a>
            <div class="search-bar">
                <input type="text" id="userSearch" placeholder="Поиск по ID, Email или Username...">
            </div>
        </header>

        <div class="content-header">
            <div class="title-block">
                <h1>Управление пользователями <span id="total-users" class="text-muted">0</span></h1>
            </div>
            <div class="actions-block">
                <button class="btn btn-primary" id="openAddUserModalBtn">+ Добавить юзера</button>
            </div>
        </div>

        <div class="table-container">
            <table class="admin-table">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>ДЕЙСТВИЯ</th>
                </tr>
                </thead>
                <tbody id="usersTableBody">
                <!-- Загружается через JS -->
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Модальное окно (User Modal) -->
<div class="modal-overlay" id="userModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="userModalTitle">Добавить пользователя</h2>
            <button class="close-btn" id="closeUserModalBtn">&times;</button>
        </div>
        <div class="modal-body">
            <form id="userForm">
                <input type="hidden" id="editUserId" name="id">

                <div class="form-group">
                    <label>Имя пользователя (Username)</label>
                    <input type="text" id="userName" name="username" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="userEmail" name="email" required>
                </div>

                <div class="form-group">
                    <label>Пароль (оставьте пустым при редактировании, если не хотите менять)</label>
                    <input type="password" id="userPassword" name="password">
                </div>

                <button type="submit" class="btn btn-primary btn-full">Сохранить данные</button>
            </form>
        </div>
    </div>
</div>

<script src="js/users_admin.js"></script>
<script src="js/sidebar.js"></script>
</body>
</html>