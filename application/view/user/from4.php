<?php
// require_once '../../core/path.php';
require_once '../../core/data_utllities.php';

require_once '../../model/user/dashborad_model.php';
require_once '../../core/session.php';

// $username = $_REQUEST['username'];
$sql = new dashboard();
$query = $sql->personal();
$data = mysqli_fetch_object($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <?php require '../../core/loadscript.php' ?>
    <link rel="stylesheet" href="../../../assets/custom_style.css">
</head>
<style>
    #Formscreening label span {
        color: red;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php
        require '../top_navbar.php';

        require '../left_sidebar.php';
        ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">แบบบันทึกตรวจสุขภาพ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="Formscreening" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" data-bs-toggle="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">พฤติกรรมสุขภาพ</a>
                                            </li>
                                        </ul>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="md-12">ทานกินผัก 5 ทัพพีต่อวันอย่างไร <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                        <label class="form-check-label" for="inlineRadio1">0-1 วันต่อสัปดาห์</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">3-6 วันต่อสัปดาห์</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">7 วันต่อสัปดาห์</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านเติมเครื่องปรุงรสเค็มในอาหารที่กินหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่เติม</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">เติมบางครั้ง</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">เติมทุกครั้ง</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านเติมน้ำตาลในอาหารหรือเครื่องดื่มรสหวานหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่เติม</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">เติมบางครั้ง</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">เติมทุกครั้ง/ดื่มทุกวัน</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านได้ออกกำลังกายจนรู้สึกเหนื่อยกว่าปกติหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่ออกกำลังกายหรือออกกำลังกายไม่ถึงวันละ 30 นาที</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">ออกกำลังกายวันละ 30 นาทีแต่ไม่ถึง 5 วันต่อสัปดาห์</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">ออกกำลังกายวันละ 30 นาทีมากกว่า 5 วันต่อสัปดาห์</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านนั่งหรือเอนกายเฉยๆ ติดต่อกันเกิน 4 ชั่วโมงหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงบางวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">ในแต่ละวัน นั่งหรือเอนกายเฉยๆ น้อยกว่า 4 ชั่วโมง</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านนอนเกิน 7 ชั่วโมงหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">นอนไม่ถึงทุกวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">นอนไม่ถึงบางวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">นอนเกิน 7 ชั่วโมงทุกวัน</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านแปรงฟันก่อนนอนทุกวันหรือไม่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">แปรง 0-2 วันต่อสัปดาห์</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">แปรง 3-6 วันต่อสัปดาห์</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">แปรง 7 วันต่อสัปดาห์</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ท่านใช้เวลาแปรงฟันอย่างน้อยนานกี่นาที <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">น้อยกว่า 2 นาที</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">2 นาที</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">2 นาทีขึ้นไป</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">การสูบบุหรี่ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่สูบ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">สูบเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">สูบเป็นประจำทุกวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">เคยสูบแต่เลิกแล้ว</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="mb-1">ชนิดของบุหรี่</label>
                                                </div>
                                                <div class="col-auto">
                                                    <select class="form-select" id="cigarate" name="cigarate" autocomplete="off" required>
                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกชนิดของบุหรี่</option>';
                                                        foreach ($cigarate as $keye => $vale) {
                                                            if ($dataset == $keye) {
                                                                echo "<option selected value='$keye'>$vale</option>";
                                                            } else {
                                                                echo "<option value='$keye'>$vale</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group  align-items-center py-3">
                                                <label class="mb-1">จำนวนมวนต่อวัน <span>*<span></label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                    <label class="form-check-label" for="inlineRadio3">1-10 มวน/วัน</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                    <label class="form-check-label" for="inlineRadio4">11-19 มวน/วัน</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">20 มวน/วันขึ้นไป</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">พฤติกรรมสูบมวนแรกหลังตื่นนอน <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่เกินครึ่ง ซม.หลังตื่น</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">ไม่เกิน 1 ซม.หลังตื่น</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">สูบหลังตื่นมากกว่า 1 ซม.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">การดื่มสุรา <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่ดื่ม</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">ดื่มนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">ดื่มเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">ดื่มเป็นประจำทุกวัน</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">เคยดื่มแต่เลิกแล้ว</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="mb-1">ชนิดของสุรา <span>*<span></label>
                                                </div>
                                                <div class="col-auto">
                                                    <select class="form-select" id="alcohol" name="alcohol" autocomplete="off" required>
                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกชนิดของสุรา</option>';
                                                        foreach ($alcohol as $keye => $vale) {
                                                            if ($dataset == $keye) {
                                                                echo "<option selected value='$keye'>$vale</option>";
                                                            } else {
                                                                echo "<option value='$keye'>$vale</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="mb-1">ปริมาณที่ดื่มต่อครั้ง <span>*<span></label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ปริมาณที่ดื่มต่อครั้ง">
                                                </div>
                                                <div class="col-auto">
                                                    <label class="mb-1">ก๊ง กั๊ก แบน ขวด </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="form-group">
                                                <label class="mb-1 p-2">ผลการตรวจคัดกรองสารเคมีในเลือด</label>
                                                <div class="row g-6  align-items-center p-2">
                                                    <div class="col-auto">
                                                        <label class="mb-1">ตรวจครั้งสุดท้ายเมื่อปี พ.ศ. <span>*<span></label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ตรวจครั้งสุดท้ายเมื่อปี พ.ศ.">
                                                    </div>
                                                    <div class="col-auto ">
                                                        <label class="mb-1 py-2">ผลการตรวจ</label>
                                                        <div class="form-check form-check-inline py-2">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                            <label class="form-check-label" for="inlineRadio3">ปกติ</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                            <label class="form-check-label" for="inlineRadio4">ปลอดภัย</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                            <label class="form-check-label" for="inlineRadio4">เสี่ยง</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                            <label class="form-check-label" for="inlineRadio4">ไม่ปลอดภัย</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                            <label class="form-check-label" for="inlineRadio4">ไม่เคยตรวจ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">การดูแลสุขภาพช่องปากเหงือก <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ปกติ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                        <label class="form-check-label" for="inlineRadio4">บวม</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">หนอง</label>
                                                    </div>
                                                    <label class="mb-1">หินปูน <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">มี</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">ไม่มี</label>
                                                    </div>
                                                    <label class="md-4">จำนวนฟันแท้ผุ </label>
                                                    <div class="form-check form-check-inline">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ผลตรวจ">
                                                        <label class="mb-2 p-2">ซี่ </label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php require '../footer.php'; ?>
    </div>
    <input type="hidden" id="personal_id" value="<?= $_SESSION['pd_id'] ?>">
    <!-- ส่วนของ Modal เปลี่ยนตำแหน่ง -->
    <div class="modal fade" id="change_position" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title ">เปลี่ยนตำแหน่ง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mt-3 ms-4 me-4">
                    <?php
                    require_once '../../model/user_status_model.php';
                    $class = new user_change();
                    $query = $class->Get_status_name();
                    foreach ($query as $menu) {
                    ?>
                        <div class="row justify-content-between p-2">
                            <div class="col-md-6 text-start">
                                <?= $menu['status_name'] ?>
                            </div>
                            <div class="col-md-6 text-end">
                                <button id="btn_change_status" name="btn_change_status" value="<?= $menu['id'] ?>" class="btn btn-outline-info">เลือก</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <script src="../../../assets/user/infomation.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>