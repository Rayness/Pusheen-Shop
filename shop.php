<?php
  session_start();
  include('tpl/header.php');
  include('tpl/footer.php');
  // Подключаем базу данных
  include("dbconnect.php");

  // Получаем все строки, которые есть в таблице remarks
  $result = $mysqli->query("SELECT * FROM produtcs");
  $k = 1;
  while ($row = $result->fetch_assoc()) {
    $card .= '<div class="card" style="width: 18rem;" id="card-1">';
    $card .= '<div class="price" id="price-'.$row['ID'].'">'.$row['Price'].'</div>';
    $card .= '<img id="card-'.$row['ID'].'-img" src='.$row['Image'].' class="card-img-top" alt="...">';
    $card .= '<div class="card-body">';
    $card .= '<h5 id="card-'.$row['ID'].'-name" class="card-title">'.$row['Name'].'</h5>';
    $card .= '<p class="card-text">'.$row['Description'].'</p>';
    $card .= '<button id="btn" type="button" class="btn btn-primary main" data-bs-toggle="modal" data-bs-target="#exampleModal">'.'Подробнее'.'</button>';
    $card .= '</div>';
    $card .= '</div>';
    $k++;
  }

  // Получаем все строки, которые есть в таблице remarks
  $result = $mysqli->query("SELECT * FROM remarks");
  // Начинаем строить таблицу, присваивая ей имя $table
  $div = '<div class="remark">';
  // Начинаем вести счетчик отзывов (строк в таблице)
  $k = 1;
  // Начинаем цикт, позволяющий вывести все отзывы из таблицы remarks
  while ($myrow = $result->fetch_assoc()) {
      $div .= "<div class='container text-center remarks__container'>";
      $div .= "<div class='row remarks__row'>";
      $div .= "<div class='col remarks__col'>".$myrow['tema']."</div>";
      $div .= "<div class='col remarks__col'>".$myrow['text']."</div>";
      $div .= "</div>";
      $div .= "</div>";
      $k++;
  }
  // Закрываем таблицу
  $div .= "</div>";

  //ALTER TABLE `users` ADD `ID_product` INT NOT NULL AFTER `Admin`; Добавление нового параметра в бд
  //ALTER TABLE `users` DROP `ID_product`;"
?>
<body>
  <main class="flex">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="get" action="#" id="orderForm">
              <div class="product">
                <img id="info-img" src="#pImage" class="img-fluid rounded-top" alt="изображение товара">
                <div class="information">
                  <p id="info">Информация</p>
                  <div class="info">
                    <p>Основная информация о товаре</p>
                  </div>
                  <div class="item-col">
                    <label for="">Количество</label>
                    <select id="inp1">
                      <option value="0" selected disabled>0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="final-price-block">
                    <label for="">Итого: </label>
                    <div class="price" id="price-mod">Написать цену</div>
                    <label id="total" for="number">Итоговая стоимость</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary buy" class="btn1" onclick="">Купить</button>
          </div>
        </div>
      </div>
    </div>

    

    <div class="shop"> <!-- Блок с карточками товаров -->
      <div class="cards">
        <?php
          echo $card;
        ?>
      </div>
      <div class="remarks__block">
              <div class="remarks__name">
                  <h3>Отзывы</h3>
              </div>
              <div class="remarks_content">
              <?php
                echo $div;
              ?>
              </div>
          </div>
    </div>
  </main> 
  <script>
    $(function(){
      $('.main').bind('click', function(){
        var par = $(this).parent().parent();
        total = 0;

        par.each(function(index, elem) {
          var name = $(elem).children(".card-body").children("h5").text();
          $("#exampleModalLabel").text(name);

          var img = $(elem).children("img").attr("src");
          $("#info-img").attr("src", img);

          var description = $(elem).children(".card-body").children("p").text();
          $("div[class='info'] > p").text(description);

          var price = $(elem).children(".price").text();
          $("#price-mod").text(price);
        })
        
      });

      $('select').bind('click', function() {
        let kol = $('#inp1').val();
        price = $("#price-mod").text();
        total = kol * price;
        $("#total").text(total);
      })

      $('.close').click(function() {
        location.reload();
      })

      $('.buy').click(function() {
        console.log(total)
        if ((total === null) || (total === 0)){
          alert("Не выбрано количество товара");
        } else {
          alert("Поздравляем с приобретением! Вы приобрели товары стоимостью: " + total + "₽." + " Заказ будет доставлен на указанный в профиле адрес!");
          location.reload();
        }
        
      })

    });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>