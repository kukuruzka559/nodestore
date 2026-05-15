document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('ordersTableBody');
    const orderModal = document.getElementById('orderModal');
    const orderForm = document.getElementById('orderForm');
    const searchInput = document.getElementById('orderSearch');
    let currentStatus = 'all';

    // Загрузка заказов
    function loadOrders(search = '') {
        fetch(`logic/orders_handler.php?action=get&status=${currentStatus}&search=${search}`)
            .then(res => res.json())
            .then(data => {
                tableBody.innerHTML = '';
                document.getElementById('total-orders').textContent = `${data.length} записей`;

                data.forEach(order => {
                    tableBody.innerHTML += `
                        <tr data-id="${order.order_id}">
                            <td>#${order.order_id}</td>
                            <td>${order.order_date}</td>
                            <td>
                                <strong>ID: ${order.user_id}</strong><br>
                                <small>${order.user_email}</small>
                            </td>
                            <td>${order.product_name}</td>
                            <td>${order.count} шт.</td>
                            <td><strong>${(order.count * order.priceforone).toFixed(2)} руб.</strong></td>
                            <td>
                                <select class="status-select" onchange="quickUpdateStatus(${order.order_id}, this.value)">
                                    ${getStatusOptions(order.status)}
                                </select>
                            </td>
                            <td>
                                <button class="action-btn" onclick="editOrder(${order.order_id})">✎</button>
                                <button class="action-btn" onclick="deleteOrder(${order.order_id})">🗑</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    function getStatusOptions(current) {
        const statuses = ["В обработке", "Отправлен", "Транспортировка", "Готов к получению", "Получен", "Завершен"];
        return statuses.map(s => `<option value="${s}" ${s === current ? 'selected' : ''}>${s}</option>`).join('');
    }

    // Поиск с задержкой (Debounce)
    let searchTimeout;
    searchInput.oninput = () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => loadOrders(searchInput.value), 500);
    };

    // Фильтрация по кнопкам
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.onclick = function() {
            document.querySelector('.filter-btn.active').classList.remove('active');
            this.classList.add('active');
            currentStatus = this.dataset.status;
            loadOrders(searchInput.value);
        };
    });

    // Быстрое обновление статуса
    window.quickUpdateStatus = (id, newStatus) => {
        const formData = new FormData();
        formData.append('id', id);
        formData.append('status', newStatus);
        fetch('logic/orders_handler.php?action=update_status', { method: 'POST', body: formData });
    };

    // Удаление
    window.deleteOrder = (id) => {
        if(confirm('Удалить заказ навсегда?')) {
            const formData = new FormData();
            formData.append('id', id);
            fetch('logic/orders_handler.php?action=delete', { method: 'POST', body: formData }).then(() => loadOrders());
        }
    };

    // Модальное окно: Добавление
    document.getElementById('openAddOrderModalBtn').onclick = () => {
        orderForm.reset();
        document.getElementById('orderId').value = '';
        document.getElementById('orderModalTitle').textContent = 'Создать заказ';
        orderModal.classList.add('active');
    };

    document.getElementById('closeOrderModalBtn').onclick = () => orderModal.classList.remove('active');

    // Сохранение формы
    orderForm.onsubmit = (e) => {
        e.preventDefault();
        fetch('logic/orders_handler.php?action=save', {
            method: 'POST',
            body: new FormData(orderForm)
        }).then(() => {
            orderModal.classList.remove('active');
            loadOrders();
        });
    };

    loadOrders();
});