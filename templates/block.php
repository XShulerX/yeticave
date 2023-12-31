<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?= $lot['Photo'] ?>" width="350" height="260" alt="Сноуборд">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?= $lot['Category'] ?></span>
        <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $lot['id'] ?>"><?= $lot['Title'] ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= number_format($lot['FirstPrice'],0,'.',' ') ?><b class="rub">р</b></span>
            </div>
            <div class="lot__timer timer">
                <?= timer() ?>
            </div>
        </div>
    </div>
</li>