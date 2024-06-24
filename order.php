<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключение к базе данных
    $conn = new mysqli("localhost", "root", "", "Gratus");
    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Получение данных из POST запроса
    $product = $_POST['product'];
    $price = $_POST['price'];
    $delivery_date = date('Y-m-d'); // Примерная дата доставки

    // SQL запрос на добавление данных
    $sql = "INSERT INTO orders (product, price, delivery_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $product, $price, $delivery_date);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Закрытие соединения
    $stmt->close();
    $conn->close();
}
?>