// Логика для страницы товара
document.addEventListener('DOMContentLoaded', () => {

    // Переключение конфигурации
    const configBtns = document.querySelectorAll('.config-btn');
    configBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            configBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    // Смена главной фотографии при клике на миниатюры
    const thumbnails = document.querySelectorAll('.thumb-box img');
    const mainImg = document.querySelector('.hero-main-image img');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mainImg.src = thumb.src;
        });
    });

});