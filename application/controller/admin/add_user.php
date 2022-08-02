<?php
require_once '../../model/admin/add_user_model.php';

$class = new addusermodel();

$func = $_REQUEST['func'];

if ($func == 'tumbon') {
    $ampher_id = $_REQUEST['id'];

    $query = $class->add_tumbon($ampher_id);

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

    $query = $class->add_ampher($province_id);

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
    $query = $class->add_province('');

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

if ($func == 'getstatus') {
    $query = $class->Get_status();

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "status_name" => $row->status_name,
        );
        $i++;
    }
    echo json_encode($data);
}

if ($func == 'getuserfor_table') {
    $pd_id = $_REQUEST['pd_id'];
    $query = $class->get_user($pd_id);

    $i = 0;
    while ($row = $query->fetch_object()) {
        $data = array(
            "title" => $row->title,
            "pd_id" => intval($row->pd_id),
            "first_name" => $row->first_name,
            "last_name" => $row->last_name,
            "age" => $row->age,
            "birthday" => $row->birthday,
            "id_card" => $row->id_card,
            "phone_number" => $row->phone_number,
            "address" => $row->address,
            "ampher_id" => $row->ampher_id,
            "tumbon_id" => $row->tumbon_id,
            "province_id" => $row->province_id,
            "username" => $row->username,
            "password" => $row->password,
            "status_id" => $row->status_id,
        );
        $i++;
    }
    echo json_encode($data);
}
if ($func == 'insert') {
    parse_str($_POST["formdata"], $_POST);
    $title =  $_POST['title'] != "" ? $_POST['title'] : "";
    $fname =  $_POST['fname'] != "" ? $_POST['fname'] : "";
    $lname =  $_POST['lname'] != "" ? $_POST['lname'] : "";
    $age =  $_POST['age'] != "" ? $_POST['age'] : "";
    $birthday =  $_POST['birthday'] != '' ? date('Y-m-d', strtotime($_POST['birthday'] . "-543 year")) : date("Y-m-d");
    $id_card =  $_POST['id_card'] != '' ? preg_replace('/[-]/i', '', $_POST['id_card']) : "";
    $phone_number =  $_POST['phone_number'] != "" ? $_POST['phone_number'] : "";
    $address =  $_POST['address'] != "" ? $_POST['address'] : "";
    $province_id =  $_POST['province_id'] != "" ? $_POST['province_id'] : "";
    $ampher_id =  $_POST['ampher_id'] != "" ? $_POST['ampher_id'] : "";
    $tumbon_id =  $_POST['tumbon_id'] != "" ? $_POST['tumbon_id'] : "";
    $username = $_POST['username'] != "" ? $_POST['username'] : "";
    $password =   $_POST['password-input'] != "" ? $class->encode($_POST['password-input']) : "";
    $status_id =   $_POST['status_id'] != "" ? $_POST['status_id'] : "";

    if (
        empty($title) || empty($fname) || empty($lname) || empty($address)
        || empty($ampher_id) || empty($tumbon_id) || empty($province_id) || empty($id_card)
        || empty($username) || empty($password) || empty($age) || empty($birthday)
        || empty($phone_number) || empty($status_id)
    ) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบ",
        ));
    } else {

        $sql = $class->add_user(
            $title,
            $fname,
            $lname,
            $age,
            $birthday,
            $address,
            $ampher_id,
            $tumbon_id,
            $province_id,
            $id_card,
            $phone_number,
            $status_id,
            $username,
            $password
        );
        if (!empty($sql)) {
            echo json_encode(array(
                "is_successful" => true,
                "message" => "บันทึกข้อมูลสำเร็จ",
            ));
        } else {
            echo json_encode(array(
                "is_successful" => false,
                "message" => "เกิดข้อผิดพลาด",
            ));
        }
    }
}
if ($func == 'update') {
    parse_str($_POST["formdata"], $_POST);
    $pd_id = $_POST['pd_id'];
    $title =  $_POST['title'] != "" ? $_POST['title'] : "";
    $fname =  $_POST['fname'] != "" ? $_POST['fname'] : "";
    $lname =  $_POST['lname'] != "" ? $_POST['lname'] : "";
    $age =  $_POST['age'] != "" ? $_POST['age'] : "";
    $birthday =  $_POST['birthday'] != '' ? date('Y-m-d', strtotime($_POST['birthday'] . "-543 year")) : date("Y-m-d");
    $id_card =  $_POST['id_card'] != '' ? preg_replace('/[-]/i', '', $_POST['id_card']) : "";
    $phone_number =  $_POST['phone_number'] != "" ? $_POST['phone_number'] : "";
    $address =  $_POST['address'] != "" ? $_POST['address'] : "";
    $province_id =  $_POST['province_id'] != "" ? $_POST['province_id'] : "";
    $ampher_id =  $_POST['ampher_id'] != "" ? $_POST['ampher_id'] : "";
    $tumbon_id =  $_POST['tumbon_id'] != "" ? $_POST['tumbon_id'] : "";
    $username = $_POST['username'] != "" ? strtolower($_POST['username']) : "";
    $password =   $_POST['password-input'] != "" ? $class->encode($_POST['password-input']) : "";
    $status_id =   $_POST['status_id'] != "" ? $_POST['status_id'] : "";


    if (
        empty($title) || empty($fname) || empty($lname) || empty($address)
        || empty($ampher_id) || empty($tumbon_id) || empty($province_id) || empty($id_card)
        || empty($username) || empty($password) || empty($age) || empty($birthday)
        || empty($phone_number) || empty($status_id)
    ) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "กรอกข้อมูลไม่ครบ",
        ));
    } else {

        $sql = $class->update_user(
            $pd_id,
            $title,
            $fname,
            $lname,
            $age,
            $birthday,
            $address,
            $ampher_id,
            $tumbon_id,
            $province_id,
            $id_card,
            $phone_number,
            $status_id,
            $password
        );
        if (!empty($sql)) {
            echo json_encode(array(
                "is_successful" => true,
                "message" => "บันทึกข้อมูลสำเร็จ",
            ));
        } else {
            echo json_encode(array(
                "is_successful" => false,
                "message" => "เกิดข้อผิดพลาด",
            ));
        }
    }
}
if ($func == 'delete') {
    $pd_id = $_REQUEST['pd_id'];
    $sql = $class->delete_user($pd_id);
    if (!empty($sql)) {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "ลบข้อมูลสำเร็จ",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "เกิดข้อผิดพลาด",
        ));
    }
}
// ส่วนของการเช็ค username
if ($func == 'username_check') {

    $username = $_REQUEST['username_check'];
    $query = $class->check_username($username);

    $row = $query->fetch_object();
    if (!empty($row)) {
        echo json_encode(array(
            "is_successful" => false,
            "message" => "**********  ชื่อเข้าใช้งานซ้ำ **********",
        ));
    } else {
        echo json_encode(array(
            "is_successful" => true,
            "message" => "",
        ));
    }
}
