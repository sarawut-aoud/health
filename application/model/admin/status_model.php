<?php
require_once '../../config/database.php';

class status_model extends Database_set
{

    public function Get_user()
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id 
    FROM
        user_status_keep uk
        INNER JOIN personal_document pd ON pd.pd_id = uk.pd_id
        INNER JOIN user_status us ON us.id = uk.status_id 
    WHERE
        pd.`status` = 'active' 
        AND us.user_rate NOT IN ( '5' ) AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  ) 
    
    GROUP BY
        pd.pd_id
    
        ");
        return $result;
    }
    public function Get_table()
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id,
        us.id
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
    public function Get_table_status($pd_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id,
        us.id,
        us.status_name
    FROM personal_document pd
      
        LEFT JOIN   user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id 
    WHERE
        pd.`status` = 'active' AND pd.pd_id = '$pd_id'
         AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    
        ");
        return $result;
    }
    public function Get_status($pd_id)
    {

        if (empty($pd_id)) {
            $result = mysqli_query($this->dbcon, "SELECT id , status_name
            FROM user_status 
    
            ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT
            us.id,
            us.status_name,
            (SELECT uk.status_id  FROM user_status_keep AS uk WHERE uk.status_id = us.id AND uk.pd_id  ='$pd_id') as check_id 
        FROM
            user_status AS us 
        GROUP BY
            us.id 
        ORDER BY
            us.id ASC
            ");
            return $result;
        }
    }

    public function save_form_status()
    {
    }

    public function delete_form_status($pd_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE  user_status_keep SET set_status = '1' WHERE pd_id ='$pd_id' AND status_id = '5' ");
        $result = mysqli_query($this->dbcon, "DELETE FROM user_status_keep WHERE pd_id ='$pd_id' AND status_id !='5' ");
        return $result;
    }
}
