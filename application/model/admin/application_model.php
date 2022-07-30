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
        pd.`status` = 'active'  AND us.user_rate != '1image.png'
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
            ap.application_name,
            ( SELECT ps.appplication_id FROM permission_status AS ps WHERE ps.appplication_id = ap.id AND ps.pd_id = '$pd_id' ) AS check_id 
        FROM
            application AS ap 
        GROUP BY
            ap.id,
            check_id 
        ORDER BY
            ap.app_order ASC
            ");
            return $result;
        }
    }
    public function Get_table()
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id,
        ps.id,
        ap.application_name
    FROM personal_document pd
      
        LEFT JOIN   permission_status ps ON ps.pd_id = pd.pd_id
        LEFT JOIN application ap ON ap.id = ps.appplication_id
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
        LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE
        pd.`status` = 'active'  AND us.user_rate !='1'
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
        ps.id,
        ap.application_name
    FROM personal_document pd
      
        LEFT JOIN   permission_status ps ON ps.pd_id = pd.pd_id
        LEFT JOIN application ap ON ap.id = ps.appplication_id
    WHERE
        pd.`status` = 'active'  AND pd.pd_id = '$pd_id'
         AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
   
    
        ");
        return $result;
    }


    public function save_form_app($pd_id, $status_id)
    {
        $select = mysqli_query($this->dbcon, "SELECT pd_id ,appplication_id FROM permission_status WHERE pd_id = '$pd_id' ")->fetch_object();

        foreach ($status_id as $val) {
            if ($select->appplication_id != $val) {
                $result = mysqli_query($this->dbcon, "INSERT INTO permission_status(pd_id,appplication_id) VALUES ('$pd_id','$val')");
            }
        }
        return $result;
    }
    public function update_form_app($pd_id, $status_id)
    {
        if (!empty($status_id)) {

            $result = mysqli_query($this->dbcon, "DELETE FROM permission_status WHERE pd_id ='$pd_id'  ");
            if (!empty($result)) {
                $alter = mysqli_query($this->dbcon, "ALTER TABLE permission_status AUTO_INCREMENT =1");
                if (!empty($alter)) {
                    $select = mysqli_query($this->dbcon, "SELECT pd_id ,appplication_id FROM permission_status WHERE pd_id = '$pd_id' ")->fetch_object();

                    foreach ($status_id as $val) {
                        if ($select->appplication_id != $val) {
                            $result = mysqli_query($this->dbcon, "INSERT INTO permission_status(pd_id,appplication_id) VALUES ('$pd_id','$val')");
                        }
                    }
                }
            }
        } else {

            $result = mysqli_query($this->dbcon, "DELETE FROM permission_status WHERE pd_id ='$pd_id' ");
        }


        return 'success';
    }
    public function delete_form_app($pd_id)
    {
        $result = mysqli_query($this->dbcon, "DELETE FROM permission_status WHERE pd_id ='$pd_id'  ");
        return $result;
    }
}
