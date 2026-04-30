document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('usersTableBody');
    const userModal = document.getElementById('userModal');
    const userForm = document.getElementById('userForm');
    const searchInput = document.getElementById('userSearch');

    function loadUsers(search = '') {
        fetch(`logic/users_handler.php?action=get&search=${search}`)
            .then(res => res.json())
            .then(data => {
                tableBody.innerHTML = '';
                document.getElementById('total-users').textContent = data.length;
                data.forEach(user => {
                    tableBody.innerHTML += `
                        <tr>
                            <td>[${user.id}]</td>
                            <td><strong>${user.username}</strong></td>
                            <td>${user.email}</td>
                            <td>
                                <button class="action-btn" onclick="editUser(${user.id})">✎</button>
                                <button class="action-btn" onclick="deleteUser(${user.id})">🗑</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    // Поиск
    let timeout;
    searchInput.oninput = () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => loadUsers(searchInput.value), 400);
    };

    // Модалка
    document.getElementById('openAddUserModalBtn').onclick = () => {
        userForm.reset();
        document.getElementById('editUserId').value = '';
        document.getElementById('userModalTitle').textContent = 'Добавить пользователя';
        userModal.classList.add('active');
    };

    document.getElementById('closeUserModalBtn').onclick = () => userModal.classList.remove('active');

    // Сохранение
    userForm.onsubmit = (e) => {
        e.preventDefault();
        fetch('logic/users_handler.php?action=save', {
            method: 'POST',
            body: new FormData(userForm)
        }).then(() => {
            userModal.classList.remove('active');
            loadUsers();
        });
    };

    window.editUser = (id) => {
        fetch(`logic/users_handler.php?action=get_one&id=${id}`)
            .then(res => res.json())
            .then(user => {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('userName').value = user.username;
                document.getElementById('userEmail').value = user.email;
                document.getElementById('userModalTitle').textContent = 'Редактировать юзера';
                userModal.classList.add('active');
            });
    };

    window.deleteUser = (id) => {
        if (confirm('Удалить пользователя навсегда?')) {
            const formData = new FormData();
            formData.append('id', id);
            fetch('logic/users_handler.php?action=delete', {
                method: 'POST',
                body: formData
            }).then(() => loadUsers());
        }
    };

    loadUsers();
});