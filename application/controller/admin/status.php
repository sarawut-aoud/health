<?php
require_once '../../model/admin/status_model.php';

$class = new status_model();

$func = $_REQUEST['func'];

if ($func == 'getuser') {
    $sql = $class->Get_user();
    $i = 0;
    while ($row = $sql->fetch_object()) {
        $data[$i] = array(
            'pd_id' => $row->pd_id,
            'fullname' => $row->fullname,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'getdata') {
    $pd_id = $_REQUEST['pd_id'];
    $sql = $class->Get_status($pd_id);
    $i = 0;
    while ($row = $sql->fetch_object()) {
        $data[$i] = array(
            'id' => $row->id,
            'status_name' => $row->status_name,
            'check_id' => $row->check_id,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'insert') {
    parse_str($_POST["frmdata"], $_POST);
    $pd_id = $_POST['pd_id'];
    $status_id = $_POST['status_name'];
    if (empty($pd_id) || empty($status_id)) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรุณาเลือกข้อมูล",
        ));
    } else {
        $sql = $class->save_form_status($pd_id, $status_id);
        if (!empty($sql)) {
            echo json_encode(array(
                "is_successful" => true,
                "message" => "บันทึกข้อมูลสำเร็จ",
            ));
        } else {
            echo json_encode(array(
                "is_successful" => false,
                "message" => "เกิดข้อผิดพลาด",
            ));
        }
    }
}
if ($func == 'update') {
}
if ($func == 'delete') {
    $pd_id = $_REQUEST['pd_id'];
    $sql = $class->delete_form_status($pd_id);
    if (!empty($sql)) {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "ลบข้อมูลสำเร็จ",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "เกิดข้อผิดพลาด",
        ));
    }
}
