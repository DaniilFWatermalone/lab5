<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link rel="stylesheet" href="aboutUs.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><a href="index.html"><img src="img/Главная/logo.svg"/></a></div>
            <div class="menu">
                <ul class="main-menu">
                    <li class="main-menu__link"><a href="aboutUs.html" class="main-menu__item">О нас</a></li>
                    <li class="main-menu__link"><a href="casting.html" class="main-menu__item">Кастинг</a></li>
                    <li class="main-menu__link"><a href="contacts.html" class="main-menu__item">Контакты</a></li>
                    <li class="main-menu__link"><a href="models.html" class="main-menu__item">Модели</a></li>
                    <li class="main-menu__link"><a href="index.html" id="openModal" class="main-menu__item">Личный кабинет</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
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
    
    $query = "UPDATE `objects` SET `id`='$id', `name`='$name', `price`='$price', `description`='$description', `img`='$img' WHERE `id`='$id'";
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

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Административная панель</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление моделями</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>img</th>
        </tr>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model['id'] ?></td>
            <td><?= $model['name'] ?></td>
            <td><?= $model['price'] ?></td>
            <td><?= $model['description'] ?></td>
            <td><?= $model['img'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $model['id'] ?>">
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить модель</h2>
    <form method="post">
        ID Пользователя: <input type="number" name="ID_users">
        Рост: <input type="text" name="Height">
        Вес: <input type="text" name="Weight">
        Талия: <input type="text" name="Waist">
        Цвет волос: <input type="text" name="HairColor">
        Цвет глаз: <input type="text" name="Eyes">
        Пол: <input type="text" name="Floor">
        Возраст: <input type="number" name="Age">
        Уровень опыта: <input type="text" name="ExperienceLevel">
        ID Навыка: <input type="number" name="ID_Skill">
        <input type="submit" name="add" value="Добавить">
    </form>

    <h2>Изменить данные модели</h2>
    <form method="post">
        ID Модели: <input type="number" name="ID_Models">
        ID Пользователя: <input type="number" name="ID_users">
        Рост: <input type="text" name="Height">
        Вес: <input type="text" name="Weight">
        Талия: <input type="text" name="Waist">
        Цвет волос: <input type="text" name="HairColor">
        Цвет глаз: <input type="text" name="Eyes">
        Пол: <input type="text" name="Floor">
        Возраст: <input type="number" name="Age">
        Уровень опыта: <input type="text" name="ExperienceLevel">
        ID Навыка: <input type="number" name="ID_Skill">
        <input type="submit" name="update" value="Изменить">
    </form>
</body>
</html>

<hr>

<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление данных клиента
if (isset($_POST['add_client'])) {
    $Company_name = $_POST['Company_name'];
    $address = $_POST['address'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    
    $query = "INSERT INTO `Clients` (`Company_name`, `address`, `Phone`, `Email`) VALUES ('$Company_name', '$address', '$Phone', '$Email')";
    mysqli_query($connect, $query);
}

// Изменение данных клиента
if (isset($_POST['update_client'])) {
    $ID_Clients = $_POST['ID_Clients'];
    $Company_name = $_POST['Company_name'];
    $address = $_POST['address'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    
    $query = "UPDATE `Clients` SET `Company_name`='$Company_name', `address`='$address', `Phone`='$Phone', `Email`='$Email' WHERE `ID_Clients`='$ID_Clients'";
    mysqli_query($connect, $query);
}

// Удаление данных клиента
if (isset($_POST['delete_client'])) {
    $ID_Clients = $_POST['ID_Clients'];
    $query = "DELETE FROM `Clients` WHERE `ID_Clients`='$ID_Clients'";
    mysqli_query($connect, $query);
}

// Получение данных клиентов для отображения
$result = mysqli_query($connect, "SELECT * FROM `Clients`");
$clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление клиентами</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление клиентами</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Название компании</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client['ID_Clients'] ?></td>
            <td><?= $client['Company_name'] ?></td>
            <td><?= $client['address'] ?></td>
            <td><?= $client['Phone'] ?></td>
            <td><?= $client['Email'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="ID_Clients" value="<?= $client['ID_Clients'] ?>">
                    <input type="submit" name="delete_client" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить клиента</h2>
    <form method="post">
        Название компании: <input type="text" name="Company_name">
        Адрес: <input type="text" name="address">
        Телефон: <input type="text" name="Phone">
        Email: <input type="email" name="Email">
        <input type="submit" name="add_client" value="Добавить">
    </form>

    <h2>Изменить данные клиента</h2>
    <form method="post">
        ID Клиента: <input type="number" name="ID_Clients">
        Название компании: <input type="text" name="Company_name">
        Адрес: <input type="text" name="address">
        Телефон: <input type="text" name="Phone">
        Email: <input type="email" name="Email">
        <input type="submit" name="update_client" value="Изменить">
    </form>
</body>
</html>

<hr>
<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление навыка
if (isset($_POST['add_skill'])) {
    $Skill_description = $_POST['Skill_description'];
    $Category = $_POST['Category'];
    
    $query = "INSERT INTO `Skills` (`Skill_description`, `Category`) VALUES ('$Skill_description', '$Category')";
    mysqli_query($connect, $query);
}

// Изменение навыка
if (isset($_POST['update_skill'])) {
    $ID_Skills = $_POST['ID_Skills'];
    $Skill_description = $_POST['Skill_description'];
    $Category = $_POST['Category'];
    
    $query = "UPDATE `Skills` SET `Skill_description`='$Skill_description', `Category`='$Category' WHERE `ID_Skills`='$ID_Skills'";
    mysqli_query($connect, $query);
}

// Удаление навыка
if (isset($_POST['delete_skill'])) {
    $ID_Skills = $_POST['ID_Skills'];
    $query = "DELETE FROM `Skills` WHERE `ID_Skills`='$ID_Skills'";
    mysqli_query($connect, $query);
}

// Получение данных навыков для отображения
$result = mysqli_query($connect, "SELECT * FROM `Skills`");
$skills = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление навыками</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление навыками</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Описание навыка</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($skills as $skill): ?>
        <tr>
            <td><?= $skill['ID_Skills'] ?></td>
            <td><?= $skill['Skill_description'] ?></td>
            <td><?= $skill['Category'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="ID_Skills" value="<?= $skill['ID_Skills'] ?>">
                    <input type="submit" name="delete_skill" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить навык</h2>
    <form method="post">
        Описание навыка: <input type="text" name="Skill_description">
        Категория: <input type="text" name="Category">
        <input type="submit" name="add_skill" value="Добавить">
    </form>

    <h2>Изменить навык</h2>
    <form method="post">
        ID Навыка: <input type="number" name="ID_Skills">
        Описание навыка: <input type="text" name="Skill_description">
        Категория: <input type="text" name="Category">
        <input type="submit" name="update_skill" value="Изменить">
    </form>
</body>
</html>

<hr>
<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление пользователя
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля
    $avatar = $_POST['avatar'];
    $role = $_POST['role'];
    
    $query = "INSERT INTO `users` (`name`, `surname`, `email`, `password`, `avatar`, `role`) VALUES ('$name', '$surname', '$email', '$password', '$avatar', '$role')";
    mysqli_query($connect, $query);
}

// Изменение данных пользователя
if (isset($_POST['update_user'])) {
    $Id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля
    $avatar = $_POST['avatar'];
    $role = $_POST['role'];
    
    $query = "UPDATE `users` SET `name`='$name', `surname`='$surname', `email`='$email', `password`='$password', `avatar`='$avatar', `role`='$role' WHERE `Id`='$Id'";
    mysqli_query($connect, $query);
}

// Удаление пользователя
if (isset($_POST['delete_user'])) {
    $Id = $_POST['id'];
    $query = "DELETE FROM `users` WHERE `id`='$id'";
    mysqli_query($connect, $query);
}

// Получение данных пользователей для отображения
$result = mysqli_query($connect, "SELECT * FROM `users`");
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление пользователями</title>
    <!-- Стили и скрипты -->
    <style>
    .user-avatar {
        width: 50px; /* или другой размер, который вам нужен */
        height: auto;
    }
</style>
</head>
<body>
    <h1>Управление пользователями</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
            <th>Аватар</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['surname'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><img src="<?= $user['avatar'] ?>" alt="Аватар" class="user-avatar"></td>
            <td><?= $user['role'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="submit" name="delete_user" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить пользователя</h2>
    <form method="post">
        Имя: <input type="text" name="name">
        Фамилия: <input type="text" name="surname">
        Email: <input type="email" name="email">
        Пароль: <input type="password" name="password">
        Аватар (URL): <input type="text" name="avatar">
        Роль: <select name="role">
            <option value="user">Пользователь</option>
            <option value="admin">Администратор</option>
        </select>
        <input type="submit" name="add_user" value="Добавить">
    </form>

    <h2>Изменить данные пользователя</h2>
    <form method="post">
        ID Пользователя: <input type="number" name="id">
        Имя: <input type="text" name="name">
        Фамилия: <input type="text" name="surname">
        Email: <input type="email" name="email">
        Пароль: <input type="password" name="password">
        Аватар (URL): <input type="text" name="avatar">
        Роль: <select name="role">
            <option value="user">Пользователь</option>
            <option value="admin">Администратор</option>
        </select>
        <input type="submit" name="update_user" value="Изменить">
    </form>
</body>
</html>

<hr>
<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление контракта
if (isset($_POST['add_contract'])) {
    $ID_Models = $_POST['ID_Models'];
    $ID_Clients = $_POST['ID_Clients'];
    $Start_date = $_POST['Start_date'];
    $End_date = $_POST['End_date'];
    $activity_status = $_POST['activity_status'];
    
    $query = "INSERT INTO `Contracts` (`ID_Models`, `ID_Clients`, `Start_date`, `End_date`, `activity_status`) VALUES ('$ID_Models', '$ID_Clients', '$Start_date', '$End_date', '$activity_status')";
    mysqli_query($connect, $query);
}

// Изменение контракта
if (isset($_POST['update_contract'])) {
    $ID_Contracts = $_POST['ID_Contracts'];
    $ID_Models = $_POST['ID_Models'];
    $ID_Clients = $_POST['ID_Clients'];
    $Start_date = $_POST['Start_date'];
    $End_date = $_POST['End_date'];
    $activity_status = $_POST['activity_status'];
    
    $query = "UPDATE `Contracts` SET `ID_Models`='$ID_Models', `ID_Clients`='$ID_Clients', `Start_date`='$Start_date', `End_date`='$End_date', `activity_status`='$activity_status' WHERE `ID_Contracts`='$ID_Contracts'";
    mysqli_query($connect, $query);
}

// Удаление контракта
if (isset($_POST['delete_contract'])) {
    $ID_Contracts = $_POST['ID_Contracts'];
    $query = "DELETE FROM `Contracts` WHERE `ID_Contracts`='$ID_Contracts'";
    mysqli_query($connect, $query);
}

// Получение данных контрактов для отображения
$result = mysqli_query($connect, "SELECT * FROM `Contracts`");
$contracts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление контрактами</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление контрактами</h1>
    <table>
        <tr>
            <th>ID Контракта</th>
            <th>ID Модели</th>
            <th>ID Клиента</th>
            <th>Дата начала</th>
            <th>Дата окончания</th>
            <th>Статус активности</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($contracts as $contract): ?>
        <tr>
            <td><?= $contract['ID_Contracts'] ?></td>
            <td><?= $contract['ID_Models'] ?></td>
            <td><?= $contract['ID_Clients'] ?></td>
            <td><?= $contract['Start_date'] ?></td>
            <td><?= $contract['End_date'] ?></td>
            <td><?= $contract['activity_status'] ? 'Активен' : 'Неактивен' ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="ID_Contracts" value="<?= $contract['ID_Contracts'] ?>">
                    <input type="submit" name="delete_contract" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить контракт</h2>
    <form method="post">
        ID Модели: <input type="number" name="ID_Models">
        ID Клиента: <input type="number" name="ID_Clients">
        Дата начала: <input type="date" name="Start_date">
        Дата окончания: <input type="date" name="End_date">
        Статус активности: <select name="activity_status">
            <option value="1">Активен</option>
            <option value="0">Неактивен</option>
        </select>
        <input type="submit" name="add_contract" value="Добавить">
    </form>

    <h2>Изменить контракт</h2>
    <form method="post">
        ID Контракта: <input type="number" name="ID_Contracts">
        ID Модели: <input type="number" name="ID_Models">
        ID Клиента: <input type="number" name="ID_Clients">
        Дата начала: <input type="date" name="Start_date">
        Дата окончания: <input type="date" name="End_date">
        Статус активности: <select name="activity_status">
            <option value="1">Активен</option>
            <option value="0">Неактивен</option>
        </select>
        <input type="submit" name="update_contract" value="Изменить">
    </form>
</body>
</html>

<hr>
<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление фотосессии модели
if (isset($_POST['add_modelsphotoshoot'])) {
    $ID_Models = $_POST['ID_Models'];
    $ID_PhotoShoots = $_POST['ID_PhotoShoots'];
    
    $query = "INSERT INTO `ModelsPhotoshoots` (`ID_Models`, `ID_PhotoShoots`) VALUES ('$ID_Models', '$ID_PhotoShoots')";
    mysqli_query($connect, $query);
}

// Удаление фотосессии модели
if (isset($_POST['delete_modelsphotoshoot'])) {
    $ID_ModelsPhotoshoots = $_POST['ID_ModelsPhotoshoots'];
    $query = "DELETE FROM `ModelsPhotoshoots` WHERE `ID_ModelsPhotoshoots`='$ID_ModelsPhotoshoots'";
    mysqli_query($connect, $query);
}

// Получение данных фотосессий моделей для отображения
$result = mysqli_query($connect, "SELECT * FROM `ModelsPhotoshoots`");
$modelsphotoshoots = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление фотосессиями моделей</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление фотосессиями моделей</h1>
    <table>
        <tr>
            <th>ID Фотосессии Модели</th>
            <th>ID Модели</th>
            <th>ID Фотосессии</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($modelsphotoshoots as $mp): ?>
        <tr>
            <td><?= $mp['ID_ModelsPhotoshoots'] ?></td>
            <td><?= $mp['ID_Models'] ?></td>
            <td><?= $mp['ID_PhotoShoots'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="ID_ModelsPhotoshoots" value="<?= $mp['ID_ModelsPhotoshoots'] ?>">
                    <input type="submit" name="delete_modelsphotoshoot" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить фотосессию модели</h2>
    <form method="post">
        ID Модели: <input type="number" name="ID_Models">
        ID Фотосессии: <input type="number" name="ID_PhotoShoots">
        <input type="submit" name="add_modelsphotoshoot" value="Добавить">
    </form>
</body>
</html>

<hr>
<?php

require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Добавление фотосессии
if (isset($_POST['add_photoshoot'])) {
    $Event_date = $_POST['Event_date'];
    $Location = $_POST['Location'];
    $Topic = $_POST['Topic'];
    $ID_client = $_POST['ID_client'];
    
    $query = "INSERT INTO `PhotoShoots` (`Event_date`, `Location`, `Topic`, `ID_client`) VALUES ('$Event_date', '$Location', '$Topic', '$ID_client')";
    mysqli_query($connect, $query);
}

// Изменение фотосессии
if (isset($_POST['update_photoshoot'])) {
    $ID_PhotoShoots = $_POST['ID_PhotoShoots'];
    $Event_date = $_POST['Event_date'];
    $Location = $_POST['Location'];
    $Topic = $_POST['Topic'];
    $ID_client = $_POST['ID_client'];
    
    $query = "UPDATE `PhotoShoots` SET `Event_date`='$Event_date', `Location`='$Location', `Topic`='$Topic', `ID_client`='$ID_client' WHERE `ID_PhotoShoots`='$ID_PhotoShoots'";
    mysqli_query($connect, $query);
}

// Удаление фотосессии
if (isset($_POST['delete_photoshoot'])) {
    $ID_PhotoShoots = $_POST['ID_PhotoShoots'];
    $query = "DELETE FROM `PhotoShoots` WHERE `ID_PhotoShoots`='$ID_PhotoShoots'";
    mysqli_query($connect, $query);
}

// Получение данных фотосессий для отображения
$result = mysqli_query($connect, "SELECT * FROM `PhotoShoots`");
$photoshoots = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление фотосессиями</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Управление фотосессиями</h1>
    <table>
        <tr>
            <th>ID Фотосессии</th>
            <th>Дата события</th>
            <th>Место проведения</th>
            <th>Тема</th>
            <th>ID клиента</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($photoshoots as $photoshoot): ?>
        <tr>
            <td><?= $photoshoot['ID_PhotoShoots'] ?></td>
            <td><?= $photoshoot['Event_date'] ?></td>
            <td><?= $photoshoot['Location'] ?></td>
            <td><?= $photoshoot['Topic'] ?></td>
            <td><?= $photoshoot['ID_client'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="ID_PhotoShoots" value="<?= $photoshoot['ID_PhotoShoots'] ?>">
                    <input type="submit" name="delete_photoshoot" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Добавить фотосессию</h2>
    <form method="post">
        Дата события: <input type="date" name="Event_date">
        Место проведения: <input type="text" name="Location">
        Тема: <input type="text" name="Topic">
        ID клиента: <input type="number" name="ID_client">
        <input type="submit" name="add_photoshoot" value="Добавить">
    </form>

    <h2>Изменить фотосессию</h2>
    <form method="post">
        ID Фотосессии: <input type="number" name="ID_PhotoShoots">
        Дата события: <input type="date" name="Event_date">
        Место проведения: <input type="text" name="Location">
        Тема: <input type="text" name="Topic">
        ID клиента: <input type="number" name="ID_client">
        <input type="submit" name="update_photoshoot" value="Изменить">
    </form>
</body>
</html>


<?php
// Подключение к базе данных
require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Получение списка всех моделей с определенными физическими параметрами
$result = mysqli_query($connect, "SELECT * FROM `Models` WHERE `Height` = 180 AND `Weight` = 50 AND `HairColor` = 'Шатен'");
$models = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список моделей</title>
    <!-- Стили и скрипты -->
</head>
<body>
    <h1>Список моделей с определенными параметрами</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Высота</th>
            <th>Вес</th>
            <th>Цвет волос</th>
        </tr>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model['ID_Models'] ?></td>
            <td><?= $model['Name'] ?></td>
            <td><?= $model['Surname'] ?></td>
            <td><?= $model['Height'] ?></td>
            <td><?= $model['Weight'] ?></td>
            <td><?= $model['HairColor'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
