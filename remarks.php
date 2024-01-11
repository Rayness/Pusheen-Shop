<?php
  include('tpl/header.php');
?>
<html>
    <head>
        <title>Отзывы</title>
    </head>
    <body class="body-top">
        <div class="__remarks__block">
            <form  action = "save_remarks.php" method = "post">
                <h2>Оставьте свой отзыв</h2>
                <!-- В текстовую область (name = "tema") пользоват -->
                <p>
                    <div class="__remarks__text">Тема сообщения:<br></div>
                    <textarea class="__remarks_textarea" name="tema" cols="38" rows="3"></textarea>
                </p>
                <!-- В текстовую область (name = "text") пользователь вводит текст своего отзыва -->
                <p>
                    <div class="__remarks__text">Ввведите текст сообщения:<br></div>
                    <textarea class="__remarks_textarea" name="text" cols="38" rows="6"></textarea>
                </p>
                <!-- Кнопка отправляет даные на страницу-обработчик save_remarks.php -->
                <p>
                    <input class="__remarks__button" type="submit" name="submit" value="Сохранить">
                </p>
            </form>
        </div>
    </body>
</html>