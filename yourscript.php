<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Подготавливаем и привязываем параметры
$stmt = $conn->prepare("INSERT INTO objects (name, description, price, img, id_kategory) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $description, $price, $img, $id_kategory);

// Устанавливаем параметры и выполняем
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$img = $_POST['img'];
$id_kategory = $_POST['id_kategory'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>