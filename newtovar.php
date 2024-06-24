<?php
// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'Gratus');

// Проверка подключения
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

// Добавление новой карточки товара
if (isset($_POST['submit'])) {
    $productName = $db->real_escape_string($_POST['product_name']);
    $productPrice = $db->real_escape_string($_POST['product_price']);
    // Другие поля...

    $query = "INSERT INTO products (name, price) VALUES ('$productName', '$productPrice')";
    if ($db->query($query) === TRUE) {
        $last_id = $db->insert_id;
        echo "Новый товар успешно добавлен. ID товара: $last_id";
        // Генерация HTML-объекта
        echo "<div id='product_$last_id'>";
        echo "<h3>$productName</h3>";
        echo "<p>Цена: $productPrice</p>";
        // Другие поля...
        echo "</div>";
    } else {
        echo "Ошибка: " . $query . "<br>" . $db->error;
    }
}

$db->close();
?>
