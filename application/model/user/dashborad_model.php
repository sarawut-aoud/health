<?php
require_once '../../config/database.php';

class dashboard extends Database_set
{

  public function personal()
  {
    $pd_id = $_SESSION['pd_id'];
    $result = mysqli_query($this->dbcon, "SELECT *
   
          
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
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_district WHERE amphoe_id  ='$tumbon' ");
      return $result;
    }
  }
  public function load_amphoe_info($amphoe)
  {
    if ($amphoe == '') {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe ");
      return $result;
    } else {
      $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe WHERE province_id ='$amphoe' ");
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

  public function check_username($username)
  {

    $result = mysqli_query($this->dbcon, "SELECT username FROM personal_document WHERE username='$username' AND `status`='active' ");

    return $result;
  }
  public function update_data($post)
  {
    parse_str($post["formdata"], $post);
    $pd_id = trim($post["pd_id"], "\0");
    $title = trim($post["title"], "\0");
    $fname = trim($post["fname"], "\0");
    $lname =  trim($post["lname"], "\0");
    $age = trim($post["age"], "\0");
    $birthday_set = trim($post["birthday"], "\0");
    $id_card_set = trim($post["id_card"], "\0");
    $phone_number_set = trim($post["phone_number"], "\0");
    $education = trim($post["education"], "\0");
    $type_live = trim($post["type_live"], "\0");
    $pd_status = trim($post["pd_status"], "\0");
    $occupation = trim($post["occupation"], "\0");
    $address = trim($post["address"], "\0");
    $province_id = trim($post["province_id"], "\0");
    $amher_id = trim($post["ampher_id"], "\0");
    $tumbon_id = trim($post["tumbon_id"], "\0");
    $password = trim($post["password-input"], "\0");
   
    if (
      !empty($pd_id) && !empty($title) &&  !empty($fname) && !empty($lname) && !empty($age) && !empty($birthday_set) && !empty($id_card_set)
      && !empty($phone_number_set)
      && !empty($education) && !empty($pd_status) && !empty($type_live) && !empty($occupation) && !empty($address)
      && !empty($province_id) && !empty($amher_id) && !empty($tumbon_id && !empty($password))
    ) {

      $id_card = preg_replace('/[-]/i', '', $id_card_set);
      $phone_number = preg_replace('/[-]/i', '', $phone_number_set);
      $birthday = date('Y-m-d', strtotime($birthday_set . "-543 year"));

      return  $this->addelderly_model($pd_id, $title, $fname, $lname, $address, $amher_id, $tumbon_id, $province_id, $id_card, $age, $birthday, $phone_number, $education, $pd_status, $occupation, $type_live, $password);
    }
  }
  private function addelderly_model($pd_id, $title, $fname, $lname, $address, $ampher, $tumbon, $province, $id_card, $age, $birthday, $phone_number, $education, $pd_status, $occupation, $housing_type, $password)
  {
    $pass = $this->encode($password);
    $result = mysqli_query($this->dbcon, "UPDATE `personal_document` SET 
    `title`='$title',`first_name`='$fname',`last_name`='$lname',`address`='$address',
    `ampher_id`='$ampher',`tumbon_id`='$tumbon',`province_id`='$province',`id_card`='$id_card',
    `password`='$pass',`age`='$age',`birthday`='$birthday',
    `phone_number`='$phone_number',`education`='$education',`pd_status`='$pd_status',`occupation`='$occupation',
    `type_live`='$housing_type' 
    WHERE `pd_id`= '$pd_id' ");

    return $result;
  }
}
