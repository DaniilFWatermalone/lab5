<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MetMusic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}

$trackId = $_POST['trackId'];

$conn->query("UPDATE tracks SET play_count = play_count + 1 WHERE track_id = $trackId");

$conn->close();
?>
