<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./main/main.css" />
		<script src="main/jquery-3.7.1.min.js"></script>
		<script src="main/main.js"></script>
		<title>GRATUS</title>
	</head>
	<body>
		<header>
			<div class="header-menu">
				<a href="index.php" class="header-link2"><img class="logo" src="./main/gratus-logo1 1 (1).png" alt="" /></a>
				<nav class="header-nav">
					<ul class="header-list">
						<a href="onas.html" class="header-link">О НАС</a>
						<a href="katalog.php" class="header-link">КАТАЛОГ</a>
						<a href="kontakti.php" class="header-link">КОНТАКТЫ</a>
						<a href="akcii.html" class="header-link">АКЦИИ</a>
                        <a href="index.html" class="header-link2"><img class="logo" src="./main/Group 40.png" alt="" /></a>
                        <a class="burger-link"><img id="Burger-btn" class="logo" src="./main/Group 74.png" alt="" /></a>
                    </ul>
				</nav>
			</div>
		</header>
        <section class="burger-container">
            <div id="burger-menu" class="burger-list">
                <a id="burger-close" class="popup-close">&#10006;</a>
                <a class="burger-a" href="index.php">ГЛАВНАЯ</a>
                <a class="burger-a" href="onas.html">О НАС</a>
                <a class="burger-a" href="katalog.html">КАТАЛОГ</a>
                <a class="burger-a" href="kontakti.php">КОНТАКТЫ</a>
                <a class="burger-a" href="akcii.html">АКЦИИ</a>
                <a class="burger-a" href="prtnery.html">ПАРТНЕРЫ</a>
            </div>
        </section>
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
<section class="navigation-container">
    <div class="nav-vlock">
    <h1 class="navigation-text">ГЛАВНАЯ</h1>
    <img src="main/Vector 17.png" class="navigation-img">
    <h1 class="navigation-text">КАТАЛОГ</h1>
</div>
</section>
<section class="katalog-text-container">
<div class="katalog-h1-section">
<h1 class="katalog-h1">ПОПУЛЯРНОЕ</h1>
</div>
<div class="katalog-abv">
                    </div>
                    <?php
// Здесь ваш код подключения к базе данных
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
$sql = "SELECT name, img, price FROM objects"; // Убедитесь, что у вас есть поля name, image, и price
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Вывод данных каждой строки
  while($row = $result->fetch_assoc()) {
    echo '<div class="katalog-cards">';
    echo '<img class="img-product" src="main/' . $row["img"] . '">'; // Используйте поле image из БД для пути к изображению
    echo '<h1 class="katalog-cards-h1">' . $row["name"] . '</h1>';
    echo '<a href="tovar.php" class="katalog-cards-p">' . $row["price"] . ' РУБ</a>';
    echo '</div>';
  }
} else {
  echo "В каталоге нет товаров.";
}
$conn->close();
?>

</section>
<script src="script.js"></script>
<script src="file.js"></script>
	</body>
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