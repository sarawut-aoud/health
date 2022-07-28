<?php
require_once  '../../config/database.php';

class addelderly extends Database_set
{
    public function add_tumbon($ampher)
    {
        if ($ampher == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district WHERE amphoe_id ='$ampher' ");
            return $result;
        }
    }
    public function add_ampher($province = '')
    {
        if ($province == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe WHERE province_id ='$province' ");
            return $result;
        }
    }
    public function add_province()
    {

        $result = mysqli_query($this->dbcon, "SELECT * FROM system_province ");
        return $result;
    }
    public function Get_table()
    {
        $result = mysqli_query($this->dbcon, "SELECT *,
        CASE 
            WHEN title = 1 THEN 'นาย'
            WHEN title = 2 THEN 'นาง'
            WHEN title = 3 THEN 'นางสาว'
            END as title 
        FROM personal_document pd
      
        LEFT JOIN   user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id 
    WHERE
        pd.`status` = 'active'
        AND uk.status_id = '5' 
        AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
        ");
        return $result;
    }



    //? ตรวจร่างกายคัดกรอง
    public function save_formdata($post)
    {
        parse_str($_POST["frmdata"], $post);
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
        $education =  $_POST['education'] != "" ? $_POST['education'] : "";
        $pd_status =  $_POST['pd_status'] != "" ? $_POST['pd_status'] : "";
        $occupation =  $_POST['occupation'] != "" ? $_POST['occupation'] : "";
        $housing_type =  $_POST['housing_type'] != "" ? $_POST['housing_type'] : "";
    }


    /** สว่นของการลงทะเบียน */

    public function addelderly_model($title, $fname, $lname, $address, $ampher, $tumbon, $province, $id_card, $age, $birthday, $phone_number, $education, $pd_status, $occupation, $housing_type)
    {

        $result = mysqli_query($this->dbcon, "INSERT INTO personal_document (title, 
     first_name, 
     last_name, 
     address, 
     ampher_id, 
     tumbon_id, 
     province_id, 
     id_card, 
     age, 
     birthday, 
     phone_number,
     education,
     pd_status,
     occupation,
     type_live )
     VALUES ('$title',
     '$fname',
     '$lname',
     '$address',
     '$ampher',
     '$tumbon',
     '$province','$id_card','$age','$birthday','$phone_number','$education','$pd_status','$occupation','$housing_type')");

        $last_id = mysqli_insert_id($this->dbcon);
        $this->set_user($last_id);

        return $result;
    }

    private function set_user($last_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `user_status_keep` ( `pd_id`, `status_id`, `set_status` )
        VALUES
            ('$last_id','5','1') ");
        return $result;
    }
}
