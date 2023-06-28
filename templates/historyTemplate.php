<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item nav__item--current">
            <a href="all-lots.php">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.php">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.php">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.php">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.php">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.php">Разное</a>
        </li>
    </ul>
</nav>
<div class="container">
    <section class="lots">
        <h2>История просмотров</h2>
        <ul class="lots__list">
            <?php foreach ($lots as $lot): ?>
                <?= renderTemplate('templates/block.php', ['lot' => $lot])?>
            <?php endforeach; ?>
        </ul>
    </section>
    <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
        <li class="pagination-item pagination-item-active"><a>1</a></li>
        <li class="pagination-item"><a href="#">2</a></li>
        <li class="pagination-item"><a href="#">3</a></li>
        <li class="pagination-item"><a href="#">4</a></li>
        <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
</div>
