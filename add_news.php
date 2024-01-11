<?php
    include('tpl/header.php');
    include('tpl/footer.php');
?>
<html>
    <head>
        <title>Авторизация</title>
    </head>
</html>
<body class="body-top">
    <div class="__remarks__block">
        <!-- Начало формы авторизации, auth_user.php - это адрес обработчика, 
        то есть после нажатия а кнопку "Войти" данные из полей передаются
        обработчику auth_user.php методом "post" -->
        <form action="add_news_fn.php" method="post">
            <h2>Добавление новой новости</h2>
            <!-- В текстовое поле с именем Login пользователь вводит
            свой логин -->
            <p>
                <div class="__remarks__text">Тема новости:<br></div>
                <input class="__remarks_textarea" type="text" name="tema" size="38" maxlength="50">
            </p>
            <!-- В текстовую область (name = "text") пользователь вводит текст своего отзыва -->
            <p>
                <div class="__remarks__text">Ввведите текст новости:<br></div>
                <textarea class="__remarks_textarea" name="text" cols="38" rows="6"></textarea>
            </p>
            <p>
                <div class="__remarks__text">Ввведите расширенную информацию о новости:<br></div>
                <textarea class="__remarks_textarea" name="info" cols="38" rows="6"></textarea>
            </p>
            <p>
                <div class="__remarks__text">Ссылка на изображение:<br></div>
                <textarea class="__remarks_textarea" name="image" cols="38" rows="6"></textarea>
            </p>
            <!-- Кнопка отправляет даные на страницу-обработчик save_remarks.php -->
            <p>
                <input class="__remarks__button" type="submit" name="submit" value="Сохранить">
            </p>
        </form>
    </div>
</body>
