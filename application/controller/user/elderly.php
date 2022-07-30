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
// ส่วนของ Savedata
if ($func == 'insert') {
    $query = $class->save_formdata($_POST);
    if ($query == true) {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "บันทึกข้อมูลสำเร็จ",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบกรุณาตรวจสอบ",
        ));
    }
}
