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
  public function save_form_results($pd_id, $chk1, $chk2, $chk3, $chk4, $chk5, $chk6, $chk7, $chk8)
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
          WHEN 	pd.pd_status = '1' THEN 'โสด'
          WHEN 	pd.pd_status = '2' THEN 'มีคู่สมรส'
          WHEN 	pd.pd_status = '3' THEN 'หม้าย'
          WHEN 	pd.pd_status = '4' THEN 'หย่า'
          WHEN 	pd.pd_status = '5' THEN 'แยกทาง'
          END as pd_status ,
      CASE 
          WHEN 	pd.education = '1' THEN 'ประถม'
          WHEN 	pd.education = '2' THEN 'มัธยมศึกษาตอนต้น'
          WHEN 	pd.education = '3' THEN 'มัธยมศึกษาตอนปลาย'
          WHEN 	pd.education = '4' THEN 'ปวช.'
          WHEN 	pd.education = '5' THEN 'ปวส.'
          WHEN 	pd.education = '6' THEN 'อนุปริญญา'
          WHEN 	pd.education = '7' THEN 'ปริญญา'
          END as education,
      CASE 
          WHEN 	pd.type_live = '1' THEN 'พักตรงกับทะเบียนบ้าน'
          WHEN 	pd.type_live = '2' THEN 'ทะเบียนบ้านไปๆ มาๆ /ทำงานที่อื่น'
          WHEN 	pd.type_live = '3' THEN 'ทะเบียนบ้านอยู่ที่อื่น แต่นอนที่บ้านหลังนี้'
          END as type_live,
      CASE 
          WHEN 	pd.occupation = '1' THEN 'รับราชการ / รัฐวิสาหกิจ'
          WHEN 	pd.occupation = '2' THEN 'รับจ้างทั่วไป'
          WHEN 	pd.occupation = '3' THEN 'พนักงานเอกชน'
          WHEN 	pd.occupation = '4' THEN 'อาชีพอิสระ / ค้าขาย'
          WHEN 	pd.occupation = '5' THEN 'นักเรียน นิสิต นักศึกษา'
          WHEN 	pd.occupation = '6' THEN 'เจ้าของธุรกิจ / ธุรกิจส่วนตัว'
          WHEN 	pd.occupation = '7' THEN 'อื่น ๆ '
          END as occupation,
      CASE 
          WHEN 	dk.birth = '0' THEN ''
          WHEN 	dk.birth = '1' THEN 'โสด(รวมนักเรียน/นักศึกษา)'
          WHEN 	dk.birth = '2' THEN 'ไม่ได้คุมต้องการบุตร'
          WHEN 	dk.birth = '3' THEN 'ยาคุมกิน'
          WHEN 	dk.birth = '4' THEN 'ยาคุมฉีด'
          WHEN 	dk.birth = '5' THEN 'ยาฝัง'
          WHEN 	dk.birth = '6' THEN 'ถุงยาง'
          WHEN 	dk.birth = '7' THEN 'ทำหมันชาย'
          WHEN 	dk.birth = '8' THEN 'ทำหมันหญิง'
          WHEN 	dk.birth = '9' THEN 'สามีหรือภรรยาคุมกกำเนิดแทน'
          WHEN 	dk.birth = '10' THEN 'อื่นๆ '
          END as birth,
      CASE 
          WHEN 	dk.symptom1 = '0' THEN 'มี'
          WHEN 	dk.symptom1 = '1' THEN 'บ่อมี๊'
          END as symptom1,
      CASE 
          WHEN 	dk.symptom2 = '0' THEN 'มี'
          WHEN 	dk.symptom2 = '1' THEN 'บ่อมี๊'
          END as symptom2,
      CASE 
          WHEN 	dk.veget = '0' THEN '0-1 วันต่อสัปดาห์'
          WHEN 	dk.veget = '1' THEN '3-6 วันต่อสัปดาห์'
          WHEN 	dk.veget = '2' THEN '7 วันต่อสัปดาห์'
          END as veget,
      CASE 
          WHEN 	dk.condiment = '0' THEN 'ไม่เติม'
          WHEN 	dk.condiment = '1' THEN 'เติมบางครั้ง'
          WHEN 	dk.condiment = '2' THEN 'เติมทุกครั้ง'
          END as condiment,
      CASE 
          WHEN 	dk.sweet = '0' THEN 'ไม่เติม'
          WHEN 	dk.sweet = '1' THEN 'เติมบางครั้ง'
          WHEN 	dk.sweet = '2' THEN 'เติมทุกครั้ง/ดื่มทุกวัน'
          END as sweet,
      CASE 
          WHEN 	dk.exercise = '0' THEN 'ไม่ออกกำลังกายหรือออกกำลังกายไม่ถึงวันละ 30 นาที'
          WHEN 	dk.exercise = '1' THEN 'ออกกำลังกายวันละ 30 นาทีแต่ไม่ถึง 5 วันต่อสัปดาห์'
          WHEN 	dk.exercise = '2' THEN 'ออกกำลังกายวันละ 30 นาทีมากกว่า 5 วันต่อสัปดาห์'
          END as exercise,
      CASE 
          WHEN 	dk.loll = '0' THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	dk.loll = '1' THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	dk.loll = '2' THEN 'ในแต่ละวัน นั่งหรือเอนกายเฉยๆ น้อยกว่า 4 ชั่วโมง'
          END as loll,
      CASE 
          WHEN 	dk.sleep = '0' THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	dk.sleep = '1' THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	dk.sleep = '2' THEN 'นอนเกิน 7 ชั่วโมงทุกวัน'
          END as sleep,
      CASE 
          WHEN 	brush = '0' THEN 'แปรง 0-2 วันต่อสัปดาห์'
          WHEN 	brush = '1' THEN 'แปรง 3-6 วันต่อสัปดาห์'
          WHEN 	brush = '2' THEN 'แปรง 7 วันต่อสัปดาห์'
          END as brush,
      CASE 
          WHEN  dk.brushlong = '0' THEN 'น้อยกว่า 2 นาที'
          WHEN 	dk.brushlong = '1' THEN '2 นาที'
          WHEN 	dk.brushlong = '2' THEN '2 นาที'
          END as brushlong,
      CASE 
          WHEN 	dk.cigarette = '0' THEN 'ไม่สูบ'
          WHEN 	dk.cigarette = '1' THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.cigarette = '2' THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.cigarette = '3' THEN 'สูบเป็นประจำทุกวัน'
          WHEN 	dk.cigarette = '4' THEN 'เคยสูบแต่เลิกแล้ว'
          END as cigarette,
      CASE  
          WHEN 	dk.cigarate = '0' THEN '     '
          WHEN 	dk.cigarate = '1' THEN 'กรองทิพย์'
          WHEN 	dk.cigarate = '2' THEN 'กรองทิพย์ 90'
          WHEN 	dk.cigarate = '3' THEN 'กรุงทอง 33'
          WHEN 	dk.cigarate = '4' THEN 'กรุงทอง 90'
          WHEN 	dk.cigarate = '5' THEN 'เกล็ดทอง 33'
          WHEN 	dk.cigarate = '6' THEN 'เบรก( Break)'
          WHEN 	dk.cigarate = '7' THEN 'โบนัส กรีน ( BONUS GREEN )'
          WHEN 	dk.cigarate = '8' THEN 'โบนัส เรด ( BONUS RED )'
          WHEN 	dk.cigarate = '9' THEN 'พระจันทร์ 33'
          WHEN 	dk.cigarate = '10' THEN 'เพลย์ออฟ'
          WHEN 	dk.cigarate = '11' THEN 'เพลย์ออฟ (Playoff)'
          WHEN 	dk.cigarate = '12' THEN 'รยส.90'
          WHEN 	dk.cigarate = '13' THEN 'รอยัลฯ90'
          WHEN 	dk.cigarate = '14' THEN 'สามิต 90'
          WHEN 	dk.cigarate = '15' THEN 'สายฝน 90'
          WHEN 	dk.cigarate = '16' THEN 'เอสเซ่ (ESSE)'
          WHEN 	dk.cigarate = '17' THEN 'แอสโตร พรีม่า กรีน'
          WHEN 	dk.cigarate = '18' THEN 'แอสโตร พรีม่า เรด'
          WHEN 	dk.cigarate = '19' THEN 'ไอสกอร์ (iScore)'
          WHEN 	dk.cigarate = '20' THEN 'ไอสกอร์ บลู(iSCORE BLUE BOX)'
          WHEN 	dk.cigarate = '21' THEN 'Blue Range'
          WHEN 	dk.cigarate = '22' THEN 'Bond Street- บอนด์ สตรีท'
          WHEN 	dk.cigarate = '23' THEN 'EUR-GREEN'
          WHEN 	dk.cigarate = '24' THEN 'EUR-RED'
          WHEN 	dk.cigarate = '25' THEN 'GOAL'
          WHEN 	dk.cigarate = '26' THEN 'KRONG THIP 7.1'
          WHEN 	dk.cigarate = '27' THEN 'L&M-แอล แอนด์ เอ็ม'
          WHEN 	dk.cigarate = '28' THEN 'Marlbolo-มาร์ลโบโร'
          WHEN 	dk.cigarate = '29' THEN 'Mevius original blue'
          WHEN 	dk.cigarate = '30' THEN 'Mevius sky blue'
          WHEN 	dk.cigarate = '31' THEN 'Mevius wind blue'
          WHEN 	dk.cigarate = '32' THEN 'Mevius nordic'
          WHEN 	dk.cigarate = '33' THEN 'Mevius crystal green'
          WHEN 	dk.cigarate = '34' THEN 'Mevius Option'
          WHEN 	dk.cigarate = '35' THEN 'SMS  ซองสีเขียว'
          WHEN 	dk.cigarate = '36' THEN 'SMS ซองสีแดง'
          WHEN 	dk.cigarate = '37' THEN 'Stallion V8  สีแดง'
          WHEN 	dk.cigarate = '38' THEN 'Stallion V8  สีเขียว'
          WHEN 	dk.cigarate = '39' THEN 'Winston Compact Red'
          WHEN 	dk.cigarate = '40' THEN 'Winston Blue'
          WHEN 	dk.cigarate = '41' THEN 'Winston Green box'
          WHEN 	dk.cigarate = '42' THEN 'Winston Classcic'
          WHEN 	dk.cigarate = '43' THEN 'Winston  compact blue'
          WHEN 	dk.cigarate = '44' THEN 'Winston  copact green'
          WHEN 	dk.cigarate = '45' THEN 'WONDER รสอเมริกัน'
          WHEN 	dk.cigarate = '46' THEN 'WONDER รสเมนทอล'
          WHEN 	dk.cigarate = '47' THEN 'อื่น ๆ'
          END as cigarate,
      CASE 
          WHEN 	dk.alcohol = '0' THEN ''
          WHEN 	dk.alcohol = '1' THEN 'แสงโสม'
          WHEN 	dk.alcohol = '2' THEN 'รีเจนซี่ (Regency)'
          WHEN 	dk.alcohol = '3' THEN 'มังกรทอง'
          WHEN 	dk.alcohol = '4' THEN 'หงส์ทอง'
          WHEN 	dk.alcohol = '5' THEN 'พระยา'
          WHEN 	dk.alcohol = '6' THEN 'คราวน์ 99'
          WHEN 	dk.alcohol = '7' THEN 'เบลนด์ 285'
          WHEN 	dk.alcohol = '8' THEN 'เบลนด์ 285 ซิกเนเจอร์'
          WHEN 	dk.alcohol = '9' THEN 'เมอริเดียน'
          WHEN 	dk.alcohol = '10' THEN 'ดรัมเมอร์ '
          WHEN 	dk.alcohol = '11' THEN 'แม่โขง '
          WHEN 	dk.alcohol = '12' THEN 'อื่น ๆ '
          END as alcohol,
      CASE 
          WHEN 	dk.after = '0' THEN 'ไม่เกินครึ่ง ซม.หลังตื่น'
          WHEN 	dk.after = '1' THEN 'ไม่เกิน 1 ซม.หลังตื่น'
          WHEN 	dk.after = '2' THEN 'สูบหลังตื่นมากกว่า 1 ซม.'
          END as after,
      CASE 
          WHEN 	dk.num = '0' THEN '1-10 มวน/วัน'
          WHEN 	dk.num = '1' THEN '11-19 มวน/วัน'
          WHEN 	dk.num = '2' THEN '20 มวน/วันขึ้นไป'
          END as num,
      CASE 
          WHEN 	dk.drink = '0' THEN 'ไม่ดื่ม'
          WHEN 	dk.drink = '1' THEN 'ดื่มนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.drink = '2' THEN 'ดื่มเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)'
          WHEN 	dk.drink = '3' THEN 'ดื่มเป็นประจำทุกวัน'
          WHEN 	dk.drink = '4' THEN 'เคยดื่มแต่เลิกแล้ว'
          END as drink,
      CASE 
          WHEN 		dk.resul = '0' THEN 'ปกติ'
          WHEN 		dk.resul = '1' THEN 'ปลอดภัย'
          WHEN 		dk.resul = '2' THEN 'เสี่ยง'
          WHEN 		dk.resul = '3' THEN 'ไม่ปลอดภัย'
          WHEN 		dk.resul = '4' THEN 'ไม่เคยตรวจ'
          END as 	resul,
      CASE 
          WHEN 	dk.gum = '0' THEN 'ปกติ'
          WHEN 	dk.gum = '1' THEN 'บวม'
          WHEN 	dk.gum = '2' THEN 'หนอง'
          END as gum,
      CASE 
          WHEN 	dk.limestone = '0' THEN 'มี'
          WHEN 	dk.limestone = '1' THEN 'ไม่มี'    
          END as limestone,
      CASE 
          WHEN 	dk.breast = '0' THEN 'ตนเอง'
          WHEN 	dk.breast = '1' THEN 'บุคลากรสาธารณสุข'    
          END as breast,
      CASE 
          WHEN 	dk.breastre = '0' THEN 'ปกติ'
          WHEN 	dk.breastre = '1' THEN 'ผิดปกติ'    
          END as breastre,
      CASE 
          WHEN 	dk.cervixre = '0' THEN 'ปกติ'
          WHEN 	dk.cervixre = '1' THEN 'ผิดปกติ คือ'    
          END as cervixre,
      CASE 
          WHEN 	op.eye = '0' THEN 'ปกติ'
          WHEN 	op.eye = '1' THEN 'เป็นต้อหิน'
          WHEN 	op.eye = '2' THEN 'เป็นต้อกระจก'
          WHEN 	op.eye = '3' THEN 'สายตาสั้น'
          WHEN 	op.eye = '4' THEN 'สายตายาว'
          WHEN 	op.eye = '5' THEN 'สายตาเอียง'
          END as eye,
      CASE 
          WHEN 	op.type_eye = '0' THEN 'เครื่องส่องตา'
          WHEN 	op.type_eye = '1' THEN 'เครื่องถ่ายจอประสาทตาด้วยคอมพิวเตอร์'
          END as type_eye,
      CASE 
          WHEN 	op.foot = '0' THEN 'ปกติ'
          WHEN 	op.foot = '1' THEN 'เสี่ยงต่ำ'
          WHEN 	op.foot = '2' THEN 'เสี่ยงปานกลาง'
          WHEN 	op.foot = '3' THEN 'เสี่ยงสูง'
          WHEN 	op.foot = '4' THEN 'เป็นแผล'
          WHEN 	op.foot = '5' THEN 'ถูกตัดเท้า'
          END as foot,
      CASE 
          WHEN 	c.alcohol = '0' THEN 'ใช่'
          WHEN 	c.alcohol = '1' THEN 'ไม่ใช่'    
          END as alcohol,
      CASE 
          WHEN 	c.cancer_1 = '0' THEN 'ใช่'
          WHEN 	c.cancer_1 = '1' THEN 'ไม่ใช่'    
          END as cancer_1,
      CASE 
          WHEN 	c.cancer_2 = '0' THEN 'ใช่'
          WHEN 	c.cancer_2 = '1' THEN 'ไม่ใช่'    
          END as cancer_2,
      CASE 
          WHEN 	c.cancer_3 = '0' THEN 'ใช่'
          WHEN 	c.cancer_3 = '1' THEN 'ไม่ใช่'    
          END as cancer_3,
      CASE 
          WHEN 	c.cancer_4 = '0' THEN 'ใช่'
          WHEN 	c.cancer_4 = '1' THEN 'ไม่ใช่'    
          END as cancer_4,
      CASE 
          WHEN 	c.cancer_5 = '0' THEN 'ใช่'
          WHEN 	c.cancer_5 = '1' THEN 'ไม่ใช่'    
          END as cancer_5,
      CASE 
          WHEN 	e.operate  = '0' THEN 'ให้คำแนะนำการดูแลตนเอง และตรวจคัดกรองซ้ำทุก 1 ปี '
          WHEN 	e.operate = '1' THEN 'ลงทะเบียนกลุ่มเสี่ยงต่อโรค Metabolic และแนะนำเข้าโครงการปรับเปลี่ยนพฤติกรรม'
          WHEN 	e.operate = '2' THEN 'ส่งต่อเพื่อรักษา'
          END as operate,
      CASE 
          WHEN 	e.not_found = '0' THEN 'ไม่พบความเสี่ยง'
          END as not_found,
      CASE 
          WHEN 	e.is_found = '0' THEN 'พบความเสี่ยงเบื้องต้นต่อโรค'
          END as is_found,
      CASE 
          WHEN 		e.is_found_id = '0' THEN 'DM'
          WHEN 		e.is_found_id = '1' THEN 'HT'
          WHEN 		e.is_found_id = '2' THEN 'Stroke'
          WHEN 		e.is_found_id = '3' THEN 'Obesity'
          END as 	is_found_id,
      CASE 
          WHEN 	e.is_sick = '0' THEN 'ป่วยด้วยโรคเรื้อรัง'
          END as is_sick,
      CASE 
          WHEN 		e.is_sick_id = '0' THEN 'DM'
          WHEN 		e.is_sick_id = '1' THEN 'HT'
          WHEN 		e.is_sick_id = '2' THEN 'Stroke'
          WHEN 		e.is_sick_id = '3' THEN 'Obesity'
          END as 	is_sick_id
          FROM
              personal_document pd
              LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
              LEFT JOIN user_status us ON us.id = uk.status_id
              LEFT JOIN health_kepp dk ON pd.pd_id = dk.pd_id
              LEFT JOIN optional op ON op.pd_id = pd.pd_id
              LEFT JOIN disease d ON d.pd_id =  pd.pd_id
              LEFT JOIN cancer c ON c.pd_id =  pd.pd_id
              LEFT JOIN estimate e ON e.pd_id =  pd.pd_id
          WHERE
              pd.`status` = 'active' 
              AND pd.pd_id = '$pd_id'  
               ");

    return $result;
  }
  public function personal2($pd_id)
  {
    //    $pd_id = $_REQUEST['pd_id'];
    $result = mysqli_query($this->dbcon, "SELECT *,
      CASE 
          WHEN 	pd.pd_status = '1' THEN 'โสด'
          WHEN 	pd.pd_status = '2' THEN 'มีคู่สมรส'
          WHEN 	pd.pd_status = '3' THEN 'หม้าย'
          WHEN 	pd.pd_status = '4' THEN 'หย่า'
          WHEN 	pd.pd_status = '5' THEN 'แยกทาง'
          END as pd_status ,
      CASE 
          WHEN 	pd.education = '1' THEN 'ประถม'
          WHEN 	pd.education = '2' THEN 'มัธยมศึกษาตอนต้น'
          WHEN 	pd.education = '3' THEN 'มัธยมศึกษาตอนปลาย'
          WHEN 	pd.education = '4' THEN 'ปวช.'
          WHEN 	pd.education = '5' THEN 'ปวส.'
          WHEN 	pd.education = '6' THEN 'อนุปริญญา'
          WHEN 	pd.education = '7' THEN 'ปริญญา'
          END as education,
      CASE 
          WHEN 	pd.type_live = '1' THEN 'พักตรงกับทะเบียนบ้าน'
          WHEN 	pd.type_live = '2' THEN 'ทะเบียนบ้านไปๆ มาๆ /ทำงานที่อื่น'
          WHEN 	pd.type_live = '3' THEN 'ทะเบียนบ้านอยู่ที่อื่น แต่นอนที่บ้านหลังนี้'
          END as type_live,
      CASE 
          WHEN 	pd.occupation = '1' THEN 'รับราชการ / รัฐวิสาหกิจ'
          WHEN 	pd.occupation = '2' THEN 'รับจ้างทั่วไป'
          WHEN 	pd.occupation = '3' THEN 'พนักงานเอกชน'
          WHEN 	pd.occupation = '4' THEN 'อาชีพอิสระ / ค้าขาย'
          WHEN 	pd.occupation = '5' THEN 'นักเรียน นิสิต นักศึกษา'
          WHEN 	pd.occupation = '6' THEN 'เจ้าของธุรกิจ / ธุรกิจส่วนตัว'
          WHEN 	pd.occupation = '7' THEN 'อื่น ๆ '
          END as occupation,
      CASE 
          WHEN 	dk.birth = '0' THEN ''
          WHEN 	dk.birth = '1' THEN 'โสด(รวมนักเรียน/นักศึกษา)'
          WHEN 	dk.birth = '2' THEN 'ไม่ได้คุมต้องการบุตร'
          WHEN 	dk.birth = '3' THEN 'ยาคุมกิน'
          WHEN 	dk.birth = '4' THEN 'ยาคุมฉีด'
          WHEN 	dk.birth = '5' THEN 'ยาฝัง'
          WHEN 	dk.birth = '6' THEN 'ถุงยาง'
          WHEN 	dk.birth = '7' THEN 'ทำหมันชาย'
          WHEN 	dk.birth = '8' THEN 'ทำหมันหญิง'
          WHEN 	dk.birth = '9' THEN 'สามีหรือภรรยาคุมกกำเนิดแทน'
          WHEN 	dk.birth = '10' THEN 'อื่นๆ '
          END as birth,
      CASE 
          WHEN 	dk.symptom1 = '0' THEN 'มี'
          WHEN 	dk.symptom1 = '1' THEN 'บ่อมี๊'
          END as symptom1,
      CASE 
          WHEN 	dk.symptom2 = '0' THEN 'มี'
          WHEN 	dk.symptom2 = '1' THEN 'บ่อมี๊'
          END as symptom2,
      CASE 
          WHEN 	dk.veget = '0' THEN '0-1 วันต่อสัปดาห์'
          WHEN 	dk.veget = '1' THEN '3-6 วันต่อสัปดาห์'
          WHEN 	dk.veget = '2' THEN '7 วันต่อสัปดาห์'
          END as veget,
      CASE 
          WHEN 	dk.condiment = '0' THEN 'ไม่เติม'
          WHEN 	dk.condiment = '1' THEN 'เติมบางครั้ง'
          WHEN 	dk.condiment = '2' THEN 'เติมทุกครั้ง'
          END as condiment,
      CASE 
          WHEN 	dk.sweet = '0' THEN 'ไม่เติม'
          WHEN 	dk.sweet = '1' THEN 'เติมบางครั้ง'
          WHEN 	dk.sweet = '2' THEN 'เติมทุกครั้ง/ดื่มทุกวัน'
          END as sweet,
      CASE 
          WHEN 	dk.exercise = '0' THEN 'ไม่ออกกำลังกายหรือออกกำลังกายไม่ถึงวันละ 30 นาที'
          WHEN 	dk.exercise = '1' THEN 'ออกกำลังกายวันละ 30 นาทีแต่ไม่ถึง 5 วันต่อสัปดาห์'
          WHEN 	dk.exercise = '2' THEN 'ออกกำลังกายวันละ 30 นาทีมากกว่า 5 วันต่อสัปดาห์'
          END as exercise,
      CASE 
          WHEN 	dk.loll = '0' THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	dk.loll = '1' THEN 'นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน'
          WHEN 	dk.loll = '2' THEN 'ในแต่ละวัน นั่งหรือเอนกายเฉยๆ น้อยกว่า 4 ชั่วโมง'
          END as loll,
      CASE 
          WHEN 	dk.sleep = '0' THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	dk.sleep = '1' THEN 'นอนไม่ถึงทุกวัน'
          WHEN 	dk.sleep = '2' THEN 'นอนเกิน 7 ชั่วโมงทุกวัน'
          END as sleep,
      CASE 
          WHEN 	brush = '0' THEN 'แปรง 0-2 วันต่อสัปดาห์'
          WHEN 	brush = '1' THEN 'แปรง 3-6 วันต่อสัปดาห์'
          WHEN 	brush = '2' THEN 'แปรง 7 วันต่อสัปดาห์'
          END as brush,
      CASE 
          WHEN  dk.brushlong = '0' THEN 'น้อยกว่า 2 นาที'
          WHEN 	dk.brushlong = '1' THEN '2 นาที'
          WHEN 	dk.brushlong = '2' THEN '2 นาที'
          END as brushlong,
      CASE 
          WHEN 	dk.cigarette = '0' THEN 'ไม่สูบ'
          WHEN 	dk.cigarette = '1' THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.cigarette = '2' THEN 'สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.cigarette = '3' THEN 'สูบเป็นประจำทุกวัน'
          WHEN 	dk.cigarette = '4' THEN 'เคยสูบแต่เลิกแล้ว'
          END as cigarette,
      CASE  
          WHEN 	dk.cigarate = '0' THEN '     '
          WHEN 	dk.cigarate = '1' THEN 'กรองทิพย์'
          WHEN 	dk.cigarate = '2' THEN 'กรองทิพย์ 90'
          WHEN 	dk.cigarate = '3' THEN 'กรุงทอง 33'
          WHEN 	dk.cigarate = '4' THEN 'กรุงทอง 90'
          WHEN 	dk.cigarate = '5' THEN 'เกล็ดทอง 33'
          WHEN 	dk.cigarate = '6' THEN 'เบรก( Break)'
          WHEN 	dk.cigarate = '7' THEN 'โบนัส กรีน ( BONUS GREEN )'
          WHEN 	dk.cigarate = '8' THEN 'โบนัส เรด ( BONUS RED )'
          WHEN 	dk.cigarate = '9' THEN 'พระจันทร์ 33'
          WHEN 	dk.cigarate = '10' THEN 'เพลย์ออฟ'
          WHEN 	dk.cigarate = '11' THEN 'เพลย์ออฟ (Playoff)'
          WHEN 	dk.cigarate = '12' THEN 'รยส.90'
          WHEN 	dk.cigarate = '13' THEN 'รอยัลฯ90'
          WHEN 	dk.cigarate = '14' THEN 'สามิต 90'
          WHEN 	dk.cigarate = '15' THEN 'สายฝน 90'
          WHEN 	dk.cigarate = '16' THEN 'เอสเซ่ (ESSE)'
          WHEN 	dk.cigarate = '17' THEN 'แอสโตร พรีม่า กรีน'
          WHEN 	dk.cigarate = '18' THEN 'แอสโตร พรีม่า เรด'
          WHEN 	dk.cigarate = '19' THEN 'ไอสกอร์ (iScore)'
          WHEN 	dk.cigarate = '20' THEN 'ไอสกอร์ บลู(iSCORE BLUE BOX)'
          WHEN 	dk.cigarate = '21' THEN 'Blue Range'
          WHEN 	dk.cigarate = '22' THEN 'Bond Street- บอนด์ สตรีท'
          WHEN 	dk.cigarate = '23' THEN 'EUR-GREEN'
          WHEN 	dk.cigarate = '24' THEN 'EUR-RED'
          WHEN 	dk.cigarate = '25' THEN 'GOAL'
          WHEN 	dk.cigarate = '26' THEN 'KRONG THIP 7.1'
          WHEN 	dk.cigarate = '27' THEN 'L&M-แอล แอนด์ เอ็ม'
          WHEN 	dk.cigarate = '28' THEN 'Marlbolo-มาร์ลโบโร'
          WHEN 	dk.cigarate = '29' THEN 'Mevius original blue'
          WHEN 	dk.cigarate = '30' THEN 'Mevius sky blue'
          WHEN 	dk.cigarate = '31' THEN 'Mevius wind blue'
          WHEN 	dk.cigarate = '32' THEN 'Mevius nordic'
          WHEN 	dk.cigarate = '33' THEN 'Mevius crystal green'
          WHEN 	dk.cigarate = '34' THEN 'Mevius Option'
          WHEN 	dk.cigarate = '35' THEN 'SMS  ซองสีเขียว'
          WHEN 	dk.cigarate = '36' THEN 'SMS ซองสีแดง'
          WHEN 	dk.cigarate = '37' THEN 'Stallion V8  สีแดง'
          WHEN 	dk.cigarate = '38' THEN 'Stallion V8  สีเขียว'
          WHEN 	dk.cigarate = '39' THEN 'Winston Compact Red'
          WHEN 	dk.cigarate = '40' THEN 'Winston Blue'
          WHEN 	dk.cigarate = '41' THEN 'Winston Green box'
          WHEN 	dk.cigarate = '42' THEN 'Winston Classcic'
          WHEN 	dk.cigarate = '43' THEN 'Winston  compact blue'
          WHEN 	dk.cigarate = '44' THEN 'Winston  copact green'
          WHEN 	dk.cigarate = '45' THEN 'WONDER รสอเมริกัน'
          WHEN 	dk.cigarate = '46' THEN 'WONDER รสเมนทอล'
          WHEN 	dk.cigarate = '47' THEN 'อื่น ๆ'
          END as cigarate,
      CASE 
          WHEN 	dk.alcohol = '0' THEN ''
          WHEN 	dk.alcohol = '1' THEN 'แสงโสม'
          WHEN 	dk.alcohol = '2' THEN 'รีเจนซี่ (Regency)'
          WHEN 	dk.alcohol = '3' THEN 'มังกรทอง'
          WHEN 	dk.alcohol = '4' THEN 'หงส์ทอง'
          WHEN 	dk.alcohol = '5' THEN 'พระยา'
          WHEN 	dk.alcohol = '6' THEN 'คราวน์ 99'
          WHEN 	dk.alcohol = '7' THEN 'เบลนด์ 285'
          WHEN 	dk.alcohol = '8' THEN 'เบลนด์ 285 ซิกเนเจอร์'
          WHEN 	dk.alcohol = '9' THEN 'เมอริเดียน'
          WHEN 	dk.alcohol = '10' THEN 'ดรัมเมอร์ '
          WHEN 	dk.alcohol = '11' THEN 'แม่โขง '
          WHEN 	dk.alcohol = '12' THEN 'อื่น ๆ '
          END as alcohol,
      CASE 
          WHEN 	dk.after = '0' THEN 'ไม่เกินครึ่ง ซม.หลังตื่น'
          WHEN 	dk.after = '1' THEN 'ไม่เกิน 1 ซม.หลังตื่น'
          WHEN 	dk.after = '2' THEN 'สูบหลังตื่นมากกว่า 1 ซม.'
          END as after,
      CASE 
          WHEN 	dk.num = '0' THEN '1-10 มวน/วัน'
          WHEN 	dk.num = '1' THEN '11-19 มวน/วัน'
          WHEN 	dk.num = '2' THEN '20 มวน/วันขึ้นไป'
          END as num,
      CASE 
          WHEN 	dk.drink = '0' THEN 'ไม่ดื่ม'
          WHEN 	dk.drink = '1' THEN 'ดื่มนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)'
          WHEN 	dk.drink = '2' THEN 'ดื่มเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)'
          WHEN 	dk.drink = '3' THEN 'ดื่มเป็นประจำทุกวัน'
          WHEN 	dk.drink = '4' THEN 'เคยดื่มแต่เลิกแล้ว'
          END as drink,
      CASE 
          WHEN 		dk.resul = '0' THEN 'ปกติ'
          WHEN 		dk.resul = '1' THEN 'ปลอดภัย'
          WHEN 		dk.resul = '2' THEN 'เสี่ยง'
          WHEN 		dk.resul = '3' THEN 'ไม่ปลอดภัย'
          WHEN 		dk.resul = '4' THEN 'ไม่เคยตรวจ'
          END as 	resul,
      CASE 
          WHEN 	dk.gum = '0' THEN 'ปกติ'
          WHEN 	dk.gum = '1' THEN 'บวม'
          WHEN 	dk.gum = '2' THEN 'หนอง'
          END as gum,
      CASE 
          WHEN 	dk.limestone = '0' THEN 'มี'
          WHEN 	dk.limestone = '1' THEN 'ไม่มี'    
          END as limestone,
      CASE 
          WHEN 	dk.breast = '0' THEN 'ตนเอง'
          WHEN 	dk.breast = '1' THEN 'บุคลากรสาธารณสุข'    
          END as breast,
      CASE 
          WHEN 	dk.breastre = '0' THEN 'ปกติ'
          WHEN 	dk.breastre = '1' THEN 'ผิดปกติ'    
          END as breastre,
      CASE 
          WHEN 	dk.cervixre = '0' THEN 'ปกติ'
          WHEN 	dk.cervixre = '1' THEN 'ผิดปกติ คือ'    
          END as cervixre,
      CASE 
          WHEN 	op.eye = '0' THEN 'ปกติ'
          WHEN 	op.eye = '1' THEN 'เป็นต้อหิน'
          WHEN 	op.eye = '2' THEN 'เป็นต้อกระจก'
          WHEN 	op.eye = '3' THEN 'สายตาสั้น'
          WHEN 	op.eye = '4' THEN 'สายตายาว'
          WHEN 	op.eye = '5' THEN 'สายตาเอียง'
          END as eye,
      CASE 
          WHEN 	op.type_eye = '0' THEN 'เครื่องส่องตา'
          WHEN 	op.type_eye = '1' THEN 'เครื่องถ่ายจอประสาทตาด้วยคอมพิวเตอร์'
          END as type_eye,
      CASE 
          WHEN 	op.foot = '0' THEN 'ปกติ'
          WHEN 	op.foot = '1' THEN 'เสี่ยงต่ำ'
          WHEN 	op.foot = '2' THEN 'เสี่ยงปานกลาง'
          WHEN 	op.foot = '3' THEN 'เสี่ยงสูง'
          WHEN 	op.foot = '4' THEN 'เป็นแผล'
          WHEN 	op.foot = '5' THEN 'ถูกตัดเท้า'
          END as foot,
      CASE 
          WHEN 	c.alcohol = '0' THEN 'ใช่'
          WHEN 	c.alcohol = '1' THEN 'ไม่ใช่'    
          END as alcohol,
      CASE 
          WHEN 	c.cancer_1 = '0' THEN 'ใช่'
          WHEN 	c.cancer_1 = '1' THEN 'ไม่ใช่'    
          END as cancer_1,
      CASE 
          WHEN 	c.cancer_2 = '0' THEN 'ใช่'
          WHEN 	c.cancer_2 = '1' THEN 'ไม่ใช่'    
          END as cancer_2,
      CASE 
          WHEN 	c.cancer_3 = '0' THEN 'ใช่'
          WHEN 	c.cancer_3 = '1' THEN 'ไม่ใช่'    
          END as cancer_3,
      CASE 
          WHEN 	c.cancer_4 = '0' THEN 'ใช่'
          WHEN 	c.cancer_4 = '1' THEN 'ไม่ใช่'    
          END as cancer_4,
      CASE 
          WHEN 	c.cancer_5 = '0' THEN 'ใช่'
          WHEN 	c.cancer_5 = '1' THEN 'ไม่ใช่'    
          END as cancer_5,
      CASE 
          WHEN 	e.operate  = '0' THEN 'ให้คำแนะนำการดูแลตนเอง และตรวจคัดกรองซ้ำทุก 1 ปี '
          WHEN 	e.operate = '1' THEN 'ลงทะเบียนกลุ่มเสี่ยงต่อโรค Metabolic และแนะนำเข้าโครงการปรับเปลี่ยนพฤติกรรม'
          WHEN 	e.operate = '2' THEN 'ส่งต่อเพื่อรักษา'
          END as operate,
      CASE 
          WHEN 	e.not_found = '0' THEN 'ไม่พบความเสี่ยง'
          END as not_found,
      CASE 
          WHEN 	e.is_found = '0' THEN 'พบความเสี่ยงเบื้องต้นต่อโรค'
          END as is_found,
      CASE 
          WHEN 		e.is_found_id = '0' THEN 'DM'
          WHEN 		e.is_found_id = '1' THEN 'HT'
          WHEN 		e.is_found_id = '2' THEN 'Stroke'
          WHEN 		e.is_found_id = '3' THEN 'Obesity'
          END as 	is_found_id,
      CASE 
          WHEN 	e.is_sick = '0' THEN 'ป่วยด้วยโรคเรื้อรัง'
          END as is_sick,
      CASE 
          WHEN 		e.is_sick_id = '0' THEN 'DM'
          WHEN 		e.is_sick_id = '1' THEN 'HT'
          WHEN 		e.is_sick_id = '2' THEN 'Stroke'
          WHEN 		e.is_sick_id = '3' THEN 'Obesity'
          END as 	is_sick_id
          FROM
              personal_document pd
              LEFT JOIN user_status_keep uk ON uk.pd_id = pd.pd_id
              LEFT JOIN user_status us ON us.id = uk.status_id
              LEFT JOIN health_kepp dk ON pd.pd_id = dk.pd_id
              LEFT JOIN optional op ON op.pd_id = pd.pd_id
              LEFT JOIN disease d ON d.pd_id =  pd.pd_id
              LEFT JOIN cancer c ON c.pd_id =  pd.pd_id
              LEFT JOIN estimate e ON e.pd_id =  pd.pd_id
              
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
