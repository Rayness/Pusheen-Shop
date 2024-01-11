<?php
    // Старт сессии
    session_start();

    /* Получаем из формы и сохраняем в соответствующих переменных введенные тему и текст отзыва */
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if ($email == '') {
            unset($email);
        }
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        if ($name == '') {
            unset($name);
        }
    }

    if (isset($_POST['number'])) {
        $number = $_POST['number'];
        if ($number == '') {
            unset($number);
        }
    }

    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
        if ($comment == '') {
            unset($comment);
        }
    }

    // Если пользователь не ввел тему или текст, то выдаем ошибку и останавливаем скрипт
    if (empty($email) or empty($name) or empty($number) or empty($comment)) {
        exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    } else {
        // Если тема и текст введены, то сохраняем сообщение в таблицу БД travel
        // Подключаемся к базе
        include("dbconnect.php");
        // Если не пуста переменная сессии, сохраняем ID текущего пользователя
            // Сохраняем данные
            $result = $mysqli->query("INSERT INTO feedback (email, name, number, comment) VALUES(''$email', '$name','$number', '$comment')");
            // Проверяем, нет ли ошибки
            if ($result = 'TRUE') {
                // Перенаправляем пользователя на страницу просмотра отзывов
                echo "Ваше сообщение сохранено! Перейти на главную страницу. 
                <a href = 'index.php'>На главную</a>";
            } else {
                echo "Ошибка! Сообщение не сохранено.";
            }
        }

?>