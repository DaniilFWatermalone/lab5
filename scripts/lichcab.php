<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetMusic</title>
    <link rel="stylesheet" href="lichkab.css ">
</head>
<body>
    <header class="header">
        <a class="header_logo" href="main.html" ><img src="pic/logo.png" alt="#"></a>
        <div class="header_nav">
            <a href="likes.html" class="header_nav_a">Избранные</a>
            <a href="charts.php" class="header_nav_a">Чарты</a>
            <a href="news.html" class="header_nav_a">Новости</a>
        </div>
        <div class="header_right">
            <a  href="#" class="header_icon"><img src="pic/lupa.svg" alt="#"></a>
            <a href="lichcab.html" class="header_icon"><img src="pic/lichkab.svg" alt="#"></a>
        </div>
    </header>
    <?php
  session_start();
  // Проверяем, авторизован ли пользователь
  if(isset($_SESSION['user_id'])) {
    $userRole = $_SESSION['user_role'];
    $userName = $_SESSION['user_name'];
    // Если роль администратор, добавляем пометку
    $adminTag = $userRole == 2 ? "<span style='color: red;'>(Администратор)</span>" : "";
  } else {
    // Пользователь не авторизован, перенаправляем на страницу входа
    header('Location: registration.php');
    exit();
  }
?>
<div class="user">
    <h2 class="user_title">Информация об пользователе</h2>
    <div class="user_line"></div>
    <div class="user_content">
      <img src="pic/Ellipse 1.png" class="user_image">
      <div class="user_info">
        <h3 class="user_name"><?php echo $userName . " " . $adminTag; ?></h3>
        <p class="user_city">Moldova, <span id="userCity">Gagausia</span></p>
        <p class="user_text" id="userDescription">Меня зовут Cool Man и я родом из Гагаузии поэтому я cool!!!</p>
    </div>
    </div>
  </div>
  <?php if ($userRole == 2):?>
  <div class="admin-panel" style='text-align: center;'>
          <h2>Добавление трека в Чарты</h2>
          <form action="add_track.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nameTrack" placeholder="Название трека" required>
            <input type="text" name="artistTrack" placeholder="Исполнитель" required>
            <input type="text" name="timeTrack" placeholder="Длительность трека" required>
            <input type="text" name="janr" placeholder="Жанр" required>
            <input type="file" name="songFile" accept=".mp3" required>
            <input type="submit" value="Добавить трек">
          </form>
        </div>
  <?php endif;?>
      <div class="album">
        <h2 class="album_title">Ваши альбомы</h2>
        <div class="album_container">
            <div class="album_card">
                <img  class="album_img" src="pic/likeee.png" >
                <div class="album_info">
                    <h3 class="album_sub">Ваши любимые треки </h3>
                    <a href="likes.html" class="album_a">Слушать</a>
                </div>
            </div>

            <div class="album_card">
                <img  class="album_img" src="pic/charteee.png">
                <div class="album_info">
                    <h3 class="album_sub">Чарты MetMusic</h3>
                    <a href="charts.php" class="album_a">Слушать</a>
                </div>
            </div>

            <div class="album_card">
                <img  class="album_img" src="pic/sooneee.png">
                <div cclass="album_info">
                    <h3 class="album_sub">Новостной релиз</h3>
                    <a href="news.html" class="album_a">Слушать</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sub">
        <p  class="sub_p">Напишите вашу почту ниже, чтобы получать рассылку от <br> MetMusic и быть в курсе каждого события.</p>
        <div class="sub_input">
          <input type="text" value="Ваш email" id="textbox" onfocus="if(this.value == 'Ваш email') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Ваш email'; }">
          <button class="sub_btn" onclick="submitFunction()">Подписаться</button>
        </div>
        <p class="sub_pre">Нажимая на кнопку “Подписаться”, вы принимаете правила пользовательского соглашения</p>
      </div>
    <footer class="footer">
        <img src="pic/logo.png" class="footer_logo">
        <ul class="footer_links">
          <li class="footer_links_li"><a class="footer_links_a" href="likes.html">Избранные</a></li>
          <li class="footer_links_li"><a class="footer_links_a" href="charts.php">Чарты</a></li>
          <li class="footer_links_li"><a class="footer_links_a" href="news.html">Новости</a></li>
        </ul>
      </footer>
    <script src="main.js"></script>
</body>
</html>