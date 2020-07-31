<?php
$host = 'localhost';
$database = 'test-task';
$user = 'root';
$password = '';
$connection = mysqli_connect($host,$user, $password) or die("Ошибка подключения". mysqli_error($connection));
mysqli_select_db($connection, $database) or die("Ошибка базы данных ");
mysqli_set_charset($connection, "utf8");
?>
