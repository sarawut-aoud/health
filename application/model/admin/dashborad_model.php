<?php
require_once '../../config/database.php';

class dashboard_model extends Database_set
{

  public function get_table_1()
  {
    $result = mysqli_query($this->dbcon, "SELECT  
    CASE 
      WHEN pd.title = '1' THEN 'นาย'
      WHEN pd.title = '2' THEN 'นาง'
      WHEN pd.title = '3' THEN 'นางสาว'
    END AS title,
      CONCAT(pd.first_name,' ',pd.last_name) As fullname,
      pd.phone_number
    FROM personal_document pd
    LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
    LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE 
    pd.`status` = 'active' AND us.user_rate = '4' AND uk.set_status ='1'
    AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY 
        pd.pd_id 
    ");
    return $result;
  }


  public function get_table_2()
  {
    $result = mysqli_query($this->dbcon, "SELECT  
    CASE 
      WHEN pd.title = '1' THEN 'นาย'
      WHEN pd.title = '2' THEN 'นาง'
      WHEN pd.title = '3' THEN 'นางสาว'
    END AS title,
      CONCAT(pd.first_name,' ',pd.last_name) As fullname,
      pd.phone_number
    FROM personal_document pd
    LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
    LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE 
    pd.`status` = 'active' AND us.user_rate = '3' AND uk.set_status ='1'
    AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY 
        pd.pd_id ");
    return $result;
  }
  public function get_table_3()
  {
    $result = mysqli_query($this->dbcon, "SELECT  
    CASE 
      WHEN pd.title = '1' THEN 'นาย'
      WHEN pd.title = '2' THEN 'นาง'
      WHEN pd.title = '3' THEN 'นางสาว'
    END AS title,
      CONCAT(pd.first_name,' ',pd.last_name) As fullname,
      pd.phone_number
    FROM personal_document pd
    LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
    LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE 
    pd.`status` = 'active' AND us.user_rate = '2' AND uk.set_status ='1'
    AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY 
        pd.pd_id ");
    return $result;
  }
  public function get_table_4()
  {
    $result = mysqli_query($this->dbcon, "SELECT  
    CASE 
      WHEN pd.title = '1' THEN 'นาย'
      WHEN pd.title = '2' THEN 'นาง'
      WHEN pd.title = '3' THEN 'นางสาว'
    END AS title,
      CONCAT(pd.first_name,' ',pd.last_name) As fullname,
      pd.phone_number,
      pd.pd_id
    FROM personal_document pd
    LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
    LEFT JOIN user_status us ON us.id = uk.status_id
    WHERE 
    pd.`status` = 'active' AND us.user_rate = '1' AND uk.set_status ='1'
    AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
    GROUP BY 
        pd.pd_id ");
    return $result;
  }

  public function get_count_user($num)
  {
    $result = mysqli_query($this->dbcon, " SELECT COUNT(pd.pd_id) as pd_id
   
    FROM personal_document pd
     INNER JOIN user_status_keep uk ON uk.pd_id = pd.pd_id 
    INNER  JOIN user_status us ON us.id = uk.status_id
    WHERE 
    pd.`status` = 'active' AND us.user_rate = '$num' AND uk.set_status ='1'
    AND  pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )");
    return $result;
  }
}
