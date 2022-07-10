<?php
require_once '../model/register.php';

$class = new register();

$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $ampher_id = $_REQUEST['id'];

    $query = $class->load_tumbon($ampher_id);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "tumbon_id" => intval($row->district_id),
            "tumbon_name" => $row->district_name_local,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'ampher') {
    $province_id = $_REQUEST['id'];

    $query = $class->load_ampher($province_id);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "ampher_id" => intval($row->amphoe_id),
            "ampher_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}

if ($func == 'province') {
    $query = $class->load_province('');

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "province_id" => intval($row->province_id),
            "province_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
// ส่วนของลงทะเบียน
if ($func == 'register') {
    parse_str($_POST["Formregister"], $_POST);

    $title =  $_POST['title'] != "" ? $_POST['title'] : "";
    $fname =  $_POST['fname'] != "" ? $_POST['fname'] : "";
    $lname =  $_POST['lname'] != "" ? $_POST['lname'] : "";
    $age =  $_POST['age'] != "" ? $_POST['age'] : "";
    $birthday =  $_POST['birthday'] != '' ? date('Y-m-d', strtotime($_POST['birthday'] . "-543 year")) : "";
    $id_card =  $_POST['id_card'] != '' ? preg_replace('/[-]/i', '', $_POST['id_card']) : "";
    $phone_number =  $_POST['phone_number'] != "" ? $_POST['phone_number'] : "";
    $address =  $_POST['address'] != "" ? $_POST['address'] : "";
    $province_id =  $_POST['province_id'] != "" ? $_POST['province_id'] : "";
    $ampher_id =  $_POST['ampher_id'] != "" ? $_POST['ampher_id'] : "";
    $tumbon_id =  $_POST['tumbon_id'] != "" ? $_POST['tumbon_id'] : "";
    $username = $_POST['username'] != "" ? $_POST['username'] : "";
    $password =   $_POST['password-input'] != "" ? $class->encode($_POST['password-input']) : "";


    if (
        empty($title) || empty($fname) || empty($lname) || empty($address)
        || empty($ampher_id) || empty($tumbon_id) || empty($province_id) || empty($id_card)
        || empty($username) || empty($password) || empty($age) || empty($birthday)
        || empty($phone_number)
    ) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบกรุณาตรวจสอบ",
        ));
    } else {
        $query = $class->register_model($title, $fname, $lname, $address, $ampher_id, $tumbon_id, $province_id, $id_card, $username, $password, $age, $birthday, $phone_number);

        echo json_encode(array(
            "is_successful" => true,
            "message" => "ลงทะเบียนสำเร็จ",
        ));
    }
}
// ส่วนของการเช็ค username
if ($func == 'username_check') {

    $username = $_REQUEST['username_check'];
    $query = $class->check_username($username);

    $row = $query->fetch_object();
    if (!empty($row)) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "**********  ชื่อเข้าใช้งานซ้ำ **********",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "",
        ));
    }
}
