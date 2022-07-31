<?php
require_once '../../config/database.php';

class dashboard extends Database_set
{

  public function personal()
  {
    $pd_id = $_SESSION['pd_id'];
    $result = mysqli_query($this->dbcon, "SELECT *,
    CASE 
        WHEN title = 1 THEN 'นาย'
        WHEN title = 2 THEN 'นาง'
        WHEN title = 3 THEN 'นางสาว'
        END as title 
          
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
