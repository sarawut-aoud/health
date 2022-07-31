<?php
require_once  '../../config/database.php';


class cancer_model extends Database_set
{

    public function Get_user()
    {
        $result = mysqli_query($this->dbcon, "SELECT
        CONCAT( pd.first_name, ' ', pd.last_name ) AS fullname,
        pd.pd_id 
    FROM
        personal_document pd
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id
        LEFT JOIN health_kepp dk ON dk.pd_id = pd.pd_id
        LEFT JOIN estimate em ON em.pd_id = pd.pd_id
        LEFT JOIN cancer cc ON cc.pd_id = pd.pd_id 
    WHERE
        pd.`status` = 'active' 
        AND uk.status_id = '5' 
        AND dk.pd_id IS NOT NULL 
        AND cc.pd_id IS NULL 
        AND pd.pd_id NOT IN (
        SELECT
            MIN( pdid.pd_id ) 
        FROM
            personal_document AS pdid 
        ORDER BY
        pdid.pd_id ASC 
        )
        ");
        return $result;
    }
    public function save_form_cancer($pd_id, $chk1, $chk2, $chk3, $chk4, $chk5, $chk6)
    {

        $result = mysqli_query($this->dbcon, "INSERT INTO cancer (pd_id, alcohol, cancer_1, cancer_2, cancer_3, cancer_4, cancer_5 )
        VALUES ('$pd_id','$chk1','$chk2','$chk3','$chk4','$chk5','$chk6')");

        return $result;
    }
}
