<?php
require_once '../../config/database.php';

class left_sidemodel  extends Database_set
{

    public function Get_application()
    {
        $app = $this->get_user();

        if (!empty($app)) {
            $row = $app->fetch_object();
            $result = mysqli_query($this->dbcon, "SELECT
            ap.application_name,
            ap.href_module ,
            us.user_rate
        FROM
            personal_document pd
            LEFT JOIN permission_status ps ON ps.pd_id = pd.pd_id
            LEFT JOIN `application` ap ON ap.id = ps.appplication_id
            LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
            LEFT JOIN user_status us ON us.id = uk.status_id 
        WHERE
            pd.`status` = 'active' 
            AND pd.pd_id = '$row->pd_id'
            AND us.user_rate = '$row->user_rate'
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
