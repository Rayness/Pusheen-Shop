<?php
    session_start();
    include('tpl/header.php');
    include('tpl/footer.php');
?>
        <main class="flex">
            <div class="contact">
                <form action="feedback.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Введите ваш Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                        <label for="exampleFormControlInput1" class="form-label">Введите ваше имя</label>
                        <input class="form-control" type="text" placeholder="Например: Иван" aria-label="default input example" name="name">
                        <label for="exampleFormControlInput1" class="form-label">Введите ваш номер телефона</label>
                    <input class="form-control" type="text" placeholder="Например: +7 (999) 999 99 99" aria-label="default input example" name="number">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Комментарии</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn-success">Отправить</button>
                </form>
            </div>
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>