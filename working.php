<?php

for ($x=0; $x>-1; $x++){
	
	$cards = file(cods_from_arduino.txt, FILE_USE_INCLUDE_PATH, ?):array;
	
	require_once 'connection.php'; // подключаем скрипт
	 
		// подключаемся к серверу
		$link = mysqli_connect($host, $user, $password, $database) 
	    	or die("Ошибка " . mysqli_error($link));
	 
		// выполняем операции с базой данных
	
	for ($i=0, $i<count($cards), i++){
		
		$id_user_res = "SELECT id_user FROM user-card WHERE id_card='$cards[i]'";

		$id_user = mysqli_query($link, $id_user_res) or die("Ошибка " . mysqli_error($link));
		if($id_user)
		{
			echo "Выполнение запроса на получение id_user прошло успешно";
		}

		$date = new DateTime();
		$date->setDate(int $year, int $month, int $day);
		$date->setTime(int $hour, int $minute [, int $second ]);

		$list_res = "INSERT INTO user-time VALUES($id_user,$date)"

		$list = mysqli_query($link, $list_res) or die("Ошибка " . mysqli_error($link));
		if($list)
		{
			echo "Выполнение запроса на добавление записи об отметке прошло успешно";
		}

		// закрываем подключение
		mysqli_close($link);
	
	sleep(60);
}

?>