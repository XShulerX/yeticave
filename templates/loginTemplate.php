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
<form class="form container <?= $formInvalid?>" action="" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : '' ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" value="<?= $_POST['email'] ?? ''?>" type="text" name="email" placeholder="Введите e-mail" required>
      <span class="form__error"><?= $errors['email'] ?? '' ?></span>
    </div>
    <div class="form__item form__item--last <?= isset($errors['password']) ? 'form__item--invalid' : ''?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" required>
      <span class="form__error"><?= $errors['password'] ?? '' ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>