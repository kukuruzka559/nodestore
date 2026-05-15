document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('productsTableBody');
    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const modalTitle = document.getElementById('modalTitle');

    // Загрузка товаров
    function loadProducts() {
        fetch('logic/handler.php?action=get')
            .then(res => res.json())
            .then(data => {
                tableBody.innerHTML = '';
                document.getElementById('total-products').textContent = `${data.length} товара`;
                data.forEach(product => {
                    // Путь к картинке относительно админки. Если картинка в корне, то ../img/
                    let imgSrc = product.img ? `../img/${product.img}` : 'https://via.placeholder.com/40';
                    tableBody.innerHTML += `
                        <tr>
                            <td>[${product.id}]</td>
                            <td><img src="${imgSrc}" alt="${product.name}"></td>
                            <td>
                                <strong>${product.name}</strong><br>
                                <small class="text-muted">${product.description ? product.description.substring(0,30)+'...' : ''}</small>
                            </td>
                            <td><span class="tag">${product.category || 'Без категории'}</span></td>
                            <td><strong>${product.price} руб.</strong></td>
                            <td>
                                <button class="action-btn" onclick="editProduct(${product.id})">✎</button>
                                <button class="action-btn" onclick="deleteProduct(${product.id})">🗑</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }

    loadProducts();

    // Работа с модальным окном
    document.getElementById('openAddModalBtn').onclick = () => {
        form.reset();
        document.getElementById('productId').value = '';
        document.getElementById('existingImage').value = '';
        document.querySelector('.drop-zone__prompt').textContent = 'Перетащите картинку сюда или кликните';
        modalTitle.textContent = 'Добавить товар';
        modal.classList.add('active');
    };

    document.getElementById('closeModalBtn').onclick = () => modal.classList.remove('active');

    // Drag and drop логика
    const dropZoneElement = document.querySelector(".drop-zone");
    const inputElement = document.querySelector(".drop-zone__input");

    dropZoneElement.addEventListener("click", () => inputElement.click());

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach(type => {
        dropZoneElement.addEventListener(type, () => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }
        dropZoneElement.classList.remove("drop-zone--over");
    });

    function updateThumbnail(dropZoneElement, file) {
        let prompt = dropZoneElement.querySelector(".drop-zone__prompt");
        if(prompt) prompt.textContent = file.name;
    }

    // Сохранение (Добавление/Обновление)
    form.onsubmit = (e) => {
        e.preventDefault();
        let formData = new FormData(form);

        fetch('logic/handler.php?action=save', {
            method: 'POST',
            body: formData
        }).then(res => res.json()).then(data => {
            if(data.success) {
                modal.classList.remove('active');
                loadProducts();
            } else {
                alert('Ошибка: ' + data.error);
            }
        });
    };

    // Глобальные функции для кнопок в таблице
    window.editProduct = (id) => {
        fetch(`logic/handler.php?action=get_one&id=${id}`)
            .then(res => res.json())
            .then(product => {
                document.getElementById('productId').value = product.id;
                document.getElementById('productName').value = product.name;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productCategory').value = product.category;
                document.getElementById('productTags').value = product.tags;
                document.getElementById('productDescription').value = product.description;
                document.getElementById('existingImage').value = product.img;

                document.querySelector('.drop-zone__prompt').textContent = product.img ? `Текущее фото: ${product.img}` : 'Перетащите картинку сюда или кликните';

                modalTitle.textContent = 'Редактировать товар';
                modal.classList.add('active');
            });
    };

    window.deleteProduct = (id) => {
        if(confirm('Точно удалить?')) {
            let formData = new FormData();
            formData.append('id', id);
            fetch('logic/handler.php?action=delete', {
                method: 'POST',
                body: formData
            }).then(() => loadProducts());
        }
    };
});