<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gratus";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL запрос для получения данных
$sql = "SELECT name, description, price FROM objects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Вывод данных каждой строки
  while($row = $result->fetch_assoc()) {
    echo '<div class="katalog-cards">';
    echo '<img class="img-product" src="main/pngwing 1.png">'; // Здесь можно использовать поле из БД для пути к изображению
    echo '<h1 class="katalog-cards-h1">' . $row["name"] . '</h1>';
    echo '<a href="tovar.php" class="katalog-cards-p">' . $row["price"] . ' РУБ</a>';
    echo '</div>';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
