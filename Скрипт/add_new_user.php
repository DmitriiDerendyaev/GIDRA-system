<?php
function add_new($conn,$code)
{

    include_once('C:\Users\d.s.aleksandrov\Desktop\connection.php');

    $select_last = "SELECT MAX(id_user) as id_user FROM user_name";

    $id_last_user = mysqli_query($conn, $select_last) or die("Ошибка " . mysqli_error($conn));

    if($id_last_user) {
    }

    $id_max = mysqli_fetch_row($id_last_user);

    $id_int = intval($id_max[0])+1;

    printf('Введите фамилию: ');
    $firstname = "'" . readline('Введите фамилию: ') . "'";
    printf('Введите имя: ');
    $surname = "'" . readline('Введите имя: ') . "'";
    printf('Введите отчество: ');
    $lastname = "'" . readline('Введите отчество: ') . "'";

    $inserting = "INSERT INTO user_name VALUES(" . $id_int . "," . $firstname . "," . $surname . "," . $lastname . ")";

    $adding = mysqli_query($conn, $inserting) or die("Ошибка " . mysqli_error($conn));

    if($adding) {
    }

    $inserting_2 = "INSERT INTO user_card VALUES(" . $id_int . ",' " . $code . "')";

    $adding_2 = mysqli_query($conn, $inserting_2) or die("Ошибка " . mysqli_error($conn));

    if($adding_2) {
    }

    return($id_int);

}

?>
