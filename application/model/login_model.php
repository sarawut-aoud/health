<?php
require '../config/database.php';

class login_model extends Database_set
{
    public function login($username, $password, $phone_number)
    {

        $check = $this->check_login($username, $password, $phone_number);
        if (!empty($check)) {
            $result = $check->fetch_object();
            $login = mysqli_query($this->dbcon, "SELECT
                pd.pd_id,
                pd.title,
                pd.first_name,
                pd.last_name,
                pd.address,
                pd.ampher_id,
                pd.tumbon_id,
                pd.province_id,
                pd.id_card,
                pd.phone_number,
                us.user_rate
               
            FROM
                personal_document pd
                LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
                LEFT JOIN user_status us ON us.id = uk.status_id
            WHERE
                pd.`status` = 'active' 
                AND pd.username = '$result->username' 
                AND pd.pd_id = '$result->pd_id'  
             
                 ");

            if (!empty($login)) {
                $row = $login->fetch_object();
                session_start();
                $_SESSION['title'] = $row->title;
                $_SESSION['pd_id'] = $row->pd_id;
                $_SESSION['first_name'] = $row->first_name;
                $_SESSION['last_name'] = $row->last_name;
                $_SESSION['address'] = $row->address;
                $_SESSION['phone_number'] = $row->phone_number;
                $_SESSION['id_card'] = $row->id_card;
                $_SESSION['ampher_id'] = $row->ampher_id;
                $_SESSION['tumbon_id'] = $row->tumbon_id;
                $_SESSION['province_id'] = $row->province_id;

                if ($row->user_rate == '5') {
                    $module = "application/view/admin/menu.php";
                    $_SESSION['permission'] = 'admin';
                } else {
                    $module = 'application/view/user/menu.php';
                    $_SESSION['permission'] = 'user';
                }

                if (isset($module)) {
                    $this->Get_application($row->pd_id, $row->user_rate);
                    return json_encode(array(
                        "is_successful" => true,
                        "message" => "ล็อกอินสำเร็จ",
                        "path" => $module,
                    ));
                }
            } else {
                return json_encode(array(
                    "is_successful" => false,
                    "message" => "ไม่พบผู้ใช้งาน",
                    "path" => '#',
                ));
            }
        }
        return  json_encode(array(
            "is_successful" => false,
            "message" => "กรอกชื่อเข้าใช้งานผิด หรือ กรอกรหัสผ่านผิด",
        ));
    }
    private function check_login($username, $pass, $phone_number)
    {

        $password = $this->encode($pass);
        $get_password = $this->Get_password($username, $phone_number);

        if ($password == $get_password->password) {

            $result = mysqli_query($this->dbcon, "SELECT username , pd_id ,phone_number
            FROM personal_document 
            WHERE `status`='active' 
            AND username = '$username' OR phone_number = '$phone_number'
            AND `password` = '$get_password->password'
            ");
        }


        return $result;
    }

    private function Get_password($username, $phone_number)
    {
        $result = mysqli_query($this->dbcon, "SELECT `password`
        FROM personal_document 
        WHERE `status`='active' 
        AND username = '$username' OR phone_number = '$phone_number'
         ")->fetch_object();
        return $result;
    }

    private function Get_application($pd_id, $rate)
    {

        $result = mysqli_query($this->dbcon, "SELECT
       
        ap.application_name,
        ap.href_module 
    FROM
        personal_document pd
        LEFT JOIN permission_status ps ON ps.pd_id = pd.pd_id
        LEFT JOIN application ap ON ap.id = ps.appplication_id
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id 
    WHERE
        pd.`status` = 'active' 
        AND pd.pd_id = '$pd_id'
        AND us.user_rate = '$rate'
         ");
        return $result;
    }
}
