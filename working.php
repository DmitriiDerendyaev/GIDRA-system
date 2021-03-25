<?php
require_once 'connection.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
// выполняем операции с базой данных
     
$id_user_res = "SELECT id_user FROM chern WHERE id_card='полученный айди карты'";
$name_res = "SELECT name FROM chern WHERE id_card='полученный айди карты'";

$id_user = mysqli_query($link, $id_user_res) or die("Ошибка " . mysqli_error($link));
if($id_user)
{
    echo "Выполнение запроса на получение id_user прошло успешно";
}

$name = mysqli_query($link, $name_res) or die("Ошибка " . mysqli_error($link));
if($name)
{
    echo "Выполнение запроса на получение name прошло успешно";
}

$date = new DateTime();
$date->setDate(int $year, int $month, int $day);
$date->setTime(int $hour, int $minute [, int $second ]);

$list_res = "INSERT INTO list VALUES($id_user,$name,$time")

$list = mysqli_query($link, $list_res) or die("Ошибка " . mysqli_error($link));
if($list)
{
    echo "Выполнение запроса на добавление записи об отметке прошло успешно";
}

// закрываем подключение
mysqli_close($link);
?>