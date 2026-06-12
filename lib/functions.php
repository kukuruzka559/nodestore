<?php
function formatText($text, $default = "Не указано") {
    if (empty($text)) {
        return $default;
    }
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

// Функция для форматирования цены
function priceFormat($price) {
    return number_format((float)$price, 2, '.', ',') . ' руб.';
}
?>