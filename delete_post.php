<?php 
    // Старт сессии
    session_start();
    include("dbconnect.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if ($id == ''){
            unset($id);
        }
    }

    if (!empty($_SESSION['id'])) {
        // Сохраняем данные
        $result = $mysqli->query("DELETE FROM news WHERE ID = $id");
        // Проверяем, нет ли ошибки
        if ($result = 'TRUE') {
            // Перенаправляем пользователя на страницу просмотра отзывов
            echo "Запись была удалена. 
            <a href = 'index.php'>К новостям</a>";
        } else {
            echo "Ошибка! Запись не удалена.";
        }
    }
?>