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

// Получаем данные из формы
$user_login = $_POST['login'];
$user_email = $_POST['email'];
$user_message = $_POST['message'];

// Подготавливаем и выполняем запрос к базе данных
$stmt = $conn->prepare("INSERT INTO contacts (username, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user_login, $user_email, $user_message);

$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>