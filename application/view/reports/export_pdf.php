<?php

require_once './tcpdf/tcpdf.php';
// include("tcpdf/class/class_curl.php");
require_once '../../core/data_utllities.php';
require_once '../../model/user/results_model.php';
require_once '../../core/session.php';
require_once  '../../config/database.php';
header("Content-Type: application/pdf");


$pd_id = $_REQUEST['pd_id'];
$sql = new results_model();
$query = $sql->personal($pd_id);
$data = mysqli_fetch_object($query);
$birthday = DateThai($data->birthday);
function DateThai($datetoday)
{
    $strYear = date("Y", strtotime($datetoday)) + 543;
    $strMonth = date("n", strtotime($datetoday));
    $strDay = date("j", strtotime($datetoday));

    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$strMonthThai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$strYear";
}
function province($id)
{
    $sql = new results_model();
    $query = $sql->load_province_info($id);
    $result = $query->fetch_object();
    return $result->nameTh;
}
function amphoe($id)
{
    $sql = new results_model();
    $query = $sql->load_amphoe_info($id);
    $result = $query->fetch_object();
    return $result->nameTh;
}
function tumbon($id)
{
    $sql = new results_model();
    $query = $sql->load_tumbon_info($id);
    $result = $query->fetch_object();
    return $result->district_name_local;
}
function getname()
{
    $pd_id = $_REQUEST['pd_id'];
    $sql = new results_model();
    $query = $sql->personal($pd_id);
    $data = mysqli_fetch_object($query);
    $query2 = $sql->doctor($data->pd_id_doctor);
    $result2 = $query2->fetch_object();
    return $result2->first_name . ' ' . $result2->last_name;
}
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        $html = 'วัน-เดือน-ปีที่ให้บริการ&nbsp;&nbsp;&nbsp;' . DateThai(date("Y-m-d")) . '  &nbsp;&nbsp;&nbsp;&nbsp;อสม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . getname();
        $this->SetFont('thsarabun', 'B', 14);
        $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'C', $autopadding = true);
        $this->SetFont('thsarabun', 'B', 20);
        $html1 = 'แบบตรวจบันทึกข้อมูลสุขภาพ';

        $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = 15, $html1, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'C', $autopadding = true);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('thsarabun', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'หน้า ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('แบบบันทึกข้อมูล');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts

// set default header data
$pdf->setHeaderFont(array('thsarabun', 'B', 20));
$pdf->setFooterFont(array('thsarabun', 'B', 9));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('thsarabun', '', 17, '', true);

// Add a page
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// ส่วนของ body html
$provice = province($data->province_id);
$amphoe = amphoe($data->ampher_id);
$tumbon = tumbon($data->tumbon_id);
$html = '<style>.mt-4,
.my-4 {
    margin-top: 1.5rem !important;
}

.mb-4,
.mx-4 {
    margin-bottom: 1.5rem !important;
}

.px-5 {
    padding-left: 3rem !important;
    padding-right: 3rem !important;
}

.p-0 {
    padding: 0 !important;
    margin: 0 !important;
    line-height: 0 !important;
}

h1,
.h1 {
    font-size: 2.5rem;
}

h2,
.h2 {
    font-size: 2rem;
}

h3,
.h3 {
    font-size: 1.75rem;
}

h4,
.h4 {
    font-size: 1.5rem;
}

h5,
.h5 {
    font-size: 1.25rem;
}

h6,
.h6 {
    font-size: 1rem;
}

.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6 {
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}

.tr_black {
    background-color: rgba(0, 0, 0, 0.475) !important
}

.text-start {
    text-align: left !important;
}

.text-end {
    text-align: right !important;
}

.text-center {
    text-align: center !important;
}

  .table {
    width: 100%;
  }
  p.thick {
    font-weight: bold;
  }
</style>
<div class="mt-4">1.ข้อมูลทั่วไป</div>
<h6><b>ชื่อ  -  สกุล</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->first_name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data->last_name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  อายุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัน / เดือน / ปีเกิด&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $birthday</h6>
<h6>เลขบัตรประชาชน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->id_card&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่บ้านเลขที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หมู่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ถนน</h6>
<h6>ตรอก/ซอย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตำบล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $tumbon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อำเภอ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$amphoe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จังหวัด&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $provice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  โทร&nbsp;&nbsp;&nbsp; $data->phone_number   </h6>
<h6>สถานภาพ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->pd_status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; การศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->education &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ประเภทพักอาศัย</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->type_live </h6>
<h6>อาชีพหลักในปัจจุบัน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->occupation </h6>
<h6>โรคประจำตัว 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data->congen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นมานาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->long_time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ปีรพ.รักษาประจำ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->hospital &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รพ.ที่ตรวจพบครั้งแรก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $data->hospital_first </h6>
<h6>โรคประจำตัว 2 $data->congen เป็นมานาน $data->long_time ปีรพ.รักษาประจำ $data->hospital รพ.ที่ตรวจพบครั้งแรก $data->hospital_first</h6>
<h6>โรคประจำตัว 3 $data->congen เป็นมานาน $data->long_time ปีรพ.รักษาประจำ $data->hospital รพ.ที่ตรวจพบครั้งแรก $data->hospital_first</h6>
<h6>โรคประจำตัว 4 $data->congen เป็นมานาน $data->long_time ปีรพ.รักษาประจำ $data->hospital รพ.ที่ตรวจพบครั้งแรก $data->hospital_first</h6>
<h6>โรคประจำตัว 5 $data->congen เป็นมานาน $data->long_time ปีรพ.รักษาประจำ $data->hospital รพ.ที่ตรวจพบครั้งแรก $data->hospital_first</h6>
<h5>2.ตรวจร่างกาย คัดกรอง</h5>
<h6>ความดันโลหิตครั้งที่ 1 $data->blood1มม.ปรอท ความดันโลหิตครั้งที่ 2$data->blood2มม.ปรอท. น้ำหนัก $data->weight กก. ส่วนสูง $data->height ซม. รอบเอว $data->waistline ซม. การคลุมกำเนิด $data->birth </h6>
<h6>ถ้าอายุ 35 ปีขึ้นและไม่ป่วยเบาหวานความดัน ให้ตรวจระดับน้ำตาลในเลือดหลังอดอาหาร ผลตรวจครั้งนี้เท่ากับ $data->diabetes mg% 
หรือเคยตรวจครั้งสุดท้ายภายใน 1 ปี ผลตรวจเท่ากับ $data->last mg%</h6>
<h5>3.คัดกรองโรคซึมเศร้า</h5>
<table width="100%">
<tr>
<td width="80%;"><h6> 3.1 ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ อุกอั่ง หนหวย บ่เป็นตายอยู่ มีแต่อยากให้บ่.</h6></td>
<td width="15%;" align="center"><h6>$data->symptom1</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 3.2 ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ บ่สนใจหยัง บ่อยากเฮ้ดหยัง บ่ม่วนซื้น.</h6></td>
<td width="15%;" align="center"><h6>$data->symptom2</h6></td>
</tr>
</table>
<h5>4.พฤติกรรมสุขภาพ</h5>
<table width="100%">
<tr>
<td width="80%;"><h6> 4.1 ทานกินผัก 5 ทัพพีต่อวันอย่างไร.</h6></td>
<td width="15%;" align="center"><h6>$data->veget</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.2 ท่านเติมเครื่องปรุงรสเค็มในอาหารที่กินหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->condiment</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.3 ท่านเติมน้ำตาลในอาหารหรือเครื่องดื่มรสหวานหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->sweet</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.4 ท่านได้ออกกำลังกายจนรู้สึกเหนื่อยกว่าปกติหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->exercise</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.5 ท่านนั่งหรือเอนกายเฉยๆ ติดต่อกันเกิน 4 ชั่วโมงหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->loll</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.6 ท่านนอนเกิน 7 ชั่วโมงหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->sleep</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.7 ท่านแปรงฟันก่อนนอนทุกวันหรือไม่.</h6></td>
<td width="15%;" align="center"><h6>$data->brush</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.8 ท่านใช้เวลาแปรงฟันอย่างน้อยนานกี่นาที.</h6></td>
<td width="15%;" align="center"><h6>$data->brushlong</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.9 การสูบบุหรี่.</h6></td>
<td width="15%;" align="center"><h6>$data->cigarette</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.10 ชนิดของบุหรี่.</h6></td>
<td width="15%;" align="center"><h6>$data->cigarate</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.11 จำนวนมวนต่อวัน.</h6></td>
<td width="15%;" align="center"><h6>$data->num</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.12 พฤติกรรมสูบมวนแรกหลังตื่นนอน.</h6></td>
<td width="15%;" align="center"><h6>$data->after</h6></td>
</tr> <tr>
<td width="80%;"><h6> 4.13 การดื่มสุรา.</h6></td>
<td width="15%;" align="center"><h6>$data->drink</h6></td>
</tr> 
<tr>
<td width="80%;"><h6> 4.14 ชนิดของสุรา.</h6></td>
<td width="15%;" align="center"><h6>$data->alcohol</h6></td>
</tr>
<tr>
<td width="80%;"><h6> 4.15 ปริมาณที่ดื่มต่อครั้ง.</h6></td>
<td width="15%;" align="center"><h6>$data->amount</h6></td>
</tr>
</table>
<h5>ผลการตรวจคัดกรองสารเคมีในเลือด.</h5>
<table width="100%">
<tr>
<td width="40%;"><h6> ตรวจครั้งสุดท้ายเมื่อปี พ.ศ.</h6></td>
<td width="20%;" align="center"><h6>$data->bloodlast</h6></td>
<td width="25%;"><h6> ผลการตรวจ.</h6></td>
<td width="10%;" align="center"><h6>$data->resul</h6></td>
</tr>
<tr>
<td width="30%;"><h6> การดูแลสุขภาพช่องปากเหงือก.</h6></td>
<td width="10%;" align="center"><h6>$data->gum</h6></td>
<td width="8%;"><h6> หินปูน.</h6></td>
<td width="8%;" align="center"><h6>$data->limestone</h6></td>
<td width="25%;"><h6> จำนวนฟันแท้ผุ.</h6></td>
<td width="10%;" align="center"><h6>$data->cavities</h6></td>
</tr>
<tr>
<td width="80%;"><h6> การตรวจเต้านม ในสตรีอายุ 30 ปีขึ้นไปตรวจด้วย.</h6></td>
<td width="15%;" align="center"><h6>$data->breast</h6></td>
</tr>
<tr>
<td width="40%;"><h6> ตรวจครั้งสุดท้ายเมื่อ.</h6></td>
<td width="15%;" align="center"><h6>$data->breastlast</h6></td>
<td width="25%;"><h6> ผลการตรวจ.</h6></td>
<td width="10%;" align="center"><h6>$data->breastre</h6></td>
</tr>
</table>
<h5>การตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30 ปีขึ้นไป.</h5>
<table width="100%">
<tr>
<td width="40%;"><h6> ตรวจครั้งสุดท้ายเมื่อปี พ.ศ.</h6></td>
<td width="15%;" align="center"><h6>$data->cervix</h6></td>
<td width="15%;"><h6> ผลการตรวจ.</h6></td>
<td width="5%;" align="center"><h6>$data->cervixre</h6></td>
<td width="10%;" align="center"><h6>$data->cervixsub</h6></td>
</tr>
</table>
<h5>คำถามเพิ่มเติมหากท่านรักษาโรคประจำตัวเบาหวาน ความดัน ไขมันสูง.</h5>
<table width="100%">
<tr>
<td width="40%;"><h6> ตรวจน้ำตาลครั้งสุดท้าย</h6></td>
<td width="20%;" align="center"><h6>$data->sugar</h6></td>
<td width="25%;"><h6> ค่าไต (Cr)</h6></td>
<td width="10%;" align="center"><h6>$data->kidney</h6></td>
</tr>
<tr>
<td width="15%;"><h6> โคเลสเตอรอล (Cho)</h6></td>
<td width="10%;" align="center"><h6>$data->cholesterol</h6></td>
<td width="15%;"><h6> ไตรกลีเซอไรด์ (Tri)</h6></td>
<td width="10%;" align="center"><h6>$data->trigly</h6></td>
<td width="15%;"><h6> ไขมัน</h6></td>
<td width="10%;" align="center"><h6>$data->fat_hdl</h6></td>
<td width="10%;" align="center"><h6>$data->fat_ldl</h6></td>

</tr>
<tr>
<td width="80%;"><h6> ผลตรวจตา</h6></td>
<td width="15%;" align="center"><h6>$data->eye</h6></td>
</tr>
<tr>
<td width="80%;"><h6> ชนิดเครื่องตรวจตา</h6></td>
<td width="15%;" align="center"><h6>$data->type_eye</h6></td>
</tr>
<tr>
<td width="80%;"><h6> ผลตรวจเท้า</h6></td>
<td width="15%;" align="center"><h6>$data->foot</h6></td>
</tr>
</table>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);

$pdf->Output(NULL, 'I');


// ---------------------------------------------------------

// $pdf->Output('Report.pdf', "S");
