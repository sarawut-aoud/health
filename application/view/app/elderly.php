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
    #form1 label span,
    #form2 label span,
    #form3 label span,
    #form4 label span,
    #form5 label span {
        color: red;
    }

    input#username::placeholder {
        font-size: 9px;
    }

    @media (min-width: 992px) {
        input#username::placeholder {
            font-size: 14px;
        }
    }

    @media (min-width: 1200px) {
        input#username::placeholder {
            font-size: 14px;
        }
    }

    @media (min-width: 1400px) {
        input#username::placeholder {
            font-size: 14px;
        }
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
                                <li class="breadcrumb-item"><a href="<?= $_SESSION['permission'] == 'admin' ? "../admin/menu.php" : "../user/menu.php" ?>">Home</a></li>
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

                                <div class=" p-4 bg-white shadow-sm">

                                    <div id="stepper2" class="bs-stepper">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col">
                                            <div class="bs-stepper-header d-block  d-sm-block  d-md-block d-lg-block d-xl-flex d-xxl-flex " role="tablist">
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-1">
                                                    <button type="button" class="step-trigger  " role="tab" id="stepper2trigger1" aria-controls="test-nl-1">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-user" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">เพิ่มข้อมูลผู้สูงอายุ</span>
                                                    </button>
                                                </div>
                                                <div class="bs-stepper-line"></div>
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-2">
                                                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger2" aria-controls="test-nl-2">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-clipboard-list-check" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">ตรวจร่างกาย คัดกรอง</span>
                                                    </button>
                                                </div>
                                                <div class="bs-stepper-line"></div>
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-3">
                                                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger3" aria-controls="test-nl-3">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-file-user" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">คัดกรองโรคซึมเศร้า</span>
                                                    </button>
                                                </div>
                                                <div class="bs-stepper-line "></div>
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-4">
                                                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger4" aria-controls="test-nl-4">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-file-medical" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">บันทึกข้อมูลสุขภาพ</span>
                                                    </button>
                                                </div>
                                                <div class="bs-stepper-line"></div>
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-5">
                                                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger5" aria-controls="test-nl-5">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-file-medical" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">บันทึกข้อมูลสุขภาพ (ต่อ)</span>
                                                    </button>
                                                </div>
                                                <div class="bs-stepper-line"></div>
                                                <div class="step d-flex justify-content-center" data-target="#test-nl-6">
                                                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger6" aria-controls="test-nl-6">
                                                        <span class="bs-stepper-circle">
                                                            <span class="fas fa-file-medical" aria-hidden="true"></span>
                                                        </span>
                                                        <span class="bs-stepper-label">คำถามเพิ่มเติม (ถ้ามี)</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <form id="form1" class="needs-validation" novalidate>
                                                <input type="hidden" name="pd_id_doctor" value="<?= $_SESSION['pd_id']; ?>">
                                                <!-- ส่วนของเพิ่มข้อมูลผู้สูงอายุ -->
                                                <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">คำนำหน้า <span>*<span></label>
                                                                <select class="custom-select py-2" id="title" name="title" autocomplete="off" placeholder="ชื่อ" required>
                                                                    <?php
                                                                    echo '<option  selected disabled>เลือกคำนำหน้า</option>';
                                                                    foreach ($title_name as $keye => $vale) {
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
                                                                <input class="form-control py-2" id="phone_number" name="phone_number" onkeypress="return onlyNumber(event)" type="text" autocomplete="off" placeholder="เบอร์โทร" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">การศึกษา <span>*<span></label>
                                                                <select class="form-select py-2" id="education" name="education" autocomplete="off" placeholder="ชื่อ" required>
                                                                    <?php
                                                                    echo '<option  selected disabled>เลือกการศึกษา</option>';
                                                                    foreach ($education2 as $keye => $vale) {
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
                                                        <div class="col-md-8 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">อาชีพหลักในปัจจุบัน </label>
                                                                <select class="form-select py-2" id="occupation" name="occupation" autocomplete="off" placeholder="ชื่อ" required>
                                                                    <?php
                                                                    echo '<option  selected disabled>เลือกอาชีพหลักในปัจจุบัน</option>';
                                                                    foreach ($occupation as $keye => $vale) {
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
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">สถานะภาพ <span>*<span></label>
                                                                <select class="form-select py-2" id="pd_status" name="pd_status" autocomplete="off" placeholder="ชื่อ" required>
                                                                    <?php
                                                                    echo '<option  selected disabled>เลือกสถานะภาพ</option>';
                                                                    foreach ($pd_status as $keye => $vale) {
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
                                                        <div class="col-md-8 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ประเภทพักอาศัย </label>
                                                                <select class="form-select py-2" id="type_live" name="type_live" autocomplete="off" placeholder="ชื่อ" required>
                                                                    <?php
                                                                    echo '<option  selected disabled>เลือกประเภทพักอาศัย</option>';
                                                                    foreach ($housing_type as $keye => $vale) {
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
                                                    <div class=" form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ที่อยู่ปัจจุบัน <span>*<span></label>
                                                                <textarea class="form-control py-2" id="address" name="address" type="text" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน / หมู่ที่ / ถนน / ตรอก/ซอย" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">จังหวัด <span>*<span></label>
                                                                <select class="form-select select2" id="province_id" name="province_id" type="text" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">อำเภอ <span>*<span></label>
                                                                <select class="form-select select2" id="ampher_id" name="ampher_id" type="text" required>
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
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-6 col-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ชื่อเข้าใช้งานสำหรับผู้สูงอายุ </label>
                                                                <input class="form-control " id="username" name="username" type="text" placeholder="ถ้าไม่กรอกชื่อผู้เข้าใช้งาน ระบบจะตั้งค่าชื่อผู้เข้าใช้งานเป็นเบอร์โทรศัทพ์">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">รหัสเข้าใช้งานสำหรับผู้สูงอายุ <span>* ค่าเดิมเป็น 1234 <span></label>
                                                                <input class="form-control " id="password" type="text" placeholder="1234" disabled>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn btn-primary rounded-pill col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 next">ถัดไป <i class="far fa-arrow-circle-right"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="form2" class="needs-validation" novalidate>
                                                <!-- ส่วนของตรวจร่างกายคัดกรอง -->
                                                <div id="test-nl-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger2">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ความดันโลหิตครั้งที่ 1 <span>*<span></label>
                                                                <input class="form-control py-2" id="blood1" name="blood1" type="text" placeholder="ความดันโลหิตครั้งที่ 1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ความดันโลหิตครั้งที่ 2 <span>*<span></label>
                                                                <input class="form-control py-2" id="blood2" name="blood2" type="text" placeholder="ความดันโลหิตครั้งที่ 2" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">น้ำหนัก กก.<span>*<span></label>
                                                                <input class="form-control py-2" id="weight" name="weight" type="text" placeholder="น้ำหนัก" onkeypress="return onlyNumber(event)" maxlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-3 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ส่วนสูง ซม. <span>*<span></label>
                                                                <input class="form-control py-2" id="height" name="height" type="text" placeholder="ส่วนสูง" onkeypress="return onlyNumber(event)" maxlength="3" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">รอบเอว ซม. <span>*<span></label>
                                                                <input class="form-control py-2" id="waistline" name="waistline" type="text" onkeypress="return onlyNumber(event)" placeholder="รอบเอว" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">การคุมกำเนิด <span>*<span></label>
                                                                <select class="form-select" id="birth" name="birth" autocomplete="off" required>
                                                                    <?php
                                                                    echo '<option value="" selected disabled>เลือกการคุมกำเนิด</option>';
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
                                                                <input type="text" id="congen1" name="congen[]" class="form-control py-2" placeholder="โรคประจำตัว 1">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="long1" name="long[]" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hospi1" name="hospi[]" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hosfirst1" name="hosfirst[]" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 2</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="congen2" name="congen[]" class="form-control py-2" placeholder="โรคประจำตัว 2">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="long2" name="long[]" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hospi2" name="hospi[]" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hosfirst2" name="hosfirst[]" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 3</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="congen3" name="congen[]" class="form-control py-2" placeholder="โรคประจำตัว 3">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="long3" name="long[]" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hospi3" name="hospi[]" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hosfirst3" name="hosfirst[]" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 4</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="congen4" name="congen[]" class="form-control py-2" placeholder="โรคประจำตัว 4">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="long4" name="long[]" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hospi4" name="hospi[]" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hosfirst4" name="hosfirst[]" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">โรคประจำตัว 5</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="congen5" name="congen[]" class="form-control py-2" placeholder="โรคประจำตัว 5">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">เป็นมานาน</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="long5" name="long[]" class="form-control py-2" placeholder="เป็นมานาน">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hospi5" name="hospi[]" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="hosfirst5" name="hosfirst[]" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="row g-6  align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">ถ้าอายุ 35 ปีขึ้นและไม่ป่วยเบาหวานความดัน ให้ตรวจระดับน้ำตาลในเลือดหลังอดอาหาร ผลตรวจครั้งนี้เท่ากับ</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="diabetes" name="diabetes" class="form-control py-2" placeholder="ผลตรวจ">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center p-2">
                                                            <div class="col-auto">
                                                                <label class="small mb-1">mg% หรือเคยตรวจครั้งสุดท้ายภายใน 1 ปี ผลตรวจเท่ากับ </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="text" id="last" name="last" class="form-control py-2" placeholder="ผลตรวจ">
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="small mb-1">mg% </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <button class="btn btn-secondary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 previous"> <i class="far fa-arrow-circle-left"></i> ย้อนกลับ</button>

                                                        <button class="btn btn-primary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 next">ถัดไป <i class="far fa-arrow-circle-right"></i></button>

                                                    </div>
                                                </div>
                                                <!-- ส่วนของคัดกรองโรคซึมเศร้า -->
                                            </form>
                                            <form id="form3" class="needs-validation" novalidate>
                                                <div id="test-nl-3" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger3">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ อุกอั่ง หนหวย บ่เป็นตายอยู่ มีแต่อยากให้บ่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="symptom1" id="symptom1" value="0" required>
                                                                    <label class="form-check-label" for="symptom1">มี</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="symptom1" id="symptom2" value="1" required>
                                                                    <label class="form-check-label" for="symptom2">บ่อมี๊</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ในเดือนที่ผ่านมารวมมื่อนี่เจ้า(โต) มีอาการมูนี่จักหน่อยบ่ บ่สนใจหยัง บ่อยากเฮ้ดหยัง บ่ม่วนซื้น <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="symptom2" id="symptom3" value="0" required>
                                                                    <label class="form-check-label" for="symptom3">มี</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="symptom2" id="symptom4" value="1" required>
                                                                    <label class="form-check-label" for="symptom4">บ่อมี๊</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <button class="btn btn-secondary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 previous"> <i class="far fa-arrow-circle-left"></i> ย้อนกลับ</button>
                                                        <button class="btn btn-primary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 next">ถัดไป <i class="far fa-arrow-circle-right"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="form4" class="needs-validation" novalidate>
                                                <!-- ส่วนของบันทึกข้อมูลสุขภาพ -->
                                                <div id="test-nl-4" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger4">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="md-12">ทานกินผัก 5 ทัพพีต่อวันอย่างไร <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="veget" id="veget1" value="0" required>
                                                                    <label class="form-check-label" for="veget1">0-1 วันต่อสัปดาห์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="veget" id="veget2" value="1" required>
                                                                    <label class="form-check-label" for="veget2">3-6 วันต่อสัปดาห์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="veget" id="veget3" value="2" required>
                                                                    <label class="form-check-label" for="veget3">7 วันต่อสัปดาห์</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านเติมเครื่องปรุงรสเค็มในอาหารที่กินหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="condiment" id="condiment1" value="0" required>
                                                                    <label class="form-check-label" for="condiment1">ไม่เติม</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="condiment" id="condiment2" value="1" required>
                                                                    <label class="form-check-label" for="condiment2">เติมบางครั้ง</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="condiment" id="condiment3" value="2" required>
                                                                    <label class="form-check-label" for="condiment3">เติมทุกครั้ง</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านเติมน้ำตาลในอาหารหรือเครื่องดื่มรสหวานหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sweet" id="sweet1" value="0" required>
                                                                    <label class="form-check-label" for="sweet1">ไม่เติม</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sweet" id="sweet2" value="1" required>
                                                                    <label class="form-check-label" for="sweet2">เติมบางครั้ง</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sweet" id="sweet3" value="2" required>
                                                                    <label class="form-check-label" for="sweet3">เติมทุกครั้ง/ดื่มทุกวัน</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านได้ออกกำลังกายจนรู้สึกเหนื่อยกว่าปกติหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="exercise" id="exercise1" value="0" required>
                                                                    <label class="form-check-label" for="exercise1">ไม่ออกกำลังกายหรือออกกำลังกายไม่ถึงวันละ 30 นาที</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="exercise" id="exercise2" value="1" required>
                                                                    <label class="form-check-label" for="exercise2">ออกกำลังกายวันละ 30 นาทีแต่ไม่ถึง 5 วันต่อสัปดาห์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="exercise" id="exercise3" required value="2">
                                                                    <label class="form-check-label" for="exercise3">ออกกำลังกายวันละ 30 นาทีมากกว่า 5 วันต่อสัปดาห์</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านนั่งหรือเอนกายเฉยๆ ติดต่อกันเกิน 4 ชั่วโมงหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="loll" id="loll1" required value="0">
                                                                    <label class="form-check-label" for="loll1">นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงทุกวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="loll" id="loll2" required value="1">
                                                                    <label class="form-check-label" for="loll2">นั่งหรือเอนกายเฉยๆ นานเกินกว่า 4 ชั่วโมงบางวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="loll" id="loll3" required value="2">
                                                                    <label class="form-check-label" for="loll3">ในแต่ละวัน นั่งหรือเอนกายเฉยๆ น้อยกว่า 4 ชั่วโมง</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านนอนเกิน 7 ชั่วโมงหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sleep" id="sleep1" required value="0">
                                                                    <label class="form-check-label" for="sleep1">นอนไม่ถึงทุกวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sleep" id="sleep2" required value="1">
                                                                    <label class="form-check-label" for="sleep2">นอนไม่ถึงบางวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="sleep" id="sleep3" required value="2">
                                                                    <label class="form-check-label" for="sleep3">นอนเกิน 7 ชั่วโมงทุกวัน</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านแปรงฟันก่อนนอนทุกวันหรือไม่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brush" id="brush1" required value="0">
                                                                    <label class="form-check-label" for="brush1">แปรง 0-2 วันต่อสัปดาห์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brush" id="brush2" required value="1">
                                                                    <label class="form-check-label" for="brush2">แปรง 3-6 วันต่อสัปดาห์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brush" id="brush3" required value="2">
                                                                    <label class="form-check-label" for="brush3">แปรง 7 วันต่อสัปดาห์</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">ท่านใช้เวลาแปรงฟันอย่างน้อยนานกี่นาที <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brushlong" id="brushlong1" required value="0">
                                                                    <label class="form-check-label" for="brushlong1">น้อยกว่า 2 นาที</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brushlong" id="brushlong2" required value="1">
                                                                    <label class="form-check-label" for="brushlong2">2 นาที</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="brushlong" id="brushlong3" required value="2">
                                                                    <label class="form-check-label" for="brushlong3">2 นาทีขึ้นไป</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">การสูบบุหรี่ <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="cigarette" id="cigarette1" data-id="set" required value="0">
                                                                    <label class="form-check-label" for="cigarette1">ไม่สูบ</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="cigarette" id="cigarette2" required value="1">
                                                                    <label class="form-check-label" for="cigarette2">สูบนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="cigarette" id="cigarette3" required value="2">
                                                                    <label class="form-check-label" for="cigarette3">สูบเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="cigarette" id="cigarette4" required value="3">
                                                                    <label class="form-check-label" for="cigarette4">สูบเป็นประจำทุกวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="cigarette" id="cigarette5" required value="4">
                                                                    <label class="form-check-label" for="cigarette5">เคยสูบแต่เลิกแล้ว</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <button class="btn btn-secondary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 previous"> <i class="far fa-arrow-circle-left"></i> ย้อนกลับ</button>

                                                        <button class="btn btn-primary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 next">ถัดไป <i class="far fa-arrow-circle-right"></i></button>

                                                    </div>

                                                </div>
                                            </form>
                                            <form id="form5" class="needs-validation" novalidate>
                                                <!-- ส่วนของบันทึกข้อมูลสุขภาพ -->
                                                <div id="test-nl-5" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger5">
                                                    <div class="d-md-flex d-sm-block form-row p-2 " id="show_cigarate">
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
                                                                <input class="form-check-input" type="checkbox" name="num" id="num1" required value="0">
                                                                <label class="form-check-label" for="num1">1-10 มวน/วัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="num" id="num2" required value="1">
                                                                <label class="form-check-label" for="num2">11-19 มวน/วัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="num" id="num3" required value="2">
                                                                <label class="form-check-label" for="num3">20 มวน/วันขึ้นไป</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2" id="show_cigarate2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">พฤติกรรมสูบมวนแรกหลังตื่นนอน <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="after" id="after1" required value="0">
                                                                    <label class="form-check-label" for="after1">ไม่เกินครึ่ง ซม.หลังตื่น</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="after" id="after2" required value="1">
                                                                    <label class="form-check-label" for="after2">ไม่เกิน 1 ซม.หลังตื่น</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="after" id="after3" required value="2">
                                                                    <label class="form-check-label" for="after3">สูบหลังตื่นมากกว่า 1 ซม.</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">การดื่มสุรา <span>*<span></label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="drink" id="drink1" data-id="set" required value="0">
                                                                    <label class="form-check-label" for="drink1">ไม่ดื่ม</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="drink" id="drink2" required value="1">
                                                                    <label class="form-check-label" for="drink2">ดื่มนานๆ ครั้ง(เดือนละ 1-2 ครั้ง)</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="drink" id="drink3" required value="2">
                                                                    <label class="form-check-label" for="drink3">ดื่มเป็นครั้งคราว (อาทิตย์ละ 1-2 ครั้ง)</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="drink" id="drink4" required value="3">
                                                                    <label class="form-check-label" for="drink4">ดื่มเป็นประจำทุกวัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="drink" id="drink5" required value="4">
                                                                    <label class="form-check-label" for="drink5">เคยดื่มแต่เลิกแล้ว</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2" id="show_alcohol">
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
                                                                <input type="text" id="amount" name="amount" class="form-control py-2" placeholder="ปริมาณที่ดื่มต่อครั้ง" onkeypress="return onlyNumber(event)" required>
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
                                                                    <input type="text" id="bloodlast" name="bloodlast" class="form-control py-2" placeholder="ตรวจครั้งสุดท้ายเมื่อปี พ.ศ." onkeypress="return onlyNumber(event)" >
                                                                </div>
                                                                <div class="col-auto ">
                                                                    <label class="mb-1 py-2">ผลการตรวจ</label>
                                                                    <div class="form-check form-check-inline py-2">
                                                                        <input class="form-check-input" type="checkbox" name="result" id="result1" value="0" required>
                                                                        <label class="form-check-label" for="result1">ปกติ</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="result" id="result2" value="1" required>
                                                                        <label class="form-check-label" for="result2">ปลอดภัย</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="result" id="result3" value="2" required>
                                                                        <label class="form-check-label" for="result3">เสี่ยง</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="result" id="result4" value="3" required>
                                                                        <label class="form-check-label" for="result4">ไม่ปลอดภัย</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="result" id="result5" value="4" required>
                                                                        <label class="form-check-label" for="result5">ไม่เคยตรวจ</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <div class="row g-6  align-items-center p-2">
                                                                    <div class="col-auto mt-2">
                                                                        <label class="mb-1">การดูแลสุขภาพช่องปากเหงือก <span>*<span></label>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="gum" id="gum1" value="0" required>
                                                                            <label class="form-check-label" for="gum1">ปกติ</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="gum" id="gum2" value="1" required>
                                                                            <label class="form-check-label" for="gum2">บวม</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="gum" id="gum3" value="2" required>
                                                                            <label class="form-check-label" for="gum3">หนอง</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto mt-2">
                                                                        <label class="mb-1">หินปูน <span>*<span></label>
                                                                        <div class="form-check form-check-inline">

                                                                            <input class="form-check-input" type="checkbox" name="limestone" id="limestone1" value="0" required>
                                                                            <label class="form-check-label" for="limestone1">มี</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="limestone" id="limestone2" value="1" required>
                                                                            <label class="form-check-label" for="limestone2">ไม่มี</label>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-auto mt-2">
                                                                        <label class="md-4">จำนวนฟันแท้ผุ </label>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="text" id="cavities" name="cavities" class="form-control py-2" placeholder="จำนวนฟันแท้ผุ">
                                                                            <label class="mb-2 p-2">ซี่ </label>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-12 p-1">
                                                            <div class="form-group">
                                                                <label class="mb-1">การตรวจเต้านม ในสตรีอายุ 30 ปีขึ้นไปตรวจด้วย </label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="breast" id="breast1" value="0">
                                                                    <label class="form-check-label" for="breast1">ตนเอง</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="breast" id="breast2" value="1">
                                                                    <label class="form-check-label" for="breast2">บุคลากรสาธารณสุข</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group">

                                                            <div class="row g-6  align-items-center p-2">
                                                                <div class="col-auto">
                                                                    <label class="mb-1">ตรวจครั้งสุดท้ายเมื่อ</label>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <input type="text" id="breastlast" name="breastlast" class="form-control py-2" placeholder="ตรวจครั้งสุดท้ายเมื่อปี พ.ศ." onkeypress="return onlyNumber(event)">
                                                                </div>
                                                                <div class="col-auto ">
                                                                    <label class="mb-1 py-2">ผลการตรวจ</label>
                                                                    <div class="form-check form-check-inline py-2">
                                                                        <input class="form-check-input" type="checkbox" name="breastre" id="breastre1" value="0">
                                                                        <label class="form-check-label" for="breastre1">ปกติ</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="breastre" id="breastre2" value="1">
                                                                        <label class="form-check-label" for="breastre2">ผิดปกติ</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block">
                                                        <div class="form-group">
                                                            <label class="mb-1 p-2">การตรวจคัดกรองมะเร็งปากมดลูกในสตรีอายุ 30 ปีขึ้นไป</label>
                                                            <div class="row g-6  align-items-center p-2">
                                                                <div class="col-auto mt-1">
                                                                    <label class="mb-1">ตรวจครั้งสุดท้ายเมื่อปี พ.ศ. </label>
                                                                </div>
                                                                <div class="col-auto  mt-1">
                                                                    <input type="text" id="cervix" name="cervix" class="form-control py-2" placeholder="ตรวจครั้งสุดท้ายเมื่อปี พ.ศ." onkeypress="return onlyNumber(event)">
                                                                </div>
                                                                <div class="col-auto  mt-1">

                                                                    <label class="mb-1 py-2">ผลการตรวจ</label>
                                                                    <div class="form-check  py-2 form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="cervixre" id="cervixre1" value="0">
                                                                        <label class="form-check-label" for="cervixre1">ปกติ</label>
                                                                    </div>
                                                                    <div class="form-check  py-2 form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" name="cervixre" id="cervixre2" value="0">
                                                                        <label class="form-check-label " for="cervixre2">ผิดปกติ</label>
                                                                    </div>
                                                                    <div class="form-check  py-2 form-check-inline">

                                                                        <input type="text" id="cervixsub" name="cervixsub" class="form-control py-2 " placeholder="คือ">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <button class="btn btn-secondary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 previous"> <i class="far fa-arrow-circle-left"></i> ย้อนกลับ</button>

                                                        <button class="btn btn-primary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 next">ถัดไป <i class="far fa-arrow-circle-right"></i></button>

                                                    </div>
                                                </div>
                                            </form>
                                            <form id="form6" class="needs-validation" novalidate>
                                                <!-- ส่วนของบันทึกข้อมูลสุขภาพ -->
                                                <div id="test-nl-6" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper2trigger6">
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ตรวจน้ำตาลครั้งสุดท้าย </label>
                                                                <input class="form-control py-2" id="sugar" name="sugar" type="text" placeholder="mg%">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ค่าไต (Cr) </label>
                                                                <input class="form-control py-2" id="kidney" name="kidney" type="text" placeholder="ค่าไต (Cr)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">โคเลสเตอรอล (Cho) </label>
                                                                <input class="form-control py-2" id="choles" name="choles" type="text" placeholder="โคเลสเตอรอล (Cho) ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <div class="form-group">
                                                                <label class="small mb-1">ไตรกลีเซอไรด์ (Tri) </label>
                                                                <input class="form-control py-2" id="tri" name="tri" type="text" placeholder="ไตรกลีเซอไรด์ (Tri)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-1">

                                                            <div class="row">

                                                                <label class="small ">ไขมัน</label>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <input type="text" id="fat1" name="fat1" class="form-control py-2" placeholder="DHL">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <input type="text" id="fat2" name="fat2" class="form-control py-2" placeholder="LDL">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group  align-items-center py-3">
                                                            <label class="mb-1">ผลตรวจตา </label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye1" value="0">
                                                                <label class="form-check-label" for="eye1">ปกติ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye2" value="1">
                                                                <label class="form-check-label" for="eye2">เป็นต้อหิน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye3" value="2">
                                                                <label class="form-check-label" for="eye3">เป็นต้อกระจก</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye4" value="4">
                                                                <label class="form-check-label" for="eye4">สายตาสั้น</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye5" value="5">
                                                                <label class="form-check-label" for="eye5">สายตายาว</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="eye" id="eye6" value="6">
                                                                <label class="form-check-label" for="eye6">สายตาเอียง</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group  align-items-center py-3">
                                                            <label class="mb-1">ชนิดเครื่องตรวจตา </label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="type_eye" id="type_eye1" value="0">
                                                                <label class="form-check-label" for="type_eye1">เครื่องส่องตา</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="type_eye" id="type_eye2" value="1">
                                                                <label class="form-check-label" for="type_eye2">เครื่องถ่ายจอประสาทตาด้วยคอมพิวเตอร์</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="d-md-flex d-sm-block form-row p-2">
                                                        <div class="form-group  align-items-center py-3">
                                                            <label class="mb-1">ผลตรวจเท้า </label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot1" value="0">
                                                                <label class="form-check-label" for="foot1">ปกติ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot2" value="1">
                                                                <label class="form-check-label" for="foot2">เสี่ยงต่ำ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot3" value="2">
                                                                <label class="form-check-label" for="foot3">เสี่ยงปานกลาง</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot4" value="3">
                                                                <label class="form-check-label" for="foot4">เสี่ยงสูง</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot5" value="4">
                                                                <label class="form-check-label" for="foot5">เป็นแผล</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="foot" id="foot6" value="5">
                                                                <label class="form-check-label" for="foot6">ถูกตัดเท้า</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center p-3 ">

                                                        <span style="font-size: 20px;">****** ถ้าไม่มีข้อมูลในหัวข้อนี้ท่านสามารถกด <span class="text-blue">บันทึกข้อมูล</span> ได้ทันที ******</span>

                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <button class="btn btn-secondary rounded-pill col-xxl-1 col-xl-1  col-lg-2 col-md-2 col-sm-2 m-2 previous"> <i class="far fa-arrow-circle-left"></i> ย้อนกลับ</button>

                                                        <button class="btn btn-primary rounded-pill col-xxl-2 col-xl-2  col-lg-3 col-md-3 col-sm-3 m-2 save"><i class="fas fa-save"></i> บันทึกข้อมูล </button>

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
            </section>
        </div>

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
                            <div class="col-md-6 col text-start  pt-2">
                                <?= $menu['status_name'] ?>
                            </div>
                            <div class="col-md-6 col text-end">
                                <button id="btn_change_status" name="btn_change_status" value="<?= $menu['id'] ?>" class="btn btn-outline-info">เลือก</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../../plugins/inputmask/jquery.inputmask.js"></script>
    <script src="../../../assets/inputmask.js"></script>

    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>

    <script src="../../plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>
    <!-- bt-steper -->
    <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.3.0/imask.min.js"></script>

    <script src="../../../assets/user/elderly.js"></script>
    <script src="../../../assets/numlock.js"></script>
    <script src="../../../assets/h_template.js"></script>
    <script>
        $(document).ready(function() {})
    </script>
</body>

</html>