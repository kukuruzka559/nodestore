document.addEventListener('DOMContentLoaded', () => {
    const buildsList = document.getElementById('buildsList');
    const activeBuildImage = document.getElementById('activeBuildImage');
    const activeBuildTitle = document.getElementById('activeBuildTitle');
    const activeBuildTag = document.getElementById('activeBuildTag');
    const activeBuildPrice = document.getElementById('activeBuildPrice');
    const activeBuildLink = document.getElementById('activeBuildLink');

    // Элементы спецификаций
    const specs = {
        cpu: document.getElementById('specCpu'),
        gpu: document.getElementById('specGpu'),
        mobo: document.getElementById('specMobo'),
        ram: document.getElementById('specRam'),
        storage: document.getElementById('specStorage'),
        power: document.getElementById('specPower'),
        case: document.getElementById('specCase'),
    };

    let allBuilds = [];

    // Запрос к PHP бэкенду
    fetch('lib/get_pc_builds.php')
        .then(res => res.json())
        .then(response => {
            if (response.success && response.data.length > 0) {
                allBuilds = response.data;
                renderList();
                setActiveBuild(0); // Делаем первую сборку активной
            } else {
                buildsList.innerHTML = '<div style="padding:10px;">Нет доступных сборок</div>';
            }
        })
        .catch(err => {
            console.error('Ошибка:', err);
            buildsList.innerHTML = '<div style="padding:10px;color:red;">Ошибка загрузки</div>';
        });

    // Отрисовка левого списка
    function renderList() {
        buildsList.innerHTML = '';
        allBuilds.forEach((build, index) => {
            const item = document.createElement('div');
            item.className = 'build-item';
            item.innerHTML = `
                <img class="build-item-img" src="pc_builds/${build.image}">
                <span class="build-item-title">${build.title}</span>
                <span class="build-item-price">$${build.price}</span>
            `;
            item.onclick = () => setActiveBuild(index);
            buildsList.appendChild(item);
        });
    }

    // Установка активной сборки
    function setActiveBuild(index) {
        // Выделение в списке
        const items = buildsList.querySelectorAll('.build-item');
        items.forEach(i => i.classList.remove('active'));
        if(items[index]) items[index].classList.add('active');

        const build = allBuilds[index];

        // Замена картинки (если её нет - останется серый фон)
        if (build.image) {
            activeBuildImage.src = `pc_builds/${build.image}`;
            activeBuildImage.style.display = 'block';
        } else {
            activeBuildImage.style.display = 'none';
        }

        // Обновление текстов
        activeBuildTitle.textContent = build.title;
        activeBuildTag.textContent = build.tag || 'СБОРКА';
        activeBuildPrice.textContent = `$${build.price}`;
        activeBuildLink.href = build.link || '#';

        // Обновление железа
        specs.cpu.textContent = build.cpu;
        specs.gpu.textContent = build.gpu;
        specs.mobo.textContent = build.motherboard;
        specs.ram.textContent = build.ram;
        specs.storage.textContent = build.storage;
        specs.power.textContent = build.power_supply;
        specs.case.textContent = build.case_name;
    }
});