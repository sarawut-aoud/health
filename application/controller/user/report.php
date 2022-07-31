<?php
require_once '../../model/report_model.php';


$class = new report_model();
$func = $_REQUEST['function'];

if ($func == 'not_found') {
    $query = $class->risk('not_found');

    $row = $query->fetch_object();
    $data = array(
        'row' => $row->num != "0" ? $row->num . " คน" : "- คน"
    );

    echo json_encode($data);
}
if ($func == 'is_found') {
    $query = $class->risk('is_found');

    $row = $query->fetch_object();
    $data = array(
        'row' => $row->num != "0" ? $row->num . " คน" : "- คน"
    );

    echo json_encode($data);
}
if ($func == 'is_sick') {
    $query = $class->risk('is_sick');

    $row = $query->fetch_object();
    $data = array(
        'row' => $row->num != "0" ? $row->num . " คน" : "- คน"
    );

    echo json_encode($data);
}
