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


document.addEventListener('DOMContentLoaded', () => {
    const mainImg = document.querySelector('.hero-main-image img');
    const thumbs = document.querySelectorAll('.thumb-box img');
    let currentIndex = 0;

    // Смена по клику на миниатюру
    thumbs.forEach((img, index) => {
        img.parentElement.onclick = () => {
            mainImg.src = img.src;
            currentIndex = index;
        };
    });

    // Функция для кнопок "влево/вправо" (если добавишь их в верстку)
    window.moveSlide = (step) => {
        currentIndex += step;
        if (currentIndex >= thumbs.length) currentIndex = 0;
        if (currentIndex < 0) currentIndex = thumbs.length - 1;
        mainImg.src = thumbs[currentIndex].src;
    };
});