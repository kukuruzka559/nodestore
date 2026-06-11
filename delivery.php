<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доставка и оплата | NODESTORE</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="css/delivery.css">
</head>
<body>
<?php include 'blocks/header.php'; ?>

<main class="info-page">
    <div class="container" style="margin-top: 80px;">
        <header class="page-header">
            <h1>Доставка и оплата</h1>
            <p class="page-subtitle">Прозрачные условия для тех, кто ценит технику.</p>
        </header>

        <div class="info-grid">
            <section class="info-section">
                <h2 class="section-label">01. Доставка</h2>

                <div class="method-card">
                    <h3>Самовывоз (Минск)</h3>
                    <p>Забирайте заказ в нашем воркспейсе. Бесплатно, в день заказа.</p>
                    <span class="method-meta">Пн-Вс: 10:00 — 21:00</span>
                </div>

                <div class="method-card">
                    <h3>Курьер по городу</h3>
                    <p>Доставка по Минску в пределах МКАД. При заказе от 200 BYN — бесплатно.</p>
                    <span class="method-meta">Стоимость: 10 BYN | Срок: Сегодня/Завтра</span>
                </div>

                <div class="method-card">
                    <h3>Доставка по Беларуси</h3>
                    <p>Отправляем через «Белпочта», «Европочта» или «Автолайт». Надежная упаковка в антистатик и пупырку.</p>
                    <span class="method-meta">Срок: 2-3 рабочих дня</span>
                </div>
            </section>

            <section class="info-section">
                <h2 class="section-label">02. Оплата</h2>

                <div class="method-card">
                    <h3>Наличными / Картой</h3>
                    <p>При получении заказа в пункте самовывоза или курьеру.</p>
                </div>

                <div class="method-card">
                    <h3>Система «Расчет» (ЕРИП)</h3>
                    <p>Дистанционная оплата через интернет-банкинг или инфокиоск.</p>
                    <span class="method-meta">Код услуги: 123456</span>
                </div>

                <div class="method-card">
                    <h3>Онлайн на сайте</h3>
                    <p>Безопасная оплата картами Visa, MasterCard, Белкарт через платежный шлюз.</p>
                </div>

                <div class="security-note">
                    <p>/// Все транзакции защищены протоколом SSL. Мы не храним данные ваших карт.</p>
                </div>
            </section>
        </div>
    </div>
</main>

<?php include 'blocks/footer.php'; ?>
</body>
</html>