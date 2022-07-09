<?php
require '../../model/user/dashborad_model.php';



$class = new dashboard();


// ส่สวนของ Select tombon ampher porvince


$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $tumbon = $_REQUEST['tumbon'];

    $query = $class->load_tumbon_info($tumbon);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data = array(
            "tumbon_id" => intval($row->district_id),
            "tumbon_name" => $row->district_name_local,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'province') {
    $province =$_REQUEST['province'];
    $query = $class->load_province_info($province);
    
    $i = 0;
    while($row = $query->fetch_object()){
        $data = array(
            "province_id" =>intval($row->province_id),
            "province_name"=>$row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'amphoe') {
    $amphoe =$_REQUEST['amphoe'];
    $query = $class->load_amphoe_info($amphoe);
    
    $i = 0;
    while($row = $query->fetch_object()){
        $data = array(
            "amphoe_id" =>intval($row->amphoe_id),
            "amphoe_name"=>$row->nameTh,
        );
        $i++;
    }
    echo json_encode($data);
}
