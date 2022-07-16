<?php
require_once '../../model/user/results_model.php';


$class = new results_model();

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

// ส่วนของลงทะเบียน
if ($func == 'insert') {
    parse_str($_POST["frmdata"], $_POST);

    $pd_id =  $_POST['pd_id'] != "" ? $_POST['pd_id'] : "";
    $chk1 =  $_POST['chk1'] != "" ? $_POST['chk1'] : "";
    $chk2 =  $_POST['chk2'] != "" ? $_POST['chk2'] : "";
    $chk3 =  $_POST['chk3'] != "" ? $_POST['chk3'] : "";
    $chk4 =  $_POST['chk4'] != "" ? $_POST['chk4'] : "";
    $chk5 =  $_POST['chk5'] != "" ? $_POST['chk5'] : "";
    $chk6 =  $_POST['chk6'] != "" ? $_POST['chk6'] : "";
    $chk7 =  $_POST['chk7'] != "" ? $_POST['chk7'] : "";
    $chk8 =  $_POST['chk8'] != "" ? $_POST['chk8'] : "";
   
    $query = $class->save_form_results($pd_id, $chk1, $chk2, $chk3, $chk4, $chk5, $chk6, $chk7, $chk8);

    echo json_encode(array(
                "is_successful" => true,
                "messchk3" => "ลงทะเบียนสำเร็จ",
            ));
}


