<?php
require_once '../../config/database.php';

class application_model extends Database_set
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
         AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY
        pd.pd_id
    
        ");
        return $result;
    }
    public function Get_status($pd_id)
    {

        if (empty($pd_id)) {
            $result = mysqli_query($this->dbcon, "SELECT id ,  application_name
            FROM application 
    
            ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT
            ap.id,
            ap.application,
            (SELECT ps.application_id  FROM permission_status AS ps WHERE ps.application_id = ap.id AND ps.pd_id  ='$pd_id') as check_id 
        FROM
            application AS ap 
        GROUP BY
            ap.id ,check_id 
        ORDER BY
            ap.app_order ASC
            ");
            return $result;
        }
    }
}
