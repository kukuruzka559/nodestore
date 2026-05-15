// catalog-filters.js

document.addEventListener('DOMContentLoaded', function() {

    // --- Инициализация ползунков с помощью noUiSlider ---
    function initRangeSlider(containerClass, minInput, maxInput, dataMin, dataMax) {
        const sliderElem = document.querySelector(containerClass);
        if (!sliderElem) return;
        const minVal = parseFloat(sliderElem.dataset.min) || dataMin;
        const maxVal = parseFloat(sliderElem.dataset.max) || dataMax;
        noUiSlider.create(sliderElem, {
            start: [minVal, maxVal],
            connect: true,
            range: { min: minVal, max: maxVal },
            step: (containerClass.includes('diagonal') ? 0.1 : 1),
            format: { to: v => Math.round(v * 100) / 100, from: v => parseFloat(v) }
        });
        const minField = document.querySelector(minInput);
        const maxField = document.querySelector(maxInput);
        if (minField && maxField) {
            minField.value = minVal;
            maxField.value = maxVal;
            sliderElem.noUiSlider.on('update', (values) => {
                minField.value = values[0];
                maxField.value = values[1];
            });
            minField.addEventListener('change', () => {
                let val = parseFloat(minField.value) || minVal;
                val = Math.min(Math.max(val, minVal), maxVal);
                sliderElem.noUiSlider.set([val, null]);
            });
            maxField.addEventListener('change', () => {
                let val = parseFloat(maxField.value) || maxVal;
                val = Math.min(Math.max(val, minVal), maxVal);
                sliderElem.noUiSlider.set([null, val]);
            });
        }
    }

    initRangeSlider('.price-range-slider', '.price-min', '.price-max', 0, 20000);
    initRangeSlider('.year-range-slider', '.year-min', '.year-max', 2003, 2026);
    initRangeSlider('.diagonal-slider', '.diagonal-min', '.diagonal-max', 0.5, 12);
    initRangeSlider('.ram-slider', '.ram-min', '.ram-max', 1, 32);
    initRangeSlider('.storage-slider', '.storage-min', '.storage-max', 16, 1024);
    initRangeSlider('.battery-slider', '.battery-min', '.battery-max', 500, 25000);

    // --- Механизм "Показать еще" ---
    document.querySelectorAll('.show-more-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const parent = btn.closest('.filter-options');
            const hiddenBlock = parent.querySelector('.extra-options');
            if (hiddenBlock) {
                const isHidden = hiddenBlock.classList.contains('hidden');
                hiddenBlock.classList.toggle('hidden', !isHidden);
                btn.textContent = isHidden ? 'Свернуть' : 'Показать еще ' + (hiddenBlock.children.length);
            }
        });
    });

    // --- Поиск по чекбоксам (фильтр "Разрешение экрана") ---
    const searchInputs = document.querySelectorAll('.filter-search');
    searchInputs.forEach(input => {
        input.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const container = this.closest('.filter-options');
            const labels = container.querySelectorAll('.filter-checkbox');
            labels.forEach(label => {
                const text = label.textContent.toLowerCase();
                if (text.includes(query)) {
                    label.style.display = 'flex';
                } else {
                    label.style.display = 'none';
                }
            });
        });
    });

    // --- Подсказки (tooltip) через data-tooltip ---
    const helpIcons = document.querySelectorAll('.help-icon');
    helpIcons.forEach(icon => {
        const tooltipText = icon.dataset.tooltip;
        if (tooltipText) icon.setAttribute('data-tooltip', tooltipText);
    });

    // --- Сброс фильтров (кнопка "Сбросить фильтр") ---
    const resetBtn = document.querySelector('button[type="reset"]');
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('filter-form').reset();
            // дополнительно сбросить ползунки до первоначальных значений
            document.querySelectorAll('.noUi-target').forEach(slider => {
                if (slider.noUiSlider) {
                    const min = parseFloat(slider.dataset.min);
                    const max = parseFloat(slider.dataset.max);
                    slider.noUiSlider.set([min, max]);
                }
            });
        });
    }
});