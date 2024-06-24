
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
                        <a class="burger-link"><img id="Burger-btn" class="logo" src="./main/Group 74.png" alt="" /></a>
					</ul>
				</nav>
			</div>
		</header>
        <section class="burger-container">
            <div id="burger-menu" class="burger-list">
                <a id="burger-close" class="popup-close">&#10006;</a>
                <a class="burger-a" href="index.html">ГЛАВНАЯ</a>
                <a class="burger-a" href="onas.html">О НАС</a>
                <a class="burger-a" href="katalog.html">КАТАЛОГ</a>
                <a class="burger-a" href="kontakti.html">КОНТАКТЫ</a>
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
    <img src="main/Vector 17.png" class="navigation-img">
    <h1 class="navigation-text">ТОВАР</h1>
</div>
</section>
<section class="katalog-text-container">
    <div class="main-first-container">
    <div class="main-first">
        <div class="main-image">
            <img class="main-image-1" src="main/pngwing 2.png" alt="">
            </div>
    <div class="main-text-block">
<form action="orders.php" method="post">
    <h1 class="main-h1">ШОКОЛАДНЫЙ КЕКС</h1>
    <p class="main-p">Lorem ipsum dolor sit, amet consectetur adipisicing elit...</p>
    <p class="main-p">150</p>
    <input type="hidden" name="product" value="ШОКОЛАДНЫЙ КЕКС">
    <input type="hidden" name="description" value="Lorem ipsum dolor sit, amet consectetur adipisicing elit...">
    <input type="hidden" name="price" value="150">
    <input type="hidden" name="id_kategory" value="1">
    <button type="submit" name="submit">ЗАКАЗАТЬ</button>
</form>

    <form action="reg.php" method="post" id="reg-popup" class="popup">
        <div class="popup-1">
            <div class="popup-text-container">
                <h1 class="text-popup">РЕГИСТРАЦИЯ</h1>
                <a onclick="Close()" id="popup-close-1" class="popup-close">&#10006;</a>
            </div>
            <input name="login" placeholder="ВАШ ЛОГИН" class="input-popup" type="text" required>
            <input name="mail" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-popup" type="email" required>
            <button type="submit" class="popup-button">ЗАКАЗАТЬ</button>
        </div>
    </form>
</div>
    </div>
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




