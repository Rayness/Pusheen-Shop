<?php
session_start();
include 'tpl/header.php';
include 'tpl/footer.php';
include 'dbconnect.php';

$result = $mysqli->query('SELECT * FROM news');
$k = 1;
  while ($row = $result->fetch_assoc()) {
    $id = $row['ID'];
    $card = '<div class="card mb-3">';
    $card .= '<img src="' . $row['Image'] . '" class="card-img-top" alt="...">';
    $card .= '<div class="card-body">';
    $card .= '<h5 class="card-title"><a href="info.php?id='.$id.'">' . $row['Title'] . '</a></h5>';
    $card .= '<p class="card-text">' . $row['Description'] . '</p>';
    if ($_SESSION['admin'] == 1) {
      $card .= '<a href = "edit_news.php?id='.$id.'">Редактировать</a>';
    }
    $card .= '</div>';
    $card .= '</div>';
    if ($k % 2 == 1) {
      $left_column .= $card;
    } else {
      $right_column .= $card;
    }
    $k++;
  }
?>
<body>
  <main class="flex">
    <div class="news">
      <div class="news_title">
        <h3>Новости</h3>
        <?php
        if ($_SESSION['admin'] == 1 )
        {
          ?>
          <div class="__add__news">
            <a href = 'add_news.php'>Добавить новость</a>
          </div>
          <?php
        }
        ?>
      </div>
      <div class="row">
        <div class="col">
          <?php echo $left_column; ?>
        </div>
        <div class="col">
          <?php echo $right_column; ?>
        </div>
      </div>
    </div>
  </main>
</body>
