<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./main/main.css" />
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
    <h1 class="navigation-text">ГЛАВНАЯ</h1>
    <img src="main/Vector 17.png" class="navigation-img">
    <h1 class="navigation-text">ГЛАВНАЯ</h1>
</div>
</section>
<section class="kontacti-container">
    <h1 class="kontakti-h1">НАШИ СОТРУДНИКИ</h1>
<div class="kontacti-cards">
<img src="main/Group 53.png" alt="" class="kontakti-img">
<img src="main/Group 53.png" alt="" class="kontakti-img">
<img src="main/Group 53.png" alt="" class="kontakti-img">
</div>
</section>
<section class="kontacti-kak-svyaz">
    <h1 class="kontakti-h1">КАК С НАМИ СВЯЗАТЬСЯ?</h1>
<div class="kontacti-cards">
<img src="main/Group 67.png" alt="" class="kontakti-img-1">
<img src="main/Group 67.png" alt="" class="kontakti-img-1">
<img src="main/Group 67.png" alt="" class="kontakti-img-1">
</div>
</section>
<div style="position:relative;overflow:hidden;text-align:center; border-radius: 30px;"><a href="https://yandex.ru/maps/org/tserkov_smolenskoy_ikony_bozhiyey_materi_v_fili_davydkovo/1706761207/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Церковь Смоленской иконы Божией Матери в Фили-Давыдково</a><a href="https://yandex.ru/maps/213/moscow/category/orthodox_church/53436519791/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Православный храм в Москве</a><iframe src="https://yandex.ru/map-widget/v1/?ll=37.470493%2C55.715144&mode=poi&poi%5Bpoint%5D=37.467800%2C55.720442&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D1706761207&z=14.8" width="80%" height="720" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
	<section class="obratnaya-svyaz-container">
        <h1 class="kontakti-h1">ОБРАТНАЯ СВЯЗЬ</h1>
<form class="kontacti-forms" action="contactsform.php" method="post">
  <input name="login" placeholder="ВАШ ЛОГИН" class="input-1" type="text" required>
  <input name="email" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" class="input-2" type="email" required>
  <input name="message" placeholder="ОБРАЩЕНИЕ" class="input-3" type="text" required>
  <button type="submit" class="button-kontacty">ОТПРАВИТЬ</button>
</form>

    </section>
    <script src="script.js"></script>
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

