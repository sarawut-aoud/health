<?php
require '../config/database.php';

class register extends Database_set
{
    public function load_tumbon($ampher)
    {
        if ($ampher == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district WHERE amphoe_id ='$ampher' ");
            return $result;
        }
    }
    public function load_ampher($province = '')
    {
        if ($province == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe WHERE province_id ='$province' ");
            return $result;
        }
    }
    public function load_province()
    {

        $result = mysqli_query($this->dbcon, "SELECT * FROM system_province ");
        return $result;
    }

    /** สว่นของการลงทะเบียน */

    public function register_model($title, $fname, $lname, $address, $ampher, $tumbon, $province, $id_card, $username, $password, $age, $birthday, $phone_number)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO personal_document ( title, first_name, last_name, address, ampher_id, tumbon_id, province_id, id_card, username, `password`, age, birthday, phone_number )
        VALUES ('$title','$fname','$lname','$address','$ampher','$tumbon','$province','$id_card','$username','$password','$age','$birthday','$phone_number')");

        $last_id = mysqli_insert_id($this->dbcon);
       
        $this->set_user($last_id);

        return $result;
    }

    public function check_username($username)
    {

        $result = mysqli_query($this->dbcon, "SELECT username FROM personal_document WHERE username='$username' AND `status`='active' ");

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
