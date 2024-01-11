<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сайт кота Пушина</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src = "https://unpkg.com/react@l6/umd/react.development.js"></script>
    <script src = "https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <script src = "https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

  </head>
  <body class="body-top">
    <header class="header">
      <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/852f0a58250393.59f53997b77ab.gif" alt="Bootstrap"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <?php
                if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) 
                {
                ?>
                <li class="nav-item">
                  <a class="nav-link"aria-current="page" href="profile.php">Мой профиль</a>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Главная</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Наши товары</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Контакты</a>
                </li>
                <?php
                /* Если пользователь не авторизован на сайте, его переменные сессии (их мы создадим позже) пока пусты, нужно
                вывести ссылки на регистрацию и авторизацию */
                if (empty($_SESSION['login']) or empty($_SESSION['id']))
                {
                ?>
                <div class="auth_block">
                  <li class="nav-item auth__text" id="link_register">
                    <a class="nav-link" href="reg.php">Регистрация</a>
                  </li>
                  <li class="nav-item auth__text" id="link_auth">
                    <a class="nav-link" href="auth.php">Авторизация</a>
                  </li>
                  <?php
                  }
                  else
                  {
                  ?>
                  <li class="nav-item auth__text" id="link_remark">
                    <a href="remarks.php">Оставить отзыв</a>
                  </li>
                  <li class="nav-item auth__text" id="link_exit">
                    <a href="exit.php">Выход</a>
                  </li>
                  <?php
                  }
                  ?>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>