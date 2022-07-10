<?php
require_once '../../config/database.php';

class user_change extends Database
{
    public function Get_status_name()
    {
        $app = $this->get_user();

        if (!empty($app)) {
            $row = $app->fetch_object();
            $result = mysqli_query($this->dbcon, "SELECT
            us.status_name, 
            us.id 
        FROM
            personal_document pd
            LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
            LEFT JOIN user_status us ON us.id = uk.status_id 
        WHERE
            pd.`status` = 'active' 
            AND pd.pd_id = '$row->pd_id' 
        GROUP BY
            us.status_name
             ");
        }
        return $result;
    }

    private function get_user()
    {
        $pd_id = $_SESSION['pd_id'];
        $result = mysqli_query($this->dbcon, "SELECT
            pd.pd_id,
            us.user_rate
        FROM
            personal_document pd
            LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
            LEFT JOIN user_status us ON us.id = uk.status_id
        WHERE
            pd.`status` = 'active' 
            AND pd.pd_id = '$pd_id'  
             ");
        return $result;
    }
}
