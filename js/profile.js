document.addEventListener('DOMContentLoaded', () => {

    // === КОРЗИНА: Логика цены и чекбоксов ===
    const cartCheckboxes = document.querySelectorAll('.cart-checkbox');
    const selectAllCart = document.getElementById('selectAllCart');
    const totalPriceEl = document.getElementById('cartTotalPrice');
    const checkoutBtn = document.getElementById('checkoutBtn');

    function updateCartTotal() {
        let total = 0;
        let checkedCount = 0;
        cartCheckboxes.forEach(cb => {
            if (cb.checked) {
                const item = cb.closest('.cart-item');
                const price = parseFloat(cb.getAttribute('data-price'));
                const count = parseInt(item.querySelector('.item-count').textContent);
                total += price * count;
                checkedCount++;
            }
        });
        totalPriceEl.textContent = `$${total.toFixed(2)}`;
        checkoutBtn.disabled = checkedCount === 0;
    }

    if (selectAllCart) {
        selectAllCart.addEventListener('change', function() {
            cartCheckboxes.forEach(cb => cb.checked = this.checked);
            updateCartTotal();
        });
    }

    cartCheckboxes.forEach(cb => cb.addEventListener('change', updateCartTotal));

    // === КОРЗИНА: Изменение количества (+ / -) ===
    document.querySelectorAll('.count-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.closest('.cart-item');
            const productId = item.getAttribute('data-id');
            const countEl = item.querySelector('.item-count');
            let count = parseInt(countEl.textContent);
            const type = this.classList.contains('plus') ? 'plus' : 'minus';

            if (type === 'minus' && count <= 1) return; // Меньше 1 нельзя (пусть удаляют чекбоксом или крестиком, если добавишь)

            // Меняем визуально
            if (type === 'plus') count++;
            else count--;
            countEl.textContent = count;
            updateCartTotal();

            // Отправляем в БД
            const formData = new FormData();
            formData.append('action', 'update_cart');
            formData.append('product_id', productId);
            formData.append('type', type);

            fetch('lib/profile_api.php', { method: 'POST', body: formData });
        });
    });

    // === КОРЗИНА: Оформление заказа ===
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            const selectedIds = Array.from(cartCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            if (selectedIds.length === 0) return;

            checkoutBtn.textContent = 'Оформляем...';

            const formData = new FormData();
            formData.append('action', 'checkout');
            formData.append('product_ids', JSON.stringify(selectedIds));

            fetch('lib/profile_api.php', { method: 'POST', body: formData })
                .then(res => res.json())
                .then(data => {
                    if(data.status === 'success') {
                        location.reload(); // Перезагружаем страницу, товары уйдут в заказы
                    } else {
                        alert(data.message);
                        checkoutBtn.textContent = 'Оформить заказ';
                    }
                });
        });
    }

    // === ИЗБРАННОЕ: Чекбоксы ===
    const favCheckboxes = document.querySelectorAll('.fav-checkbox');
    const selectAllFav = document.getElementById('selectAllFav');

    if (selectAllFav) {
        selectAllFav.addEventListener('change', function() {
            favCheckboxes.forEach(cb => cb.checked = this.checked);
        });
    }

    // === ИЗБРАННОЕ: Удаление с Toast (Отменой) ===
    const toastContainer = document.getElementById('toast-container');

    function showToast(message, productId, cardElement) {
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.innerHTML = `
            <span>${message}</span>
            <button class="undo-btn">Отменить</button>
        `;
        toastContainer.appendChild(toast);

        // Авто-удаление тоста через 5 секунд
        const timeout = setTimeout(() => {
            toast.remove();
        }, 5000);

        // Кнопка отмены
        toast.querySelector('.undo-btn').addEventListener('click', () => {
            clearTimeout(timeout);
            // Возвращаем в БД
            const formData = new FormData();
            formData.append('action', 'toggle_fav');
            formData.append('product_id', productId);
            fetch('lib/profile_api.php', { method: 'POST', body: formData }).then(() => {
                cardElement.style.display = 'block'; // Показываем обратно
                toast.remove();
            });
        });
    }

    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const card = this.closest('.fav-item');
            const productId = this.getAttribute('data-id');

            // Удаляем из БД
            const formData = new FormData();
            formData.append('action', 'toggle_fav');
            formData.append('product_id', productId);

            fetch('lib/profile_api.php', { method: 'POST', body: formData }).then(() => {
                card.style.display = 'none'; // Прячем карточку
                showToast('Товар удалён из избранного', productId, card);
            });
        });
    });

    // === ЗАКАЗЫ: Удаление из истории ===
    document.querySelectorAll('.delete-order-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if(!confirm('Точно удалить заказ из истории?')) return;

            const item = this.closest('.order-item');
            const orderId = item.getAttribute('data-order-id');

            const formData = new FormData();
            formData.append('action', 'delete_order');
            formData.append('order_id', orderId);

            fetch('lib/profile_api.php', { method: 'POST', body: formData }).then(() => {
                item.remove();
            });
        });
    });

});