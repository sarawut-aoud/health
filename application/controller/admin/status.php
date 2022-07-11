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
