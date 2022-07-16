<?php
require_once '../../model/user/cancer_model.php';


$class = new cancer_model();

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

// if ($_POST['func'] == 'insert') {
//     parse_str($_POST["frmdata"], $_POST);
//     $pd_id = $_POST['pd_id'];
//     $status_id = $_POST['status_name'];

//     if (empty($pd_id)) {
//         echo json_encode(array(
//             "is_successful" => false,
//             "message" => "กรุณาเลือกข้อมูล",
//         ));
//     } else {


