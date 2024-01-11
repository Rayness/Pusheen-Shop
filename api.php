<?PHP
// Подключаем файл соединения с базой данных
include("dbconnect.php");
// Выполняем нужный запрос к базе данных
// Извлекаем из базы все данные об имеющихся турах

$result = $mysqli->query("SELECT * FROM news");
// Создаем новый пустой массив
$news = [];

// Записываем все туры из таблицы БД в строки этого массива
while ($row = $result->fetch_assoc()) {
    $news[] = $row;
}
// Сохраняем данные полученного массива в текстовый файл формата JSON
header('Content-type: application/json');
echo json_encode($news);
?>