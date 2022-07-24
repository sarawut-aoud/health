<?php

require_once './tcpdf/tcpdf.php';
// include("tcpdf/class/class_curl.php");
require_once '../../core/data_utllities.php';
require_once '../../model/user/dashborad_model.php';
require_once '../../core/session.php';

header ("Content-Type: application/pdf");

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('แบบบันทึกข้อมูล');

$sql = new dashboard();
$query = $sql->personal();
$data = mysqli_fetch_object($query);

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 002', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
// $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
$pdf->setHeaderFont(array('thsarabun', 'B', 20));
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', 'แบบบันทึกตรวจสุขภาพ', array (0, 64, 255), array (0, 64, 128));
$pdf->setFooterData(array (0, 64, 0), array (0, 64, 128));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font

$pdf->SetFont('thsarabun', '', 16, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// ส่วนของ body html
$html = <<<EOD

<h5>1.ข้อมูลทั่วไป</h5>
<h6>ชื่อ-สกุล.<?php echo $data->first_name; ?>อายุปี &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันเดือนปีเกิด</h6>
<h6>เลขบัตรประชาชน.ที่อยู่บ้านเลขที่หมู่ถนน</h6>
<h6>ตรอก/ซอย.ตำบลอำเภอจังหวัดโทร</h6>
<h6>สถานภาพ.การศึกษาประเภทพักอาศัย</h6>
<h6>อาชีพหลักในปัจจุบัน.</h6>
<h6>โรคประจำตัว 1เป็นมานาน ปีรพ.รักษาประจำ รพ.ที่ตรวจพบครั้งแรก.</h6>
<h5>2.ตรวจร่างกาย คัดกรอง</h5>
<h6>ความดันโลหิตครั้งที่ 1มม.ปรอท ความดันโลหิตครั้งที่ 2มม.ปรอท. น้ำหนัก กก. ส่วนสูง ซม. รอบเอล ซม.</h6>
<h6>ถ้าอายุ 35 ปีขึ้นและไม่ป่วยเบาหวานความดัน ให้ตรวจระดับน้ำตาลในเลือดหลังอดอาหาร ผลตรวจครั้งนี้เท่ากับ mg% 
หรือเคยตรวจครั้งสุดท้ายภายใน 1 ปี ผลตรวจเท่ากับ mg%</h6>
<h5>3.คัดกรองโรคซึมเศร้า</h5>
<h6>3.1 ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ อุกอั่ง หนหวย บ่เป็นตายอยู่ มีแต่อยากให้บ่.</h6>
<h6>3.2 ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ บ่สนใจหยัง บ่อยากเฮ้ดหยัง บ่ม่วนซื้น.</h6>
<h5>4.พฤติกรรมสุขภาพ</h5>
<h6>4.1 ทานกินผัก 5 ทัพพีต่อวันอย่างไร.</h6>
<h6>4.2 ท่านเติมเครื่องปรุงรสเค็มในอาหารที่กินหรือไม่.</h6>
<h6>4.3 ท่านเติมน้ำตาลในอาหารหรือเครื่องดื่มรสหวานหรือไม่.</h6>
<h6>4.4 ท่านได้ออกกำลังกายจนรู้สึกเหนื่อยกว่าปกติหรือไม่.</h6>
<h6>4.5 ท่านนั่งหรือเอนกายเฉยๆ ติดต่อกันเกิน 4 ชั่วโมงหรือไม่.</h6>
<h6>4.6 ท่านนอนเกิน 7 ชั่วโมงหรือไม่.</h6>
<h6>4.7 ท่านแปรงฟันก่อนนอนทุกวันหรือไม่.</h6>
<h6>4.8 ท่านใช้เวลาแปรงฟันอย่างน้อยนานกี่นาที.</h6>
<h6>4.9 การสูบบุหรี่.</h6>
<h6>4.10 ชนิดของบุหรี่.</h6>
<h6>4.11 จำนวนมวนต่อวัน</h6>
<h6>4.12 พฤติกรรมสูบมวนแรกหลังตื่นนอน.</h6>
<h6>4.13 การดื่มสุรา.</h6>
<h6>4.14 ชนิดของสุรา.</h6>
<h6>4.15 ปริมาณที่ดื่มต่อครั้ง</h6>
<h5>ผลการตรวจคัดกรองสารเคมีในเลือด.</h5>
<h6>ตรวจครั้งสุดท้ายเมื่อปี พ.ศ.</h6>
<h6>ผลการตรวจ.</h6>
<h6>การดูแลสุขภาพช่องปากเหงือก.</h6>
<h6>การตรวจเต้านม ในสตรีอายุ 30 ปีขึ้นไปตรวจด้วย.</h6>
<h6>ตรวจครั้งสุดท้ายเมื่อ.</h6>
<h6>ผลการตรวจ.</h6>
<h5>การตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30 ปีขึ้นไป.</h5>
<h6>ตรวจครั้งสุดท้ายเมื่อปี พ.ศ.</h6>
<h6>ผลการตรวจ.</h6>


EOD;
// <p>Please check the source code documentation and other examples for further information.</p>


// $path_info = pathinfo($_SERVER['REQUEST_URI']);
// $http = ($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] . "://" : "http://";
// $host = $_SERVER['SERVER_NAME'];
// $pathDir = $path_info['dirname'] . "/";
// $url = $http . $host . $pathDir;
$pdf->WriteHTML($html, true, false, true, false);
$this->pdf = $pdf->Output(null, 'I');

// ---------------------------------------------------------

// $pdf->Output('Report.pdf', "S");
