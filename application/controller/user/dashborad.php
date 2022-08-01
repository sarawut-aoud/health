<?php
require_once '../../model/user/dashborad_model.php';

$class = new dashboard();


// ส่สวนของ Select tombon ampher porvince


$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $tumbon = $_REQUEST['id'];

    $query = $class->load_tumbon_info($tumbon);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i]  = array(
            "tumbon_id" => intval($row->district_id),
            "tumbon_name" => $row->district_name_local,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'province') {
    $province = $_REQUEST['id'];
    $query = $class->load_province_info($province);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i]  = array(
            "province_id" => intval($row->province_id),
            "province_name" => $row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'ampher') {
    $amphoe = $_REQUEST['id'];
    $query = $class->load_amphoe_info($amphoe);

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
