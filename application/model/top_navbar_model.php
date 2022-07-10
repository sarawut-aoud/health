<?php

require_once '../config/database.php';

class top_nav extends Database_set
{
    public function Get_status_position()
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
            AND uk.set_status = '1' 
        GROUP BY
            us.status_name
             ");
        }
        return $result;
    }
    public function change_status_position($id_set)
    {
        $app = $this->get_user();

        if (!empty($app)) {
            $row = $app->fetch_object();
            $get_old = $this->get_posiotion_old($row->pd_id);
            $get_row = $get_old->fetch_object();

            $result = mysqli_query($this->dbcon, "UPDATE  personal_document pd
            SET   us.set_status = '0'
            LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
            LEFT JOIN user_status us ON us.id = uk.status_id 
        WHERE
            pd.`status` = 'active' 
            AND pd.pd_id = '$row->pd_id' 
            AND uk.id = '$get_row->id'
       
             ");

            if (!empty($result)) {
                $results = mysqli_query($this->dbcon, "UPDATE  personal_document pd
                SET  us.set_status = '1'
                LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
                LEFT JOIN user_status us ON us.id = uk.status_id 
             WHERE
                pd.`status` = 'active' 
                AND pd.pd_id = '$row->pd_id' 
                AND uk.id = '$id_set'
       
             ");
            }
        }
        return $results;
    }

    private function get_posiotion_old($pd_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT
        pd.pd_id,
        uk.set_status,
        uk.id
    FROM
        personal_document pd
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE
        pd.`status` = 'active' 
        AND pd.pd_id = '$pd_id' 
        AND uk.set_status = '1'  
         ");
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
