<?php
require_once '../../model/admin/dashborad_model.php';

$class = new dashboard_model();

$num = $_REQUEST['data'];
$set =  $_REQUEST['set'];

if ($set == '1') {
    $sql = $class->get_count_user($num);

    while ($row = $sql->fetch_object()) {
        $data = array(
            'num' => $row->pd_id,
        );
    }

    echo json_encode($data);
}
if ($set == '3') {
    $sql = $class->get_count_user($num);

    while ($row = $sql->fetch_object()) {
        $data = array(
            'num' => $row->pd_id,
        );
    }

    echo json_encode($data);
}
if ($set == '2') {
    $sql = $class->get_count_user($num);

    while ($row = $sql->fetch_object()) {
        $data = array(
            'num' => $row->pd_id,
        );
    }

    echo json_encode($data);
}
if ($set == '4') {
    $sql = $class->get_count_user($num);

    while ($row = $sql->fetch_object()) {
        $data = array(
            'num' => $row->pd_id,
        );
    }

    echo json_encode($data);
}
