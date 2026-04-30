document.addEventListener('DOMContentLoaded', () => {
    // Находим все кнопки добавления в корзину
    const cartBtns = document.querySelectorAll('.add-to-cart-btn');

    cartBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const productId = this.getAttribute('data-id');
            if (!productId) return;

            const formData = new FormData();
            formData.append('product_id', productId);

            // Сохраняем изначальный текст кнопки
            const originalText = this.textContent;
            this.textContent = 'Загрузка...';

            fetch('lib/action_cart.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'error') {
                        alert(data.message);
                        this.textContent = originalText;
                        return;
                    }

                    // Если успешно добавлено
                    if (data.status === 'success') {
                        this.classList.add('added');
                        this.textContent = 'Добавлено!';

                        // Возвращаем кнопку в исходное состояние через 2 секунды
                        setTimeout(() => {
                            this.classList.remove('added');
                            this.textContent = originalText;
                        }, 2000);
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    this.textContent = originalText;
                });
        });
    });
});