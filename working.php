<?php
require_once 'connection.php'; // ���������� ������
�
// ������������ � �������
$link = mysqli_connect($host, $user, $password, $database) 
����or die("������ " . mysqli_error($link));
�
// ��������� �������� � ����� ������
�����
$id_user_res = "SELECT id_user FROM chern WHERE id_card='���������� ���� �����'";
$name_res = "SELECT name FROM chern WHERE id_card='���������� ���� �����'";

$id_user = mysqli_query($link, $id_user_res) or die("������ " . mysqli_error($link));
if($id_user)
{
    echo "���������� ������� �� ��������� id_user ������ �������";
}

$name = mysqli_query($link, $name_res) or die("������ " . mysqli_error($link));
if($name)
{
    echo "���������� ������� �� ��������� name ������ �������";
}

$date = new DateTime();
$date->setDate(int $year, int $month, int $day);
$date->setTime(int $hour, int $minute [, int $second ]);

$list_res = "INSERT INTO list VALUES($id_user,$name,$time")

$list = mysqli_query($link, $list_res) or die("������ " . mysqli_error($link));
if($list)
{
    echo "���������� ������� �� ���������� ������ �� ������� ������ �������";
}

// ��������� �����������
mysqli_close($link);
?>