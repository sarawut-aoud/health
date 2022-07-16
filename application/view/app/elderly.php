<?php

require '../../core/session.php';
require_once '../../core/data_utllities.php';
require_once '../../model/user/elderly_model.php';
$class = new addelderly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <?php require '../../core/loadscript.php' ?>
    <!-- bt-steper -->
    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">-->
    <link rel="stylesheet" href="../../plugins/bootstrap-datepicker-thai/css/datepicker.css">
    <link rel="stylesheet" href="../../../assets/custom_style.css">

</head>
<style>
    #form_health label span {
        color: red;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php
        require '../top_navbar.php';

        require '../left_sidebar.php';
        ?>

        <div class="content-wrapper ">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h1 class="m-0">แบบบันทึกข้อมูล</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">แบบบันทึกข้อมูล</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header bg-info bg-gradient">
                                    <h5 class="card-title ">แบบบันทึกข้อมูล</h5>
                                </div>

                                <div class="mb-5 p-4 bg-white shadow-sm">

                                    <div id="stepper2" class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#test-nl-1">
                                                <button type="button" class="step-trigger" role="tab" id="stepper2trigger1" aria-controls="test-nl-1">
                                                    <span class="bs-stepper-circle">
                                                        <span class="fas fa-user" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="bs-stepper-label">เพิ่มข้อมูลผู้สูงอายุ</span>
                                                </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-nl-2">
                                                <button type="button" class="step-trigger" role="tab" id="stepper2trigger2" aria-controls="test-nl-2">
                                                    <span class="bs-stepper-circle">
                                                        <span class="fas fa-clipboard-list-check" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="bs-stepper-label">ตรวจร่างกาย คัดกรอง</span>
                                                </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-nl-3">
                                                <button type="button" class="step-trigger" role="tab" id="stepper2trigger3" aria-controls="test-nl-3">
                                                    <span class="bs-stepper-circle">
                                                        <span class="fas fa-file-user" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="bs-stepper-label">คัดกรองโรคซึมเศร้า</span>
                                                </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-nl-4">
                                                <button type="button" class="step-trigger" role="tab" id="stepper2trigger4" aria-controls="test-nl-4">
                                                    <span class="bs-stepper-circle">
                                                        <span class="fas fa-file-medical" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="bs-stepper-label">บันทึกข้อมูลสุขภาพ</span>
                                                </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-nl-5">
                                                <button type="button" class="step-trigger" role="tab" id="stepper2trigger5" aria-controls="test-nl-5">
                                                    <span class="bs-stepper-circle">
                                                        <span class="fas fa-file-medical" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="bs-stepper-label">บันทึกข้อมูลสุขภาพ (ต่อ)</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <form onSubmit="return false" id="form_health">
                                                <!-- ส่วนของเพิ่มข้อมูลผู้สูงอายุ -->
                                                <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">คำนำหน้า <span>*<span></label>
                                                                <select class="form-select py-2" id="title" name="title" autocomplete="off" placeholder="ชื่อ" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ชื่อ <span>*<span></label>
                                                                <input class="form-control py-2" id="fname" name="fname" type="text" onkeypress="not_number(event)" autocomplete="off" placeholder="ชื่อ" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">นามสกุล <span>*<span></label>
                                                                <input class="form-control py-2" id="lname" name="lname" type="text" onkeypress="not_number(event)" autocomplete="off" placeholder="นามสกุล" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">อายุ <span>*<span></label>
                                                                <input class="form-control py-2" id="age" name="age" type="text" maxlength="2" onkeypress="return onlyNumber(event)" autocomplete="off" placeholder="อายุ" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">วัน/เดือน/ปีเกิด </label>
                                                                <input class="form-control py-2" id="birthday" name="birthday" type="text" autocomplete="off" placeholder="วันเดินปีเกิด" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">บัตรประชาชน <span>*<span></label>
                                                                <input class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="X-XXXX-XXXXX-XX-X" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">เบอร์โทร <span>*<span></label>
                                                                <input class="form-control py-2" id="phone_number" name="phone_number" maxlength="10" onkeypress="return onlyNumber(event)" type="tel" autocomplete="off" placeholder="เบอร์โทร" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ที่อยู่ปัจจุบัน <span>*<span></label>
                                                                <textarea class="form-control py-2" id="address" name="address" type="tel" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">จังหวัด <span>*<span></label>
                                                                <select class="form-control select2" id="province_id" name="province_id" type="text" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">อำเภอ <span>*<span></label>
                                                                <select class="form-control select2" id="ampher_id" name="ampher_id" type="text" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ตำบล <span>*<span></label>
                                                                <select class="form-control select2" id="tumbon_id" name="tumbon_id" type="text" required>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">ถัดไป</button>
                                                </div>
                                                <!-- ส่วนของตรวจร่างกายคัดกรอง -->
                                                <div id="test-nl-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger2">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ความดันโลหิตครั้งที่ 1 <span>*<span></label>
                                                                <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="ความดันโลหิตครั้งที่ 1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ความดันโลหิตครั้งที่ 2 <span>*<span></label>
                                                                <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="โรคประจำตัว" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">น้ำหนัก <span>*<span></label>
                                                                <input class="form-control py-2" id="lname" name="lname" type="text" placeholder="น้ำหนัก" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-3 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ส่วนสูง <span>*<span></label>
                                                                <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="ส่วนสูง" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">รอบเอว <span>*<span></label>
                                                                <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="รอบเอว" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">การคลุมกำเนิด <span>*<span></label>
                                                                <select class="form-select" id="education" name="education" autocomplete="off" required>
                                                                    <?php
                                                                    echo '<option value="" selected disabled>เลือกการคลุมกำเนิด</option>';
                                                                    foreach ($contraceptive as $keye => $vale) {
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
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 1</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 1">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 2</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 2">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 3</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 3">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 4</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 4">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 5</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 5">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ถ้าอายุ 35 ปีขึ้นและไม่ป่วยเบาหวานความดัน ให้ตรวจระดับน้ำตาลในเลือดหลังอดอาหาร ผลตรวจครั้งนี้เท่ากับ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ผลตรวจ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">mg% หรือเคยตรวจครั้งสุดท้ายภายใน 1 ปี ผลตรวจเท่ากับ </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ผลตรวจ">
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="small mb-1">mg% </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">ถัดไป</button>
                                                </div>
                                                <!-- ส่วนของคัดกรองโรคซึมเศร้า -->

                                                <div id="test-nl-3" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger3">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ อุกอั่ง หนหวย บ่เป็นตายอยู่ มีแต่อยากให้บ่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                                    <label class="form-check-label" for="inlineRadio1">มี</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                                    <label class="form-check-label" for="inlineRadio2">บ่อมี๊</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ บ่สนใจหยัง บ่อยากเฮ้ดหยัง บ่ม่วนซื้น <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                                    <label class="form-check-label" for="inlineRadio3">มี</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                                    <label class="form-check-label" for="inlineRadio4">บ่อมี๊</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">ถัดไป</button>
                                                </div>

                                                <!-- ส่วนของบันทึกข้อมูลสุขภาพ -->
                                                <div id="test-nl-4" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger4">
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
                                                    <button class="btn btn-primary">ถัดไป</button>

                                                </div>
                                                <div id="test-nl-5" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger5">
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
                                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="จำนวนฟันแท้ผุ">
                                                                    <label class="mb-2 p-2">ซี่ </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">การตรวจเต้านม ในสตรีอายุ 30 ปีขึ้นไปตรวจด้วย <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                                                    <label class="form-check-label" for="inlineRadio3">ตนเอง</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                                                    <label class="form-check-label" for="inlineRadio4">บุคลากรสาธารณสุข</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group">

                                                            <div class="row g-6  align-items-center p-2">
                                                                <div class="col-auto">
                                                                    <label class="mb-1">ตรวจครั้งสุดท้ายเมื่อ<span>*<span></label>
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
                                                                        <label class="form-check-label" for="inlineRadio4">ผิดปกติ</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group">
                                                            <label class="mb-1 p-2">การตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30 ปีขึ้นไป</label>
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
                                                                        <label class="form-check-label" for="inlineRadio4">ผิดปกติ</label>
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
                            </div>
                        </div>
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




    <!-- bt-steper -->
    <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="../../../assets/user/elderly.js"></script>

    <script src="../../../assets/h_template.js"></script>
    <script>
        $(document).ready(function() {

            var stepper = new Stepper($('.bs-stepper')[0], {
                linear: false,
                animation: true,
                selectors: {
                    steps: '.step',
                    trigger: '.step-trigger',
                    stepper: '.bs-stepper'
                }
            })
            $(document).on('click', '.bs-stepper-content button', function(e) {
                stepper.next();
            })

            // stepper.to(2)

        })
    </script>
</body>

</html>