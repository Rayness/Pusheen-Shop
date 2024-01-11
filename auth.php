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
        <form action="auth_user.php" method="post">
            <h2>Авторизация</h2>
            <!-- В текстовое поле с именем Login пользователь вводит
            свой логин -->
            <p>
                <div>Ваш логин: <br></div>
                <input class="__remarks_textarea" type="text" name="login" size="15" maxlength="15">
            </p>
            <!-- В поле для паролей с именем pass пользователь вводит свой пароль -->
            <p>
                <div>Ваш пароль: <br></div>
                <input class="__remarks_textarea" type="password" name="pass" size="15" maxlength="15">
            </p>
            <!-- Кнопка (type = "submit") отправляет данные обработчику test_user.php -->
            <p>
                <input class="__remarks__button" type="submit" name="submit" value="Войти">
            </p>
        </form>
    </div>
</body>
