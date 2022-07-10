<?php
require '../../config/database.php';

class dashboard extends Database
{
  /**
   *     public function ชื่อ ฟังก์ชั่น ($uname){
   *          
   *        
   *       $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_farmer WHERE username = '$uname'  ");
   *      return $checkuser;
   *      }
   * */
  /**
   *     public function ชื่อ ฟังก์ชั่น (){
   *          
   *        
   *       $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_farmer ");
   *      return $checkuser;
    
   *      }
   * */
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

  public function select($type, $dataset = '')
  {
    require_once '../../core/data_utllities.php';
    if ($type == "title") {
      if (!empty($dataset)) {
          foreach ($title_name as $key => $val) {
              if ($dataset == $key) {
                  echo "<option selected value='$key'>$val</option>";
              } else {
                  echo "<option value='$key'>$val</option>";
              }
          }
      } else {
          echo  '<option value="" selected disabled>คำนำหน้า</option>';
          foreach ($title_name as $key => $val) {
              echo "<option value='$key'>$val</option>";
          }
      }
  }
  } 
}
