<?php
require_once  '../../config/database.php';


class results_model extends Database_set
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
    LEFT JOIN cancer cc ON cc.pd_id = pd.pd_id 
    LEFT JOIN estimate em ON em.pd_id = pd.pd_id
  WHERE
    pd.`status` = 'active' 
    AND uk.status_id = '5' 
    AND cc.pd_id IS NOT NULL 
    AND dk.pd_id IS NOT NULL 
    AND em.pd_id IS  NULL
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
  public function save_form_results($pd_id, $chk1, $chk2 , $chk3 , $chk4 , $chk5 , $chk6 , $chk7 , $chk8)
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
          END as occupation,
      CASE 
          WHEN 	birth = 0 THEN ''
          WHEN 	birth = 1 THEN 'โสด(รวมนักเรียน/นักศึกษา)'
          WHEN 	birth = 2 THEN 'ไม่ได้คุมต้องการบุตร'
          WHEN 	birth = 3 THEN 'ยาคุมกิน'
          WHEN 	birth = 4 THEN 'ยาคุมฉีด'
          WHEN 	birth = 5 THEN 'ยาฝัง'
          WHEN 	birth = 6 THEN 'ถุงยาง'
          WHEN 	birth = 7 THEN 'ทำหมันชาย'
          WHEN 	birth = 8 THEN 'ทำหมันหญิง'
          WHEN 	birth = 9 THEN 'สามีหรือภรรยาคุมกกำเนิดแทน'
          WHEN 	birth = 10 THEN 'อื่นๆ '
          END as birth,
      CASE 
          WHEN 	symptom1 = 0 THEN 'มี'
          WHEN 	symptom1 = 1 THEN 'บ่อมี๊'
          END as symptom1,
      CASE 
          WHEN 	symptom2 = 0 THEN 'มี'
          WHEN 	symptom2 = 1 THEN 'บ่อมี๊'
          END as symptom2,
      CASE 
          WHEN 	veget = 0 THEN '0-1 วันต่อสัปดาห์'
          WHEN 	veget = 1 THEN '3-6 วันต่อสัปดาห์'
          WHEN 	veget = 2 THEN '7 วันต่อสัปดาห์'
          END as veget,
      CASE 
          WHEN 	condiment = 0 THEN 'ไม่เติม'
          WHEN 	condiment = 1 THEN 'เติมบางครั้ง'
          WHEN 	condiment = 2 THEN 'เติมทุกครั้ง'
          END as condiment,
      CASE 
          WHEN 	sweet = 0 THEN 'ไม่เติม'
          WHEN 	sweet = 1 THEN 'เติมบางครั้ง'
          WHEN 	sweet = 2 THEN 'เติมทุกครั้ง/ดื่มทุกวัน'
          END as sweet,
      CASE 
          WHEN 	exercise = 0 THEN 'ไม่ออกกำลังกายหรือออกกำลังกายไม่ถึงวันละ 30 นาที'
          WHEN 	exercise = 1 THEN 'ออกกำลังกายวันละ 30 นาทีแต่ไม่ถึง 5 วันต่อสัปดาห์'
          WHEN 	exercise = 2 THEN 'ออกกำลังกายวันละ 30 นาทีมากกว่า 5 วันต่อสัปดาห์'
          END as exercise,
      CASE 
          WHEN 	loll = 0 THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	loll = 1 THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	loll = 2 THEN 'ในแต่ละวัน นั่งหรือเอนกายเฉยๆ น้อยกว่า 4 ชั่วโมง'
          END as loll,
      CASE 
          WHEN 	sleep = 0 THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	sleep = 1 THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	sleep = 2 THEN 'นอนเกิน 7 ชั่วโมงทุกวัน'
          END as sleep,
      CASE 
          WHEN 	brush = 0 THEN 'แปรง 0-2 วันต่อสัปดาห์'
          WHEN 	brush = 1 THEN 'แปรง 3-6 วันต่อสัปดาห์'
          WHEN 	brush = 2 THEN 'แปรง 7 วันต่อสัปดาห์'
          END as brush,
      CASE 
          WHEN 	brushlong = 0 THEN 'น้อยกว่า 2 นาที'
          WHEN 	brushlong = 1 THEN '2 นาที'
          WHEN 	brushlong = 2 THEN '2 นาที'
          END as brushlong,
      CASE 
          WHEN 	cigarette = 0 THEN 'ไม่สูบ'
          WHEN 	cigarette = 1 THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	cigarette = 2 THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	cigarette = 3 THEN 'สูบเป็นประจำทุกวัน'
          WHEN 	cigarette = 4 THEN 'เคยสูบแต่เลิกแล้ว'
          END as cigarette,
      CASE  
          WHEN 	cigarate = 0 THEN '     '
          WHEN 	cigarate = 1 THEN 'กรองทิพย์'
          WHEN 	cigarate = 2 THEN 'กรองทิพย์ 90'
          WHEN 	cigarate = 3 THEN 'กรุงทอง 33'
          WHEN 	cigarate = 4 THEN 'กรุงทอง 90'
          WHEN 	cigarate = 5 THEN 'เกล็ดทอง 33'
          WHEN 	cigarate = 6 THEN 'เบรก( Break)'
          WHEN 	cigarate = 7 THEN 'โบนัส กรีน ( BONUS GREEN )'
          WHEN 	cigarate = 8 THEN 'โบนัส เรด ( BONUS RED )'
          WHEN 	cigarate = 9 THEN 'พระจันทร์ 33'
          WHEN 	cigarate = 10 THEN 'เพลย์ออฟ'
          WHEN 	cigarate = 11 THEN 'เพลย์ออฟ (Playoff)'
          WHEN 	cigarate = 12 THEN 'รยส.90'
          WHEN 	cigarate = 13 THEN 'รอยัลฯ90'
          WHEN 	cigarate = 14 THEN 'สามิต 90'
          WHEN 	cigarate = 15 THEN 'สายฝน 90'
          WHEN 	cigarate = 16 THEN 'เอสเซ่ (ESSE)'
          WHEN 	cigarate = 17 THEN 'แอสโตร พรีม่า กรีน'
          WHEN 	cigarate = 18 THEN 'แอสโตร พรีม่า เรด'
          WHEN 	cigarate = 19 THEN 'ไอสกอร์ (iScore)'
          WHEN 	cigarate = 20 THEN 'ไอสกอร์ บลู(iSCORE BLUE BOX)'
          WHEN 	cigarate = 21 THEN 'Blue Range'
          WHEN 	cigarate = 22 THEN 'Bond Street- บอนด์ สตรีท'
          WHEN 	cigarate = 23 THEN 'EUR-GREEN'
          WHEN 	cigarate = 24 THEN 'EUR-RED'
          WHEN 	cigarate = 25 THEN 'GOAL'
          WHEN 	cigarate = 26 THEN 'KRONG THIP 7.1'
          WHEN 	cigarate = 27 THEN 'L&M-แอล แอนด์ เอ็ม'
          WHEN 	cigarate = 28 THEN 'Marlbolo-มาร์ลโบโร'
          WHEN 	cigarate = 29 THEN 'Mevius original blue'
          WHEN 	cigarate = 30 THEN 'Mevius sky blue'
          WHEN 	cigarate = 31 THEN 'Mevius wind blue'
          WHEN 	cigarate = 32 THEN 'Mevius nordic'
          WHEN 	cigarate = 33 THEN 'Mevius crystal green'
          WHEN 	cigarate = 34 THEN 'Mevius Option'
          WHEN 	cigarate = 35 THEN 'SMS  ซองสีเขียว'
          WHEN 	cigarate = 36 THEN 'SMS ซองสีแดง'
          WHEN 	cigarate = 37 THEN 'Stallion V8  สีแดง'
          WHEN 	cigarate = 38 THEN 'Stallion V8  สีเขียว'
          WHEN 	cigarate = 39 THEN 'Winston Compact Red'
          WHEN 	cigarate = 40 THEN 'Winston Blue'
          WHEN 	cigarate = 41 THEN 'Winston Green box'
          WHEN 	cigarate = 42 THEN 'Winston Classcic'
          WHEN 	cigarate = 43 THEN 'Winston  compact blue'
          WHEN 	cigarate = 44 THEN 'Winston  copact green'
          WHEN 	cigarate = 45 THEN 'WONDER รสอเมริกัน'
          WHEN 	cigarate = 46 THEN 'WONDER รสเมนทอล'
          WHEN 	cigarate = 47 THEN 'อื่น ๆ'
          END as cigarate,
      CASE 
          WHEN 	alcohol = 0 THEN ''
          WHEN 	alcohol = 1 THEN 'แสงโสม'
          WHEN 	alcohol = 2 THEN 'รีเจนซี่ (Regency)'
          WHEN 	alcohol = 3 THEN 'มังกรทอง'
          WHEN 	alcohol = 4 THEN 'หงส์ทอง'
          WHEN 	alcohol = 5 THEN 'พระยา'
          WHEN 	alcohol = 6 THEN 'คราวน์ 99'
          WHEN 	alcohol = 7 THEN 'เบลนด์ 285'
          WHEN 	alcohol = 8 THEN 'เบลนด์ 285 ซิกเนเจอร์'
          WHEN 	alcohol = 9 THEN 'เมอริเดียน'
          WHEN 	alcohol = 10 THEN 'ดรัมเมอร์ '
          WHEN 	alcohol = 11 THEN 'แม่โขง '
          WHEN 	alcohol = 12 THEN 'อื่น ๆ '
          END as alcohol,
      CASE 
          WHEN 	after = 0 THEN 'ไม่เกินครึ่ง ซม.หลังตื่น'
          WHEN 	after = 1 THEN 'ไม่เกิน 1 ซม.หลังตื่น'
          WHEN 	after = 2 THEN 'สูบหลังตื่นมากกว่า 1 ซม.'
          END as after,
      CASE 
          WHEN 	num = 0 THEN '1-10 มวน/วัน'
          WHEN 	num = 1 THEN '11-19 มวน/วัน'
          WHEN 	num = 2 THEN '20 มวน/วันขึ้นไป'
          END as num,
      CASE 
          WHEN 	drink = 0 THEN 'ไม่ดื่ม'
          WHEN 	drink = 1 THEN 'ดื่มนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	drink = 2 THEN 'ดื่มเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)'
          WHEN 	drink = 3 THEN 'ดื่มเป็นประจำทุกวัน'
          WHEN 	drink = 4 THEN 'ดื่มเป็นประจำทุกวัน'
          END as drink
         
          FROM
              personal_document pd
              LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
              LEFT JOIN user_status us ON us.id = uk.status_id
              LEFT JOIN health_kepp dk ON pd.pd_id = dk.pd_id
              LEFT JOIN optional op ON pd.pd_id = op.pd_id
              LEFT JOIN disease d ON pd.pd_id =  d.pd_id
              
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
  public function doctor($doctor)
  {
    $result = mysqli_query($this->dbcon, "SELECT * FROM personal_document WHERE pd_id ='$doctor' ");
    return $result;
  }
}
