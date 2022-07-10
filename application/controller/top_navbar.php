<?php
require '../model/top_navbar_model.php';
$class = new top_nav();
$func = $_REQUEST['func'];

if ($func == "change") {
    $id_set = $_REQUEST['btn_change_status'];
    $sql = $class->change_status_position($id_set);
    echo json_encode(array(
        'is_success' => true,
    ));
}
if ($func == "get") {
    $sql = $class->Get_status_position();
    $row = $sql->fetch_object();
    echo json_encode(array(
        'status' => $row->status_name,
        'is_success' => true,
    ));
}
