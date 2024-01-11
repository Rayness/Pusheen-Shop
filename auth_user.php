<?php
// Обязательно запускаем сессию!
session_start();
//Сохраняем введенные пользователем логин и пароль в переменные $Login и $pass
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == "") {
        unset($login);
    }
}

if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
    if ($pass == "") {
        unset($pass);
    }
}

//Если пользователь не ввёл логин или пароль, то выдаем ошибку и останавливаем скрипт
if (empty($login) or empty($pass)) {
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

//Подключаемся к базе
include("dbconnect.php");
//Извлекаем из базы все данные о пользователе с введенным логином
$result = $mysqli->query("SELECT * FROM users WHERE login = '$login'");
//Помещаем эти данные в ассациативный массив
$myrow = $result->fetch_assoc();
//Проверяем, существует ли пользователь с таким логином
if (empty($myrow['Login'])) {
    exit('Введенный вами логин или пароль неверный.');
} else {
    //Если пользователь в базе существует, то сверяем пароли
    if ($myrow['Pass'] == $pass) {
        /* Если пароли совпадают, то запускаем пользователю сессию. Это означает,
        что в специальных сессионных переменных сохраняются важные сведения
        об этом пользователе, в данном случае - ID и логин */
        $_SESSION['login'] = $myrow['Login'];
        $_SESSION['id'] = $myrow['ID'];
        $_SESSION['admin'] = $myrow['Admin'];
        //Вводятся соответствующие сообщения пользователю
        header('Location: index.php');
    } else {
        //Если пароли не сошлись
        exit ("Введенный вами логин или пароль неверный.");
    }
}
?>