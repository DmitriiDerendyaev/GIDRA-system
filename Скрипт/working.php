<?php

for ($x=0; $x>-1; $x++){

	include_once(' Путь к файлу \connection_test.php');                              /* Нужно указать путь к файлу */ 

	$cards = file(' Путь к файлу \cods_from_arduino.txt', FILE_USE_INCLUDE_PATH);    /* Нужно указать путь к файлу */
        
        print_r($cards);

	if ($cards){
            
        file_put_contents(' Путь к файлу \cods_from_arduino.txt', '');               /* Нужно указать путь к файлу */
		
		$link = mysqli_connect($host, $user, $password, $database);
		
		if (!$link) {
			die('Ошибка подключения (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
		}
		
		foreach ($cards as $each_code){
                        
                        $each_code = substr($each_code,0,19);
			
			$id_user_res = "SELECT id_user FROM user_card WHERE code_card=' " . $each_code . "'";

			$id_user = mysqli_query($link, $id_user_res) or die("Ошибка " . mysqli_error($link));
                        
			if($id_user)
			{
				echo "Выполнение запроса на получение id_user прошло успешно \n";
			}
                     
                        $row = mysqli_fetch_row($id_user);
  
			$list_res = "INSERT INTO user_time VALUES(" . $row[0] . ",CURRENT_TIMESTAMP)";

			$list = mysqli_query($link, $list_res) or die("Ошибка " . mysqli_error($link));
			
			if($list)
			{
				echo "Выполнение запроса на добавление записи об отметке прошло успешно \n \n";
			}        
                        
		}
                
                mysqli_free_result($id_user);
                
                mysqli_close($link);

	}
	
	sleep(5);
}

?>