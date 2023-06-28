<main>
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
    <form class="form container <?= count($errors) ? 'form--invalid' : '' ?>" action="" enctype="multipart/form-data" method="post"> <!-- form--invalid -->
        <h2>Регистрация нового аккаунта</h2>
        <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : '' ?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input value="<?= $_POST['email'] ?? ''?>" id="email" type="text" name="email" placeholder="Введите e-mail" required>
            <span class="form__error"><?= $errors['email'] ?? '' ?></span>
        </div>
        <div class="form__item <?= isset($errors['password']) ? 'form__item--invalid' : '' ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль" required>
            <span class="form__error"><?= $errors['password'] ?? '' ?></span>
        </div>
        <div class="form__item <?= isset($errors['name']) ? 'form__item--invalid' : '' ?>">
            <label for="name">Имя*</label>
            <input value="<?= $_POST['name'] ?? ''?>" id="name" type="text" name="name" placeholder="Введите имя" required>
            <span class="form__error"><?= $errors['name'] ?? '' ?></span>
        </div>
        <div class="form__item <?= isset($errors['message']) ? 'form__item--invalid' : '' ?>">
            <label for="message">Контактные данные*</label>
            <textarea id="message" name="message" placeholder="Напишите как с вами связаться" required><?= $_POST['message'] ?? ''?></textarea>
            <span class="form__error"><?= $errors['message'] ?? '' ?></span>
        </div>
        <div class="form__item form__item--file form__item--last">
            <label>Аватар</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" name="photo" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Зарегистрироваться</button>
        <a class="text-link" href="login.php">Уже есть аккаунт</a>
    </form>
</main>