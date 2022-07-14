<?php
require_once '../../model/admin/application_model.php';

$class = new application_model();

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
            'application_name' => $row->application_name,
            'check_id' => $row->check_id,
        );
        $i++;
    }
    echo json_encode($data);
}