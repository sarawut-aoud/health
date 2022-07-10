<?php
require_once '../model/top_navbar_model.php';
$class = new top_nav();
$func = $_REQUEST['func'];
$pd_id = $_REQUEST['pd_id'];
if ($func == "change") {
    $id_set = $_REQUEST['btn_change_status'];

    $sql = $class->change_status_position($pd_id, $id_set);
    echo json_encode(array(
        'is_success' => true,
    ));
}

if ($func == "get") {

    $sql = $class->Get_status_position($pd_id);
    echo $sql;
}
