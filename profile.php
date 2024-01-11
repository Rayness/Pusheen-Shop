<?php
session_start();
include 'tpl/header.php';
include 'tpl/footer.php';
include 'dbconnect.php';


$id = ($_SESSION['id']);
$result = $mysqli->query("SELECT * FROM users WHERE ID = '$id'");
$k = 1;
  while ($row = $result->fetch_assoc()) {
    $name = $row['Name'];
    $login = $row['Login'];
    $pass = $row['Pass'];
    $address = $row['Address'];
    $avatar = $row['Avatar'];
    $admin = $row['Admin'];
    $k++;
  }


  
?>
<body>
  <main class="flex">
    <div class="__profile__conteiner">
      <form action="profile__edit.php" method="post">
        <h3>Мой профиль</h3>
        <div class="__profile__header">
            <div class="__profile__img">
                <img src="<?= $avatar ?>" alt="Аватар">
                <p>Изменить фото</p>
            </div>
            <div class="__profile__info">
                <label>Имя: <br></label><p><?= $name ?></p>
                <label>Логин: <br></label><p><?=  $login ?></p>
                <label>Пароль: <br></label><p><?=  $pass ?></p>
                <label>Адрес: <br></label><p type="password"><?=  $address ?></p>
                <button class="btn" type="submit">Редактировать</button>
            </div>
        </div>
        <div class="__profile__body">
            <div class="__profile__cart">
                <h5>Моя корзина</h5>
                <div class="cart">

                </div>
            </div>
            <div class="__profile__buy">
                <h5>Мои покупки</h5>
                <div class="">

                </div>
            </div>
        </div>
      </form>
    </div>
  </main>
</body>
