<?php
require_once  '../../config/database.php';


class cancer_model extends Database_set
{

    public function Get_user()
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id
    
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
    
    // public function save_form_status($pd_id, $status_id)
    // {
    //     $select = mysqli_query($this->dbcon, "SELECT pd_id ,status_id FROM user_status_keep WHERE pd_id = '$pd_id' ")->fetch_object();

    //     foreach ($status_id as $val) {
    //         if ($select->status_id != $val) {
    //             $result = mysqli_query($this->dbcon, "INSERT INTO user_status_keep(pd_id,status_id) VALUES ('$pd_id','$val')");
    //         }
    //     }
    //     return $result;
    // }
}
