

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./main/main.css" />
		<script src="main/jquery-3.7.1.min.js"></script>
		<title>GRATUS</title>
	</head>
	<body>
		<header>
			<div class="header-menu">
				<a href="index.php" class="header-link2"><img class="logo" src="./main/gratus-logo1 1 (1).png" alt="" /></a>
				<nav class="header-nav">
					<ul class="header-list">
						<a href="onas.html" class="header-link">О НАС</a>
						<a href="katalog.html" class="header-link">КАТАЛОГ</a>
						<a href="kontakti.html" class="header-link">КОНТАКТЫ</a>
						<a href="akcii.html" class="header-link">АКЦИИ</a>
                        <a class="header-link2"><img id="login-btn" class="logo" src="./main/Group 40.png" alt="" /></a>
					</ul>
				</nav>
			</div>
		</header>
    <?php
session_start();

// Код для кнопки выхода
if (isset($_POST['logout'])) {
    // Уничтожаем все данные сессии
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy(); // Уничтожаем сессию
    header('Location: index.php'); // Перенаправляем на страницу входа
    exit;
}
?>

<form method="post">
    <input type="submit" name="logout" value="Выйти из аккаунта"/>
</form>

		<section id="reg-popup" class="popup">
            <div class="popup-1">
                <div class="popup-text-container">
                <h1 class="text-popup">РЕГИСТРАЦИЯ</h1>
                <a onclick="Close()" id="popup-close-1" class="popup-close">&#10006;</a>
            </div>
                <input placeholder="ВАШ ЛОГИН" class="input-popup" type="text">
                <input placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-popup" type="text">
                <input placeholder="НОМЕР ТЕЛЕФОНА" class="input-popup" type="text">
                <input placeholder="ПАРОЛЬ" class="input-popup" type="text">
                <input placeholder="ПОВТОРИТЕ ПАРОЛЬ" class="input-popup" type="text">
                <a class="popup-button" href="lk.html">ЗАРЕГИСТРИРОВАТЬСЯ</a>
                <a id="popup-vhod" class="popup-subtitle">У меня уже есть аккаунт</a>
        </div>
        </section>

		<section id="login-popup" class="popup">
            <div class="popup-1">
                <div class="popup-text-container">
                <h1 class="text-popup">АВТОРИЗАЦИЯ</h1>
                <a onclick="Close()" id="popup-close" class="popup-close">&#10006;</a>
            </div>
                <input placeholder="ВАШ ЛОГИН" class="input-popup" type="text">
                <input placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-popup" type="text">
                <a class="popup-button" href="lk.html">ВОЙТИ</a>
                <a id="popup-reg" class="popup-subtitle">У меня уже нет аккаунта</a>
        </div>
        </section>
		<!-- <section class="buy-container">
			<div class="buy-curt-container">
				<a id="cart" class="buy-curt">&#10084;</a>
			</div>
		</section> -->
<section class="navigation-container">
    <div class="nav-vlock">
    <img src="main/Vector 17.png" class="navigation-img">
    <h1 class="navigation-text">ЛИЧНЫЙ КАБИНЕТ</h1>
</div>
</section>
		<section class="katalog-text-container">
            <img class="lk-img" src="main/Group 53.png" alt="">
            <p class="subtitle-1">
    <?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
    exit;
}

echo "Добро пожаловать, " . $_SESSION['username'];

// Проверка роли пользователя
if ($_SESSION['role'] == 'admin') {
    echo " - Вы администратор.";
} else {
    echo " - Вы пользователь.";
}

    ?>
			<h1 class="katalog-h1">Ваши Заказы</h1>
			</div>
            <?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "Gratus");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming $username contains the logged-in user's username
$username = $_SESSION['username']; // Или другой способ получения имени пользователя

// SQL query to retrieve data with a JOIN to get the category name
$sql = "SELECT o.status, o.order_number, o.product, o.price, o.delivery_date, c.name AS kategory_name 
        FROM orders o 
        INNER JOIN kategory c ON o.id_kategory = c.id_kategory
        WHERE o.username = ?";

if ($stmt = $mysqli->prepare($sql)) {
    // Bind the username to the prepared statement
    $stmt->bind_param("s", $username);

    // Execute the query
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if there are results
    if ($stmt->num_rows > 0) {
        // Bind the result variables
        $stmt->bind_result($status, $order_number, $product, $price, $delivery_date, $kategory_name);

        // Output data of each row
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr><th>№ Заказа</th><th>Товар</th><th>Цена</th><th>Дата Доставки</th><th>Статус</th><th>Категория</th>";
        while ($stmt->fetch()) {
            echo "<tr><td>" . $order_number . "</td><td>" . $product . "</td><td>" . $price . "</td><td>" . $delivery_date . "</td><td>" . $status . "</td><td>" . $kategory_name . "</td>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "У вас нет активных заказов.";
    }

    // Close statement
    $stmt->close();
} else {
    echo "Ошибка: " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>



            </div>
	</section>
<?php
session_start();

// Проверка, что пользователь вошел в систему и является администратором
if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
    // Пользователь является администратором, отображаем форму
    ?>
        <?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'Gratus');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Изменение данных
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $id_kategory = $_POST['id_kategory'];
    $query = "UPDATE `objects` SET `id`='$id', `name`='$name', `price`='$price', `description`='$description', `img`='$img', `id_kategory`='$id_kategory' WHERE `id`='$id'";
    mysqli_query($connect, $query);
}

// Удаление данных
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM `objects` WHERE `id`='$id'";
    mysqli_query($connect, $query);
}

// Получение данных для отображения
$result = mysqli_query($connect, "SELECT * FROM `objects`");
$models = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <h1>Управление товарами</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>img</th>
            <th>Kategory</th>
        </tr>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model['id'] ?></td>
            <td><?= $model['name'] ?></td>
            <td><?= $model['price'] ?></td>
            <td><?= $model['description'] ?></td>
            <td><?= $model['img'] ?></td>
            <td><?= $model['id_kategory'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $model['id'] ?>">
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Изменить данные товара</h2>
    <form method="post">
        ID id: <input type="number" name="id">
        ID name: <input type="text" name="name">
        price: <input type="number" name="price">
        description: <input type="text" name="description">
        img: <input type="file" name="img">
        Kategory: <input type="text" name="id_kategory">
        <input type="submit" name="update" value="Изменить">
    </form>
    <form class="hid" action="yourscript.php" method="post">
      NAME:<br>
      <input type="text" name="name">
      <br>
      DESCRIPT:<br>
      <input type="text" name="description">
      <br>
      PRICE:<br>
      <input type="text" name="price">
      <br><br>
      IMG:<br>
      <input type="text" name="img">
      <br><br>
      KATEGORY:<br>
      <input type="text" name="id_kategory">
      <br><br>
      <input type="submit" value="Submit">
    </form>
    <?php
// Предполагается, что $conn - это подключение к вашей базе данных
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM products";
$result = $conn->query($query);

echo "<h1>Запрос №1</h1>";
echo "<table border='1'>";
echo "<th><th>Название</th><th>Дата Производства</th><th>Когда испортится</th></th>";

if ($result->num_rows > 0) {
  // Вывод данных каждого ряда
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id_products"] . "</td><td>" . $row["name"] . "</td><td>" . $row["created_date"] . "</td><td>" . $row["dead_date"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='4'>Продукты не найдены</td></tr>";
}
echo "</table>";

$conn->close();
?>

<?php
// Предполагается, что $conn - это подключение к вашей базе данных
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM kategory";
$result = $conn->query($query);

echo "<h1>Запрос №2</h1>";
echo "<table border='1'>";
echo "<tr><th>ID категории</th><th>Название</th></tr>";

if ($result->num_rows > 0) {
  // Вывод данных каждого ряда
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id_kategory"] . "</td><td>" . $row["name"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='2'>Категории не найдены</td></tr>";
}
echo "</table>";

$conn->close();
?>

<?php
// Предполагается, что $conn - это подключение к вашей базе данных
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM postavshiki";
$result = $conn->query($query);

echo "<h1>Запрос №3</h1>";
echo "<table border='1'>";
echo "<tr><th>ID поставщика</th><th>Название</th></tr>";

if ($result->num_rows > 0) {
  // Вывод данных каждого ряда
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id_postavshik"] . "</td><td>" . $row["name"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='2'>Поставщики не найдены</td></tr>";
}
echo "</table>";

$conn->close();
?>

<?php
// Предполагается, что $conn - это подключение к вашей базе данных
// Предполагается, что $conn - это подключение к вашей базе данных
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM users WHERE rule = 'user'";
$result = $conn->query($query);

echo "<h1>Запрос №4</h1>";
echo "<table border='1'>";
echo "<tr><th>ID пользователя</th><th>Логин</th><th>Email</th><th>Телефон</th><th>Пароль</th><th>Роль</th></tr>";

if ($result->num_rows > 0) {
  // Вывод данных каждого ряда
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["users_id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["mail"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["password"] . "</td><td>" . $row["rule"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='6'>Клиенты не найдены</td></tr>";
}
echo "</table>";

$conn->close();
?>

<?php
// Предполагается, что $conn - это подключение к вашей базе данных
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM products WHERE id_kategory = 2";
$result = $conn->query($query);

echo "<h1>Запрос №6</h1>";
echo "<table border='1'>";
echo "<tr><th>ID продукта</th><th>Название</th><th>ID поставщика</th><th>Дата создания</th><th>ID категории</th><th>Срок годности</th></tr>";

if ($result->num_rows > 0) {
  // Вывод данных каждого ряда
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id_products"] . "</td><td>" . $row["name"] . "</td><td>" . $row["id_postavshik"] . "</td><td>" . $row["created_date"] . "</td><td>" . $row["id_kategory"] . "</td><td>" . $row["dead_date"] . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='6'>Продукты не найдены</td></tr>";
}
echo "</table>";

$conn->close();
?>
<?php
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // начало таблицы
  echo "<h1>Запрос №5</h1>";
  echo "<table><tr><th>Order Number</th><th>Product</th><th>Price</th><th>Delivery Date</th><th>Status</th><th>Username</th></tr>";
  // вывод данных каждой строки
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["order_number"]."</td><td>".$row["product"]."</td><td>".$row["price"]."</td><td>".$row["delivery_date"]."</td><td>".$row["status"]."</td><td>".$row["username"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
<?php
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";
$user_name = "daniil"; // имя пользователя для фильтрации

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // начало таблицы
  echo "<h1>Запрос №7</h1>";
  echo "<table><tr><th>Order Number</th><th>Product</th><th>Price</th><th>Delivery Date</th><th>Status</th><th>Username</th></tr>";
  // вывод данных каждой строки
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["order_number"]."</td><td>".$row["product"]."</td><td>".$row["price"]."</td><td>".$row["delivery_date"]."</td><td>".$row["status"]."</td><td>".$row["username"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$stmt->close();
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL запрос для выбора продуктов с истекающим сроком годности
$sql = "SELECT * FROM products WHERE dead_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // начало таблицы
  echo "<h1>Запрос №9</h1>";
  echo "<table><tr><th>ID</th><th>Название</th><th>Айди Поставщик</th><th>Дата изготовления</th><th>Айди Катетгории</th><th>Когда испортится</th></tr>";
  // вывод данных каждой строки
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id_products"]."</td><td>".$row["name"]."</td><td>".$row["id_postavshik"]."</td><td>".$row["created_date"]."</td><td>".$row["id_kategory"]."</td><td>".$row["dead_date"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$stmt->close();
$conn->close();
?>
<?php
$servername = "localhost";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "Gratus"; // замените на имя вашей базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL запрос для выбора уникальных поставщиков с продуктами, срок годности которых истекает в ближайшие 3 дня
$sql = "SELECT DISTINCT p.id_postavshik, s.name FROM products p JOIN postavshiki s ON p.id_postavshik = s.id_postavshik WHERE p.dead_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)";
$stmt = $conn->prepare($sql);

// Проверяем успешность подготовки запроса
if ($stmt === false) {
  die("Error preparing the statement: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Выводим результаты
  echo "<h1>Запрос №10</h1>";
  while($row = $result->fetch_assoc()) {
    echo "ID поставщика: " . $row["id_postavshik"] . "<br> - Имя: " . $row["name"] . "<br>";
  }
} else {
  echo "Нет продуктов с истекающим сроком годности в ближайшие 3 дня.";
}

$stmt->close();
$conn->close();
?>


    <?php
    
} else {
    // Пользователь не является администратором, отображаем сообщение об ошибке
    echo 'Доступ запрещен. Вы должны войти как администратор.';
}
?>
<?php
// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlQuery = $_POST['sqlQuery'];
    // TODO: Добавьте здесь код для выполнения запроса к базе данных
}
?>

	</body>
	<script src="script.js"></script>
  <script src="file.js"></script>
	<script src="main/slider.js"></script>
	<footer class="footer-container">
		<div class="header-menu1">
			<a href="index.html" class="header-link2"><img class="logo" src="./main/gratus-logo1 1 (1).png" alt="" /></a>
			<nav class="header-nav">
				<ul class="header-list1">
					<a href="onas.html" class="header-link1">О НАС</a>
					<a href="katalog.html" class="header-link1">КАТАЛОГ</a>
					<a href="kontakti.html" class="header-link1">КОНТАКТЫ</a>
					<a href="akcii.html" class="header-link1">АКЦИИ</a>
				</ul>
			</nav>
		</div>
		<ul class="header-list3">
			<a href="index.html" class="header-link3"><img class="logo" src="./main/pngwing.com (46).png" alt="" /></a>
			<a href="index.html" class="header-link3"><img class="logo" src="./main/pngwing.com (47).png" alt="" /></a>
			<a href="index.html" class="header-link3"><img class="logo" src="./main/pngwing.com (48).png" alt="" /></a>
		</ul>
	</footer>
</html>

