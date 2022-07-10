<?php
require_once '../../config/database.php';

class dashboard extends Database_set
{

  public function personal()
  {
    $pd_id =  mysqli_query($this->dbcon, "SELECT * FROM personal_document  ");
    return $pd_id;
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
