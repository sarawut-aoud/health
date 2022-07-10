<?php
require '../../config/database.php';

class addelderly extends Database
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

    // /** สว่นของการลงทะเบียน */

    // public function register_model($title, $fname, $lname, $address, $ampher, $tumbon, $province, $id_card, $username, $password, $age, $birthday, $phone_number)
    // {

    //     $result = mysqli_query($this->dbcon, "INSERT INTO personal_document ( title, first_name, last_name, address, ampher_id, tumbon_id, province_id, id_card, username, `password`, age, birthday, phone_number )
    //     VALUES ('$title','$fname','$lname','$address','$ampher','$tumbon','$province','$id_card','$username','$password','$age','$birthday','$phone_number')");
    //     return $result;
    // }

    // public function check_username($username)
    // {

    //     $result = mysqli_query($this->dbcon, "SELECT username FROM personal_document WHERE username='$username' ");

    //     return $result;
    // }
}
