<?php

for ($x=0; $x>-1; $x++){
	
	include_once('C:\Users\d.s.aleksandrov\Desktop\гидра\GIDRA-system\connection.php');
	
	$cards = file('C:\Users\d.s.aleksandrov\Desktop\гидра\GIDRA-system\cods_from_arduino.txt', FILE_USE_INCLUDE_PATH);
	
	$link = mysqli_connect($host, $user, $password, $database);
	
	if (!$link) {
		die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
		
	
	for ($i=0; $i<count($cards); i+1){
		
		$id_user_res = "SELECT id_user FROM user-card WHERE id_card='$cards[i]'";

		$id_user = mysqli_query($link, $id_user_res) or die("Ошибка " . mysqli_error($link));
		if($id_user)
		{
			echo "Выполнение запроса на получение id_user прошло успешно";
		}

		$date = new DateTime();

		$list_res = "INSERT INTO user-time VALUES($id_user,$date)";

		$list = mysqli_query($link, $list_res) or die("Ошибка " . mysqli_error($link));
		if($list)
		{
			echo "Выполнение запроса на добавление записи об отметке прошло успешно";
		}

		mysqli_close($link);
		
	}
	
	sleep(60);
}

?>