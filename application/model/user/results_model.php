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
        LEFT JOIN darily_keep dk ON dk.pd_id_hk = pd.pd_id
        LEFT JOIN estimate em ON em.pd_id = pd.pd_id
    WHERE
        pd.`status` = 'active'
        AND uk.status_id = '5' 
        AND em.pd_id IS NULL
        -- AND dk.pd_id_hk IS NOT NULL
        AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
        ");
    return $result;
  }
  public function save_form_results($pd_id, $chk1, $chk2 = NULL, $chk3 = NULL, $chk4 = NULL, $chk5 = NULL, $chk6 = NULL, $chk7 = NULL, $chk8 = NULL)
  {

    $result = mysqli_query($this->dbcon, "INSERT INTO estimate (pd_id, 	not_found, is_found, is_found_id, is_found_sub, is_sick, is_sick_id, is_sick_sub, operate)
        VALUES ('$pd_id','$chk1','$chk2','$chk3','$chk4','$chk5','$chk6','$chk7','$chk8')");

    return $result;
  }
  public function personal($pd_id)
  {
    //    $pd_id = $_REQUEST['pd_id'];
    $result = mysqli_query($this->dbcon, "SELECT *,
      CASE 
          WHEN 	pd_status = 1 THEN 'โสด'
          WHEN 	pd_status = 2 THEN 'มีคู่สมรส'
          WHEN 	pd_status = 3 THEN 'หม้าย'
          WHEN 	pd_status = 4 THEN 'หย่า'
          WHEN 	pd_status = 5 THEN 'แยกทาง'
          END as pd_status ,
      CASE 
          WHEN 	education = 1 THEN 'ประถม'
          WHEN 	education = 2 THEN 'มัธยมศึกษาตอนต้น'
          WHEN 	education = 3 THEN 'มัธยมศึกษาตอนปลาย'
          WHEN 	education = 4 THEN 'ปวช.'
          WHEN 	education = 5 THEN 'ปวส.'
          WHEN 	education = 6 THEN 'อนุปริญญา'
          WHEN 	education = 7 THEN 'ปริญญา'
          END as education,
      CASE 
          WHEN 	type_live = 1 THEN 'พักตรงกับทะเบียนบ้าน'
          WHEN 	type_live = 2 THEN 'ทะเบียนบ้านไปๆ มาๆ /ทำงานที่อื่น'
          WHEN 	type_live = 3 THEN 'ทะเบียนบ้านอยู่ที่อื่น แต่นอนที่บ้านหลังนี้'
          END as type_live,
      CASE 
          WHEN 	occupation = 1 THEN 'รับราชการ / รัฐวิสาหกิจ'
          WHEN 	occupation = 2 THEN 'รับจ้างทั่วไป'
          WHEN 	occupation = 3 THEN 'พนักงานเอกชน'
          WHEN 	occupation = 4 THEN 'อาชีพอิสระ / ค้าขาย'
          WHEN 	occupation = 5 THEN 'นักเรียน นิสิต นักศึกษา'
          WHEN 	occupation = 6 THEN 'เจ้าของธุรกิจ / ธุรกิจส่วนตัว'
          WHEN 	occupation = 7 THEN 'อื่น ๆ '
          END as occupation
         
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
