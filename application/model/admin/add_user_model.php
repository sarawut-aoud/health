<?php
require_once  '../../config/database.php';

class addusermodel extends Database_set
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
        AND uk.set_status ='1' 
        AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY 
        pd.pd_id
        ");
        return $result;
    }
    /** ส่วนของเรียกข้อมูลไปแสดงก่อน  update */
    public function get_user($pd_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT  
        pd.title,
        pd.pd_id,
       pd.first_name,
       pd.last_name,
       pd.age,
       pd.birthday,
       pd.id_card,
       pd.phone_number,
       pd.address,
       pd.ampher_id,
       pd.tumbon_id,
       pd.province_id,
       pd.username,
        uk.status_id
       FROM personal_document pd
       LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id

       WHERE pd.pd_id = '$pd_id' AND pd.`status` = 'active'
    GROUP BY
        pd.pd_id    
        ");
        return $result;
    }

    /** สว่นของการเพิ่มข้อมูลผู้ใช้ */

    public function add_user($title, $fname, $lname, $age, $birthday, $address, $ampher, $tumbon, $province, $id_card,  $phone_number, $status_id, $username, $password)
    {

        $result = mysqli_query($this->dbcon, "INSERT INTO personal_document (title, first_name, last_name, age,birthday ,address, ampher_id, tumbon_id, province_id, id_card,  phone_number,username,password )
        VALUES ('$title','$fname','$lname',' $age','$birthday','$address','$ampher','$tumbon','$province','$id_card','$phone_number','$username','$password')");

        $last_id = mysqli_insert_id($this->dbcon);
        $this->set_user($last_id, $status_id);
        $this->set_application($last_id, $status_id);

        return $result;
    }

    public function update_user($pd_id, $title, $fname, $lname, $age, $birthday, $address, $ampher, $tumbon, $province, $id_card,  $phone_number, $status_id, $password)
    {
        $this->setupdate_user($pd_id, $status_id, '1');
        $result = mysqli_query($this->dbcon, "UPDATE `personal_document` SET `title`='$title',`first_name`='$fname',`last_name`='$lname',`address`='$address',
        `ampher_id`='$ampher',`tumbon_id`='$tumbon',`province_id`='$province',`id_card`=' $id_card',
        `password`='$password',`age`='$age',`birthday`='$birthday',`phone_number`='$phone_number'
         WHERE pd_id = '$pd_id'
        ");

        return $result;
    }
    public function delete_user($pd_id)
    {
        $this->setupdate_user($pd_id, '', '2');
        $result = mysqli_query($this->dbcon, "UPDATE `personal_document` SET `status`='inactive' WHERE pd_id = '$pd_id'
       
        ");

        return $result;
    }
    public function Get_status()
    {

        $result = mysqli_query($this->dbcon, "SELECT id , status_name
            FROM user_status 
    
            ");
        return $result;
    }
    private function setupdate_user($pd_id, $status_id, $stm)
    {
        if ($stm == '1') {
            $results = mysqli_query($this->dbcon, "UPDATE `user_status_keep` SET  `status_id`  ='$status_id' WHERE pd_id = '$pd_id') ");
        } else {
            $results = mysqli_query($this->dbcon, "DELETE FROM  `user_status_keep` WHERE pd_id = '$pd_id'");
            if ($results) {
                $results_2 = mysqli_query($this->dbcon, "DELETE FROM  `permission_status` WHERE pd_id = '$pd_id'");
            }
        }
        return $results_2;
    }
    private function set_user($last_id, $status_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `user_status_keep` ( `pd_id`, `status_id`, `set_status` )
        VALUES
            ('$last_id','$status_id','1') ");
        return $result;
    }
    private function set_application($last_id, $status_id)
    {

        if ($status_id == '1') {
            $result = mysqli_query($this->dbcon, "SELECT id  FROM application   ");
            while ($row = $result->fetch_object()) {

                $add_app = $this->set_userapp($last_id, $row->id);
            }
        }
        if ($status_id == '2') {
            $result = mysqli_query($this->dbcon, "SELECT id  FROM application WHERE id = '7'   ");

            while ($row = $result->fetch_object()) {

                $add_app = $this->set_userapp($last_id, $row->id);
            }
        }
        if ($status_id == '3') {
            $result = mysqli_query($this->dbcon, "SELECT id  FROM application WHERE id NOT IN   ('7')   ");

            while ($row = $result->fetch_object()) {

                $add_app = $this->set_userapp($last_id, $row->id);
            }
        }
        if ($status_id == '4') {

            $result = mysqli_query($this->dbcon, "SELECT id  FROM application WHERE id NOT IN   ( '7','5')   ");

            while ($row = $result->fetch_object()) {

                $add_app = $this->set_userapp($last_id, $row->id);
            }
        }
        return $add_app;
    }


    private function set_userapp($last_id, $id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `permission_status` ( `pd_id`, `appplication_id`)
        VALUES ('$last_id','$id') ");
        return $result;
    }
}
