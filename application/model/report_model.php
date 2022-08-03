<?php
require '../../config/database.php';

class report_model extends Database_set
{
    public function set_report($pd_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT
        pd.first_name,
        us.status_name,
        us.user_rate 
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
    public function get_table($sql = "")
    {
        $where = '';
        if ($sql != "") {
            $where = "AND pd.pd_id = '$sql'";
        }
        $result = mysqli_query($this->dbcon, "SELECT  
        CASE 
          WHEN pd.title = '1' THEN 'นาย'
          WHEN pd.title = '2' THEN 'นาง'
          WHEN pd.title = '3' THEN 'นางสาว'
        END AS title,
          CONCAT(pd.first_name,' ',pd.last_name) As fullname,
          pd.phone_number,
          pd.pd_id,
          hk.date
        FROM  health_kepp hk
        LEFT JOIN personal_document pd ON pd.pd_id = hk.pd_id
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
        LEFT JOIN user_status us ON us.id = uk.status_id
				LEFT JOIN cancer cc ON cc.pd_id = pd.pd_id
				LEFT JOIN estimate em ON em.pd_id = pd.pd_id
        WHERE  
        pd.`status` = 'active' AND us.user_rate = '1' AND uk.set_status ='1' AND hk.hk_id IS NOT NULL  $where
         AND em.em_id IS NOT NULL AND  cc.cc_id IS NOT NULL
        AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
            pdid.pd_id ASC  )
        GROUP BY 
            pd.pd_id ");
        return $result;
    }
    // ส่วนของ การแสดงผล ประเมินความเสี่ยง
    public function risk($stm)
    {
        if ($stm == 'not_found') {
            $sql = "AND em.not_found = '0' ";
        } else if ($stm == 'is_found') {
            $sql = "AND em.is_found = '0' ";
        } else if ($stm == 'is_sick') {
            $sql = "AND em.is_sick = '0' ";
        }
        $result = mysqli_query($this->dbcon, "SELECT COUNT(hk.hk_id)  AS num
        FROM  health_kepp hk
        LEFT JOIN personal_document pd ON pd.pd_id = hk.pd_id
        LEFT JOIN  estimate em ON em.pd_id = hk.pd_id
        LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id
        WHERE  pd.`status` = 'active'
         AND us.user_rate = '1'  $sql
        ");
        return $result;
    }
}
