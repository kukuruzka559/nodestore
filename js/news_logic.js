document.addEventListener('DOMContentLoaded', () => {
    const newsItems = document.querySelectorAll('.news-item');
    const sliderTrack = document.getElementById('sliderTrack');
    const featTitle = document.getElementById('featTitle');
    const featDesc = document.getElementById('featDesc');
    const featDate = document.getElementById('featDate');
    const newsList = document.getElementById('newsList');
    const scrollBar = document.getElementById('scrollBar');

    let currentIndex = 0;
    let imgIndex = 0;
    let timer;

    function updateFeatured(index) {
        const item = newsItems[index];
        const images = item.dataset.images.split(',');

        // alert(images);

        // Обновление контента
        featTitle.textContent = item.dataset.title;
        featDesc.textContent = item.dataset.desc;
        featDate.textContent = item.dataset.date;

        // Обновление слайдера
        sliderTrack.innerHTML = images.map(img => `<img src="newsimgs/${img.trim()}" alt="news">`).join('');
        imgIndex = 0;
        sliderTrack.style.transform = `translateX(0)`;

        // Визуальный скролл списка
        newsItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');

        // Позиция индикатора скролла
        const scrollPercent = (index / (newsItems.length - 1)) * 80; // 80% высота бара
        scrollBar.style.height = '20%';
        scrollBar.style.top = `${scrollPercent}%`;

        // Авто-скролл самого контейнера списка
        item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // function nextNews() {
    //     currentIndex = (currentIndex + 1) % newsItems.length;
    //     updateFeatured(currentIndex);
    //     resetTimer();
    // }

    // function resetTimer() {
    //     clearInterval(timer);
    //     timer = setInterval(nextNews, 3000);
    // }

    // Листание картинок внутри новости
    document.getElementById('nextImg').onclick = () => {
        const imgs = sliderTrack.querySelectorAll('img');
        if (imgs.length > 1) {
            imgIndex = (imgIndex + 1) % imgs.length;
            sliderTrack.style.transform = `translateX(-${imgIndex * 100}%)`;
        }
    };

    document.getElementById('prevImg').onclick = () => {
        const imgs = sliderTrack.querySelectorAll('img');
        if (imgs.length > 1) {
            imgIndex = (imgIndex - 1 + imgs.length) % imgs.length;
            sliderTrack.style.transform = `translateX(-${imgIndex * 100}%)`;
        }
    };

    // Клик по новости в списке
    newsItems.forEach((item, idx) => {
        item.onclick = () => {
            currentIndex = idx;
            updateFeatured(currentIndex);
            resetTimer();
        };
    });

    // Инициализация
    updateFeatured(0);
    resetTimer();
});