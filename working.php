<?php

for ($x=0; $x>-1; $x++){
	
	$cards = file(cods_from_arduino.txt, FILE_USE_INCLUDE_PATH, ?):array;
	
	require_once 'connection.php'; // ���������� ������
	�
		// ������������ � �������
		$link = mysqli_connect($host, $user, $password, $database) 
	����	or die("������ " . mysqli_error($link));
	�
		// ��������� �������� � ����� ������
	
	for ($i=0, $i<count($cards), i++){
		
		$id_user_res = "SELECT id_user FROM user-card WHERE id_card='$cards[i]'";

		$id_user = mysqli_query($link, $id_user_res) or die("������ " . mysqli_error($link));
		if($id_user)
		{
			echo "���������� ������� �� ��������� id_user ������ �������";
		}

		$date = new DateTime();
		$date->setDate(int $year, int $month, int $day);
		$date->setTime(int $hour, int $minute [, int $second ]);

		$list_res = "INSERT INTO user-time VALUES($id_user,$date)"

		$list = mysqli_query($link, $list_res) or die("������ " . mysqli_error($link));
		if($list)
		{
			echo "���������� ������� �� ���������� ������ �� ������� ������ �������";
		}

		// ��������� �����������
		mysqli_close($link);
	
	sleep(60);
}

?>