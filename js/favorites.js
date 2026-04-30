document.addEventListener('DOMContentLoaded', () => {
    // Находим все кнопки избранного на странице
    const wishlistBtns = document.querySelectorAll('.wishlist-btn');

    wishlistBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault(); // Отменяем стандартное поведение

            const productId = this.getAttribute('data-id');
            if (!productId) return;

            // Формируем данные для отправки на сервер
            const formData = new FormData();
            formData.append('product_id', productId);

            // Отправляем запрос к PHP обработчику
            fetch('lib/action_favorites.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'error') {
                        alert(data.message); // Например, просим войти в аккаунт
                        return;
                    }

                    // Меняем внешний вид кнопки в зависимости от ответа сервера
                    if (data.action === 'added') {
                        this.classList.add('active');
                        this.textContent = '♥'; // Закрашенное сердечко
                    } else if (data.action === 'removed') {
                        this.classList.remove('active');
                        this.textContent = '♡'; // Пустое сердечко
                    }
                })
                .catch(error => console.error('Ошибка:', error));
        });
    });
});