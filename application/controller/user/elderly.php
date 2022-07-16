<?php
require_once '../../model/user/elderly_model.php';

$class = new addelderly();

$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $ampher_id = $_REQUEST['id'];

    $query = $class->add_tumbon($ampher_id);

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

    $query = $class->add_ampher($province_id);

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
    $query = $class->add_province('');

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
if ($func == 'elderly') {
    parse_str($_POST["Formelderly"], $_POST);

    $title =  $_POST['title'] != "" ? $_POST['title'] : "";
    $fname =  $_POST['fname'] != "" ? $_POST['fname'] : "";
    $lname =  $_POST['lname'] != "" ? $_POST['lname'] : "";
    $age =  $_POST['age'] != "" ? $_POST['age'] : "";
    $birthday =  $_POST['birthday'] != '' ? date('Y-m-d', strtotime($_POST['birthday'] . "-543 year")) : date("Y-m-d");
    $id_card =  $_POST['id_card'] != '' ? preg_replace('/[-]/i', '', $_POST['id_card']) : "";
    $phone_number =  $_POST['phone_number'] != "" ? $_POST['phone_number'] : "";
    $address =  $_POST['address'] != "" ? $_POST['address'] : "";
    $province_id =  $_POST['province_id'] != "" ? $_POST['province_id'] : "";
    $ampher_id =  $_POST['ampher_id'] != "" ? $_POST['ampher_id'] : "";
    $tumbon_id =  $_POST['tumbon_id'] != "" ? $_POST['tumbon_id'] : "";
    $education =  $_POST['education'] != "" ? $_POST['education'] : "";
    $pd_status =  $_POST['pd_status'] != "" ? $_POST['pd_status'] : "";
    $occupation =  $_POST['occupation'] != "" ? $_POST['occupation'] : "";
    $housing_type =  $_POST['housing_type'] != "" ? $_POST['housing_type'] : "";
    
    


    if (
        empty($title) || empty($fname) || empty($lname) || empty($address)
        || empty($ampher_id) || empty($tumbon_id) || empty($province_id) || empty($id_card)
        || empty($age) || empty($birthday)
        || empty($phone_number) || empty($education) || empty($pd_status) || empty($occupation) || empty($housing_type)
    ) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบกรุณาตรวจสอบ",
        ));
    } else {
        $query = $class->addelderly_model($title, $fname, $lname, $address, $ampher_id, $tumbon_id, $province_id, $id_card, 
        $age, $birthday, $phone_number,$education,$pd_status,$occupation,$housing_type);

        echo json_encode(array(
            "is_successful" => true,
            "message" => "ลงทะเบียนสำเร็จ",
        ));
    }
}
