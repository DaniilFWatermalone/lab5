<?php
session_start();

// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'Gratus');

if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $db->real_escape_string($_POST['loginEmail']);
    $password = $db->real_escape_string($_POST['loginPassword']);

    // Поиск пользователя в базе данных
    $query = "SELECT users_id, login, rule FROM users WHERE mail = '$email' AND password = '$password'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['login'];
        $_SESSION['role'] = $user['rule'];

        // Отправка данных обратно на клиентскую сторону
        echo json_encode(['status' => 'success', 'username' => $user['login'], 'role' => $user['rule']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Неверный логин или пароль.']);
    }
}

// Закрытие соединения
$db->close();
?>
