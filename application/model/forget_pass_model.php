<?php
require '../config/database.php';

class forget_pass_model extends Database_set
{
    public function get_username($username, $phone_number)
    {
        $sql = $this->check_admin($username);
        $row = $sql->fetch_object();
        if ($row->username == "admin") {
            return false;
        } else {

            $result = mysqli_query($this->dbcon, "SELECT pd_id,username , phone_number FROM personal_document 
        WHERE 
         username = '$username' 
         OR phone_number = '$phone_number'
         AND `status`='active'  
        ");
            return $result;
        }
    }
    private function check_admin($username)
    {
        $result = mysqli_query($this->dbcon, "SELECT username FROM personal_document 
        WHERE 
         username = '$username' 
         AND `status`='active'  
        ");
        return $result;
    }
    public function reset_pass($password, $pd_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE  personal_document SET password = '$password'
        WHERE pd_id = '$pd_id'
        ");
        return $result;
    }
}
