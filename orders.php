<?php

// order.php - PHP скрипт для обработки заказа
session_start();
print_r($_SESSION);
 // Убедитесь, что сессия начата

if (isset($_POST['submit']) && isset($_SESSION['username'])) {
    // Подключение к базе данных
    $conn = new mysqli('localhost', 'root', '', 'Gratus');

    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Получение данных из формы и сессии
    $username = $_SESSION['username']; // Логин пользователя из сессии
    $product = $_POST['product'];
    $price = $_POST['price'];
    $id_kategory = $_POST['id_kategory'];
    $status = 'ожидание';
    $delivery_date = date('Y-m-d', strtotime('+7 days'));

    // Подготовка SQL запроса
    $stmt = $conn->prepare("INSERT INTO orders (username, product, price, delivery_date, status, id_kategory) VALUES ( ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsss", $username, $product, $price, $delivery_date, $status, $id_kategory);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Заказ успешно добавлен";
    } else {
        echo "Ошибка при добавлении заказа: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Необходимо войти в систему или отправить форму.";
}

?>
