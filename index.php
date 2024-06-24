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
						<a href="katalog.php" class="header-link">КАТАЛОГ</a>
						<a href="kontakti.php" class="header-link">КОНТАКТЫ</a>
						<a href="akcii.html" class="header-link">АКЦИИ</a>
                        <?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Если пользователь авторизирован, выводим ссылку на lk.php и убираем id
    echo '<a class="header-link2" href="lk.php"><img class="logo" src="./main/Group 40.png" alt="" /></a>';
} else {
    // Если пользователь не авторизирован, выводим ссылку на страницу входа
    echo '<a class="header-link2"><img id="login-btn" class="logo" src="./main/Group 40.png" alt="" /></a>';
}
?>

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
                <a class="burger-a" href="katalog.php">КАТАЛОГ</a>
                <a class="burger-a" href="kontakti.html">КОНТАКТЫ</a>
                <a class="burger-a" href="akcii.html">АКЦИИ</a>
                <a class="burger-a" href="prtnery.html">ПАРТНЕРЫ</a>
            </div>
        </section>
		<form action="reg.php" method="post" id="reg-popup" class="popup">
			<div class="popup-1">
				<div class="popup-text-container">
					<h1 class="text-popup">РЕГИСТРАЦИЯ</h1>
					<a onclick="Close()" id="popup-close-1" class="popup-close">&#10006;</a>
				</div>
				<input name="login" placeholder="ВАШ ЛОГИН" class="input-popup" type="text" required>
				<input name="mail" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-popup" type="email" required>
				<input name="phone" placeholder="НОМЕР ТЕЛЕФОНА" class="input-popup" type="text" required>
				<input name="password" placeholder="ПАРОЛЬ" class="input-popup" type="password" required>
				<input name="passwordConfirm" placeholder="ПОВТОРИТЕ ПАРОЛЬ" class="input-popup" type="password" required>
				<button type="submit" class="popup-button">ЗАРЕГИСТРИРОВАТЬСЯ</button>
				<a id="popup-vhod" class="popup-subtitle">У меня уже есть аккаунт</a>
			</div>
		</form>
		
		<form action="login.php" method="post" id="login-popup" class="popup">
			<div class="popup-1">
				<div class="popup-text-container">
					<h1 class="text-popup">АВТОРИЗАЦИЯ</h1>
					<a onclick="Close()" id="popup-close" class="popup-close">&#10006;</a>
				</div>
				<input name="loginEmail" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-popup" type="email" required>
				<input name="loginPassword" placeholder="ПАРОЛЬ" class="input-popup" type="password" required>
				<input type="submit" class="popup-button" value="ВОЙТИ">
				<a id="popup-reg" class="popup-subtitle">У меня уже нет аккаунта</a>
			</div>
		</form>
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

		<!-- <section class="buy-container">
			<div class="buy-curt-container">
				<a id="cart" class="buy-curt">&#10084;</a>
			</div>
		</section> -->
<section class="navigation-container">
    <div class="nav-vlock">
    <img src="main/Vector 17.png" class="navigation-img">
    <h1 class="navigation-text">ГЛАВНАЯ</h1>
</div>
</section>
	<div class="Slider-container">
			<div class="slider">
				<img class="arrow-left" src="main/Vector 15.png"  onclick="prevSlide()"></img>
				<!-- <h1 class="slider-text" id="slideText">1 ЭТАП</h1>
				<p class="slider-text1" id="slideText1">1 ЭТАП</p> -->
				<img class="slider-img-1" id="slideImg" src="main/img1.png">
				<img class="arrow-right" src="main/Vector 16.png"   onclick="nextSlide()"></img>
			  </div>
			  <div class="container">
				<div class="circle" onclick="cirkclick()" id="cirk1">1</div>
				<div class="circle" onclick="cirkclick1()" id="cirk2">2</div>
				<div class="circle" onclick="cirkclick2()" id="cirk3">3</div>
				<div class="circle" onclick="cirkclick3()" id="cirk4">4</div>
				<div class="text-container">
				</div>
		  </div>
	</div>
<section class="katalog-text-container">
<div class="katalog-h1-section">
<h1 class="katalog-h1">ДОБРО ПОЖАЛОВАТЬ В НАШ МАГАЗ</h1>
</div>
<div class="main-first-container-1">
<div class="main-first-1">
<div class="main-text-block-1">
<h1 class="main-h1-1">lorik Poitokaka</h1>
<p class="main-p-1">Здесь вы сможете купить вкусной и полезной еды, пополнить запасы бытовых принадлежностей, а так же подобрать для себя средства личной гигиены которые ПОДХОДЯТ ИМЕННО ВАМ!</p>
<div class="main-button-container">
<a class="main-a-1" href="onas.html">ПОДРОБНЕЕ</a>
</div>
</div>
<div class="main-image-2">
<img class="main-image-1" src="main/Group 59.png" alt="">
</div>
</div>
</div>
</section>
		<section class="katalog-text-container">
			<div class="katalog-h1-section-plus">
			<h1 class="katalog-h1">ТОВАР УЧАСТВУЮЩИЙ В АКЦИИ</h1>
			<a href="katalog.html" class="subtitle">ТОВАР УЧАСТВУЮЩИЙ В АКЦИИ</a>
			</div>
			<div class="akciya-block-tovary">
			<div class="akciya1-tovar-list">
				<img class="akciya-tovar" src="main/pngwing 1.png" alt="">
				<h1 class="akciya-tovar-h1">ТОВАР КРУТОЙ</h1>
				<p class="akciya-tovar-p">800 РУБ</з>
			</div>
			<div class="akciya1-tovar-list">
				<img class="akciya-tovar" src="main/pngwing 1.png" alt="">
				<h1 class="akciya-tovar-h1">ТОВАР КРУТОЙ</h1>
				<p class="akciya-tovar-p">800 РУБ</з>
			</div>
			<div class="akciya1-tovar-list">
				<img class="akciya-tovar" src="main/pngwing 1.png" alt="">
				<h1 class="akciya-tovar-h1">ТОВАР КРУТОЙ</h1>
				<p id="tovar-buy" class="akciya-tovar-p">800 РУБ</з>
			</div>
			<div class="akciya1-tovar-list">
				<img class="akciya-tovar" src="main/pngwing 1.png" alt="">
				<h1 class="akciya-tovar-h1">ТОВАР КРУТОЙ</h1>
				<p class="akciya-tovar-p">800 РУБ</з>
			</div>
		</div>
</div>
	</section>
	<section class="katalog-text-container">
		<div class="katalog-h1-section-plus">
		<h1 class="katalog-h1">НАШИ ПАРТНЕРЫ</h1>
		<a href="prtnery.html" class="subtitle">УЗНАТЬ БОЛЬШЕ</a>
		</div>
		<div class="main-tovary">
		<div class="main-tovar-list">
			<img class="akciya-tovar-1" src="main/pngwing 10.png" alt="">
			<h1 class="akciya-tovar-h1">ПАРТНЕР 1</h1>
		</div>
		<div class="main-tovar-list">
			<img class="akciya-tovar-1" src="main/pngwing 11.png" alt="">
			<h1 class="akciya-tovar-h1">ПАРТНЕР 2</h1>
		</div>
		<div class="main-tovar-list">
			<img class="akciya-tovar-1" src="main/pngwing 12.png" alt="">
			<h1 class="akciya-tovar-h1">ПАРТНЕР 3</h1>
		</div>
		<div class="main-tovar-list">
			<img class="akciya-tovar-1" src="main/pngwing 13.png" alt="">
			<h1 class="akciya-tovar-h1">ПАРТНЕР 4</h1>
		</div>
	</div>
		</section>
</div>
</section>
	<section class="katalog-text-container">
		<div class="katalog-h1-section">
		<h1 class="katalog-h1">ПОПУЛЯРНОЕ</h1>
		</div>
		</section>
		<section class="katalog-text-container">
			<div class="katalog-container-img">
				<h1 class="katalog-akciya-h1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti delectus, alias eaque facere expedita asperiores neque adipisci cupiditate ullam cum blanditiis odio quae dicta enim tenetur assumenda dolores voluptatibus sed.</h1>
				<a class="katalog-akciya-a-1" href="akciya1.html">ПОДРОБНЕЕ</a>
				</div>
			</section>
			<section class="katalog-text-container">
				<h1 class="katalog-h1">ИНФОРМАЦИЯ</h1>
				<div class="katalog-container-informate">
					<h1 class="katalog-informate-h1">ПРИВЕТ ВОТ ТУТ КОРОЧЕ МОЖН ОУЗНАТЬ О НАС</h1>
					<a class="katalog-informate-a-1" href="onas.html">ПОДРОБНЕЕ</a>
					<h1 class="katalog-informate-h1">А ЗДЕСЬ ГАЙД НА ПОКУПКИ У НАС В МАГАЗИНЕ</h1>
					<a class="katalog-informate-a-2" href="gaid.html">ГАЙД</a>
					</div>
				</section>
	</body>
	<script src="script.js"></script>
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

