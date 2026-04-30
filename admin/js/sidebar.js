document.addEventListener('DOMContentLoaded', () => {
    const dropdownToggle = document.getElementById('pagesDropdown');
    const dropdownParent = dropdownToggle.parentElement;

    dropdownToggle.addEventListener('click', () => {
        // Переключаем класс active у родительского контейнера
        dropdownParent.classList.toggle('active');

        // Опционально: закрывать другие списки, если они будут
    });

    // Сохранение состояния (чтобы меню не закрывалось при переходе между страницами редактирования)
    // const currentPath = window.location.pathname;
    // if (currentPath.includes('edit_')) {
    //     dropdownParent.classList.add('active');
    // }
});