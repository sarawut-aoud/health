<?php
require_once '../../model/user/dashborad_model.php';

$class = new dashboard();


// ส่สวนของ Select tombon ampher porvince


$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $tumbon = $_REQUEST['id'];

    $query = $class->load_tumbon_info($tumbon);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i]  = array(
            "tumbon_id" => intval($row->district_id),
            "tumbon_name" => $row->district_name_local,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'province') {
    $province = $_REQUEST['id'];
    $query = $class->load_province_info($province);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i]  = array(
            "province_id" => intval($row->province_id),
            "province_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'ampher') {
    $amphoe = $_REQUEST['id'];
    $query = $class->load_amphoe_info($amphoe);

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

if ($func == 'update') {
    $query = $class->update_data($_POST);
    if ($query == true) {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "อัพเดตข้อมูลส่วนตัวสำเร็จ",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบกรุณาตรวจสอบ",
        ));
    }
}
