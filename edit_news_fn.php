<?php
    // Старт сессии
    session_start();
    include("dbconnect.php");

    /* Получаем из формы и сохраняем в соответствующих переменных введенные тему и текст отзыва */
    if (isset($_POST['tema'])) {
        $tema = $_POST['tema'];
        if ($tema == '') {
            unset($tema);
        }
    }

    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        if ($text == '') {
            unset($text);
        }
    }

    if (isset($_POST['info'])) {
        $info = $_POST['info'];
        if ($info == '') {
            unset($info);
        }
    }

    if (isset($_POST['image'])) {
        $image = $_POST['image'];
        if ($image == ''){
            unset($image);
        }
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if ($id == ''){
            unset($id);
        }
    }

    // Если пользователь не ввел тему или текст, то выдаем ошибку и останавливаем скрипт
    if (empty($tema) or empty($info) or empty($image) or empty($text)) {
        exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    } else {
        // Если тема и текст введены, то сохраняем сообщение в таблицу БД travel
        // Если не пуста переменная сессии, сохраняем ID текущего пользователя
        if (!empty($_SESSION['id'])) {
            // Сохраняем данные
            $result = $mysqli->query("UPDATE news SET Title = '$tema', Description= '$text', Information = '$info', Image = '$image' WHERE ID = $id");
            // Проверяем, нет ли ошибки
            if ($result = 'TRUE') {
                // Перенаправляем пользователя на страницу просмотра отзывов
                echo "Новость была успешно добавлена! Перейти на главную страницу. 
                <a href = 'index.php'>К новостям</a>";
            } else {
                echo "Ошибка! Новость не добавлена.";
            }
        }
    }

?>