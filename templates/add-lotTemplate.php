<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item">
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
<form class="form form--add-lot container <?= $formInvalid ?>" enctype="multipart/form-data" action="add-lot.php" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= isset($errors['lot-name']) ? 'form__item--invalid' : ''?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input value="<?= $_POST['lot-name'] ?? ''; ?>" id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
            <span class="form__error"><?= $errors['lot-name'] ?? '' ?></span>
        </div>
        <div class="form__item <?= isset($errors['category']) ? 'form__item--invalid' : ''?>">
            <label for="category">Категория</label>
            <select id="category" name="category" required>
                <option value="">Выберите категорию</option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error"><?= $errors['category'] ?? '' ?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= isset($errors['message']) ? 'form__item--invalid' : ''?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" required><?= $_POST['message'] ?? ''; ?></textarea>
        <span class="form__error"><?= $errors['message'] ?? '' ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input name="photo" class="visually-hidden" type="file"  id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= isset($errors['lot-rate']) ? 'form__item--invalid' : ''?>">
            <label for="lot-rate">Начальная цена</label>
            <input value="<?= $_POST['lot-rate'] ?? ''; ?>" id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
            <span class="form__error"><?= $errors['lot-rate'] ?? '' ?></span>
        </div>
        <div class="form__item form__item--small <?= isset($errors['lot-step']) ? 'form__item--invalid' : ''?>">
            <label for="lot-step">Шаг ставки</label>
            <input value="<?= $_POST['lot-step'] ?? ''; ?>" id="lot-step" type="number" name="lot-step" placeholder="0" required>
            <span class="form__error"><?= $errors['lot-step'] ?? '' ?></span>
        </div>
        <div class="form__item <?= isset($errors['lot-date']) ? 'form__item--invalid' : ''?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input value="<?= $_POST['lot-date'] ?? ''; ?>" class="form__input-date" id="lot-date" type="date" name="lot-date" required>
            <span class="form__error"><?= $errors['lot-date'] ?? '' ?></span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
