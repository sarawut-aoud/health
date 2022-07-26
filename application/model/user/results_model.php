<?php
require_once  '../../config/database.php';


class results_model extends Database_set
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
    public function save_form_results($pd_id, $chk1, $chk2, $chk3, $chk4, $chk5, $chk6, $chk7, $chk8)
    {
       
        $result = mysqli_query($this->dbcon, "INSERT INTO estimate (pd_id, 	not_found, is_found, is_found_id, is_found_sub, is_sick, is_sick_id, is_sick_sub, operate)
        VALUES ('$pd_id','$chk1','$chk2','$chk3','$chk4','$chk5','$chk6','$chk7','$chk8')");

        return $result;
    }
    public function personal($pd_id)
    {
  //    $pd_id = $_REQUEST['pd_id'];
      $result = mysqli_query($this->dbcon, "SELECT *
          FROM
              personal_document pd
              LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
              LEFT JOIN user_status us ON us.id = uk.status_id
              LEFT JOIN darily_keep dk ON pd.pd_id = pd.pd_id
          WHERE
              pd.`status` = 'active' 
              AND pd.pd_id = '$pd_id'  
               ");
  
          return $result;
      
    }
    
  public function load_tumbon_info($tumbon)
  {
    if ($tumbon == '') {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_district ");
      return $result;
    } else {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_district WHERE district_id ='$tumbon' ");
      return $result;
    }
  }
  public function load_amphoe_info($amphoe)
  {
    if ($amphoe == '') {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe ");
      return $result;
    } else {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe WHERE amphoe_id ='$amphoe' ");
      return $result;
    }
  }
  public function load_province_info($province)
  {
    if ($province == '') {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_province ");
      return $result;
    } else {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_province WHERE province_id ='$province' ");
      return $result;
    }
  }
}
