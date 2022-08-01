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

// ส่วนของลงทะเบียน
if ($func == 'insert') {
    parse_str($_POST["frmdata"], $_POST);

    $pd_id =  $_POST['pd_id'] != "" ? $_POST['pd_id'] : NULL;
    $chk1 =  $_POST['chk1']!= "" ? $_POST['chk1'] : NULL;
    $chk2 =  $_POST['chk2'];
    $chk3 =  $_POST['chk3'] ;
    $chk4 =  $_POST['chk4'];
    $chk5 =  $_POST['chk5'];
    $chk6 =  $_POST['chk6'] ;
    if (empty($pd_id) || $chk1 == NULL) {
        echo json_encode(array(
            "is_successful" => false,
            "messchk3" => "เกิดข้อผิดพลาด",
        ));
    } else {
    $query = $class->save_form_cancer($pd_id, $chk1, $chk2, $chk3, $chk4, $chk5, $chk6);

    echo json_encode(array(
                "is_successful" => true,
                "messchk3" => "ประเมินความเสี่ยงโรคมะเร็งสำเร็จ",
            ));
        }
    }


