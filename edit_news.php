<?php
    include('tpl/header.php');
    include('tpl/footer.php');
    include('dbconnect.php');

    $label = 'id';
    $id = false;
    if (!empty($_GET[$label])) {
        $id = $_GET[$label];
    }

    $result = $mysqli->query("SELECT * FROM news WHERE ID = '$id'");
    $row = $result->fetch_assoc();
    $title = $row['Title'];
    $description = $row['Description'];
    $info = $row['Information'];
    $image = $row['Image'];
    $form = '<div>'.$row['Title'].'</div>';
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
        <form action="edit_news_fn.php" method="post">
            <h2>Изменить новость</h2>
            <!-- В текстовое поле с именем Login пользователь вводит
            свой логин -->
            <input type='hidden' name='id' value='<?php echo $id ?>' />
            <p>
                <div class="__remarks__text">Тема новости:<?php $id ?><br></div>
                <input class="__remarks_textarea" type="text" name="tema" size="38" maxlength="50" value="<?php echo $title ?>">
            </p>
            <!-- В текстовую область (name = "text") пользователь вводит текст своего отзыва -->
            <p>
                <div class="__remarks__text">Ввведите текст новости:<br></div>
                <textarea class="__remarks_textarea" name="text" cols="38" rows="6"><?php echo $description ?></textarea>
            </p>
            <p>
                <div class="__remarks__text">Ввведите расширенную информацию о новости:<br></div>
                <textarea class="__remarks_textarea" name="info" cols="38" rows="6"><?php echo $info ?></textarea>
            </p>
            <p>
                <div class="__remarks__text">Ссылка на изображение:<br></div>
                <textarea class="__remarks_textarea" name="image" cols="38" rows="6"><?php echo $image ?></textarea>
            </p>
            <!-- Кнопка отправляет даные на страницу-обработчик save_remarks.php -->
            <p>
                <input class="__remarks__button" type="submit" name="submit" value="Сохранить">
            </p>
        </form>
        <form action="delete_post.php" method="post">
                <p>
                    <input type="hidden" name="id" value='<?php echo $id ?>'>
                    <input class="__remarks__button" type="submit" name="delete" value="Удалить новость">
                </p>
        </form>
    </div>
</body>
