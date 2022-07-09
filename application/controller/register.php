<?php
require '../model/register.php';

$class = new register();

$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $ampher_id = $_REQUEST['id'];

    $query = $class->load_tumbon($ampher_id);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "tumbon_id" => intval($row->district_id),
            "tumbon_name" => $row->district_name_local,
        );
        $i++;
    }
    echo json_encode($data);
}

if ($func == 'ampher') {
    $province_id = $_REQUEST['id'];

    $query = $class->load_ampher($province_id);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "ampher_id" => intval($row->amphoe_id),
            "ampher_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}

if ($func == 'province') {
    $query = $class->load_province('');

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "province_id" => intval($row->province_id),
            "province_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
