<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <li class="promo__item promo__item--boards">
            <a class="promo__link" href="all-lots.php"><?= $categories[0] ?></a>
        </li>
        <li class="promo__item promo__item--attachment">
            <a class="promo__link" href="all-lots.php"><?= $categories[1] ?></a>
        </li>
        <li class="promo__item promo__item--boots">
            <a class="promo__link" href="all-lots.php"><?= $categories[2] ?></a>
        </li>
        <li class="promo__item promo__item--clothing">
            <a class="promo__link" href="all-lots.php"><?= $categories[3] ?></a>
        </li>
        <li class="promo__item promo__item--tools">
            <a class="promo__link" href="all-lots.php"><?= $categories[4] ?></a>
        </li>
        <li class="promo__item promo__item--other">
            <a class="promo__link" href="all-lots.php"><?= $categories[5] ?></a>
        </li>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($lots as $lot): ?>
            <?= renderTemplate('templates/block.php', ['lot' => $lot])?>
        <?php endforeach; ?>
    </ul>
</section>
