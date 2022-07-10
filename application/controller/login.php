<?php
require '../model/login_model.php';

$class = new login_model();

parse_str($_POST["frmLogin"], $_POST);
if ($_POST['func'] == 'login') {
    $username = $_POST['inputUsername'] != '' ? $_POST['inputUsername'] : '';
    $phone_number = $_POST['inputUsername'] != '' ? $_POST['inputUsername'] : '';
    $password = $_POST['inputPassword'] != '' ? $_POST['inputPassword'] : '';

    if (!empty($username) || !empty($phone_number) || !empty($password)) {
        $query = $class->login($username, $password, $phone_number);
        echo $query;
    } else {
        echo  json_encode(array(
            "is_successful" => false,
            "message" => "กรุณาลงชื่อเข้าใช้งาน",
        ));
    }
}
