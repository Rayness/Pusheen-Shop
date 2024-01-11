<?php
    include('tpl/header.php');
    include('tpl/footer.php');
?>
<html>
    <head>
        <title>Регистрация</title>        
    </head>
</html>
<body class="body-top">
    <!-- Начало формы регистрации, save_user.php - это адрес обработчика, то есть после нажатия на кнопку
    "Зарегистрироваться" данные из полей будут переданы файлу save_user.php методом "post" -->
    <div class="__remarks__block">
        <form action="save_user.php" method="post">
            <h2>Регистрация</h2>
            <!-- В текстовом поле с именем name пользователь вводит свое имя -->
            <p>
                <label>Ваше имя:<br></label>
                <input class = "__remarks_textarea" type="text" name="name" size="15" maxlength="15">
            </p>
            <!-- В поле с именем login пользователь вводит свой логин -->
            <p>
                <label>Ваш логин:<br></label>
                <input class = "__remarks_textarea" type="text" name="login" size="15" maxlength="15">
            </p>
            <!-- В поле для паролей с именем pass пользователь вводит свой пароль -->
            <p>
                <label>Ваш пароль:<br></label>
                <input class = "__remarks_textarea" type="password" name="pass" size="15" maxlength="15">
            </p>
            <!-- В поле для ввода адреса, пользователь вводит свой домашний адрес -->
            <p>
                <label>Ваш адрес:<br></label>
                <input class = "__remarks_textarea" type="text" name="address" size="15" maxlength="15">
            </p>
            <!-- Кнопкой (type = 'submit') пользователь сможет отправлять данные на обработку файлу save_user.php -->
            <p>
                <input class = "__remarks__button" type="submit" name="submit" value="Зарегистрироваться">
            </p>
        </form>    
    </div>
</body>