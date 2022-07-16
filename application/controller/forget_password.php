<?php
require_once '../model/forget_pass_model.php';

$class = new forget_pass_model();

$func = $_REQUEST['func'];
if ($func == 'getuser') {
    $username = $_POST['frmdata'] != '' ? $_POST['frmdata'] : '';
    $phone_number = $_POST['frmdata'] != '' ? $_POST['frmdata'] : '';

    if (!empty($username) || !empty($phone_number)) {
        $sql = $class->get_username($username, $phone_number);
        if (!empty($sql)) {
            $row = $sql->fetch_object();
            if (!empty($row)) {
                echo json_encode(array(
                    'is_success' => true,
                    'message' => '',
                    'pd_id' => $row->pd_id
                ));
            } else {
                echo json_encode(array(
                    'is_success' => false,
                    'message' => 'ไม่พบผู้ใช้งาน หรือ เบอร์โทร นี้ในระบบ',
                ));
            }
        } else {
            echo json_encode(array(
                'is_success' => false,
                'message' => 'ไม่พบผู้ใช้งาน หรือ เบอร์โทร นี้ในระบบ',
            ));
        }
    }
}
if ($func == 'resetpass') {
    $password =   $_POST['password'] != "" ? $class->encode($_POST['password']) : "";
    $pd_id = $_POST['pd_id'];
    if (!empty($password) && !empty($pd_id)) {
        $sql = $class->reset_pass($password, $pd_id);
        if (!empty($sql)) {

            echo json_encode(array(
                'is_success' => true,
                'message' => 'เปลี่ยนรหัสผ่านสำเร็จ',
            ));
        } else {
            echo json_encode(array(
                'is_success' => false,
                'message' => 'เกิดข้อผิดพลาด',
            ));
        }
    }
}
