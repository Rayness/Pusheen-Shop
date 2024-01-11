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
    $news = '<div class = "__news">';
    $news .= '<div class = "__news_title"><h3>'.$row['Title'].'</h3></div>';
    $news .= '<div class = "__news_info">';
    $news .= '<img class = "__news_img" src = ' . $row['Image'] . ' alt="...">';
    if (isset($_SESSION['admin']) == 1) {
        $news .= '<button id="btn" type="button" class="btn btn-primary main" data-bs-toggle="modal" data-bs-target="#exampleModal">Редактировать</button>';
    }
    $news .= '<a class = "btn btn-primary __news__btn" href = "shop.php">'.'Перейти в магазин'.'</a>';
    $news .= '<p>'.$row['Information'].'</p>';
    $news .= '</div>';
    $news .= '</div>';
    ?>
<main class="flex">
    <div class="row">
        <div class="col">
            <?php echo $news; ?>
        </div>
    </div>
</main>