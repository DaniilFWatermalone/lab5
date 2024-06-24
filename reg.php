<?php
session_start();
$db = mysqli_connect('localhost','root', '', 'Gratus' );



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['login'];
$email = $_POST['mail'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$rule = $_POST['rule'];

$_SESSION ['login'] = $name;

if ($db == false){
    echo 'Ошибка подключения';
    exit;
}

$UserMail = mysqli_query ($db, "SELECT mail from users where mail = '$email' ");

if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($passwordConfirm)) {
    echo 'Заполните все поля';
    exit;
}
// $phone = preg_replace('/\D/', '', $phone);
// Проверка на правильное заполнение почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Неправильный формат электронной почты';
    exit;
}

// Проверка на запрещенные символы в пароле
if (preg_match ('/[\'",\*,\[\],\{\}]/', $password)) {
    echo "<p>Недопустимые символы в пароле</p>";
    exit;
}

if (mysqli_num_rows ($UserMail) > 0){ 
    echo "Такая почта уже занята";
    exit; 
} 


if ($password == $passwordConfirm && strlen ($password) > 6 ){ 

    $sqlInsert = "INSERT INTO users SET login = '$name', mail = '$email', phone = '$phone', password = '$password', rule = 'user' "; 

    $result = mysqli_query($db, $sqlInsert);
    header ('Location: lk.php');
    echo "ВЫ УСПЕШНО ЗАРЕГЕСТРИРОВАНЫ!";
}
else{
    echo "Пароль меньше 6 символов или не совпадают.";
}
}

else{ 
    echo 'Не правильно заполнены поля'; 
    exit; 
} 
?>