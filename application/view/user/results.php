<?php
// require_once '../../core/path.php';
require_once '../../core/data_utllities.php';

require_once '../../model/user/results_model.php';
require_once '../../core/session.php';



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
    #Formresults label span {
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
                                <li class="breadcrumb-item active">แบบบันทึกตรวจสุขภาพ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="Formresults" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" data-bs-toggle="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">สรุปผลการตรวจคัดกรองยืนยัน</a>
                                            </li>
                                        </ul>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">เลือกผู้สูงอายุ <span>*<span></label>
                                                    <select class="form-control py-2 select2 " id="pd_id" name="pd_id" required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk1" id="chk1" value="0" target="check">
                                                        <label class="mb-1 ms-2">ไม่พบความเสี่ยง </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk2" id="chk2" value="0">
                                                        <label class="mb-1 ms-2">พบความเสี่ยงเบื้องต้นต่อโรค</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk3" value="0">
                                                        <label class="form-check-label" for="inlineRadio2">DM</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk4" value="1">
                                                        <label class="form-check-label" for="inlineRadio2">HT</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk5" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">Stroke</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk6" value="3">
                                                        <label class="form-check-label" for="inlineRadio2">Obesity</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk4" id="chk7" value="0">
                                                        <input type="text" class="form-control md-2" name="found_sub" id="found_sub" aria-label="Text input with checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk5" id="chk8" value="0">
                                                        <label class="mb-1 ms-2">ป่วยด้วยโรคเรื้อรัง</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk9" value="0">
                                                        <label class="form-check-label" for="inlineRadio2">DM</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk10" value="1">
                                                        <label class="form-check-label" for="inlineRadio2">HT</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk11" value="2">
                                                        <label class="form-check-label" for="inlineRadio2">Stroke</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk12" value="3">
                                                        <label class="form-check-label" for="inlineRadio2">Obesity</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk7" id="chk13" value="0">
                                                        <input type="text" class="form-control md-2" name="found_sub2" id="found_sub2" aria-label="Text input with checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="form-group">
                                                <label class="mb-1 p-2">การดำเนินงาน</label>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk8" id="chk14" value="0" target="check">
                                                        <label class="mb-1 ms-2">ให้คำแนะนำการดูแลตนเอง และตรวจคัดกรองซ้ำทุก 1 ปี </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk8" id="chk15" value="0" target="check">
                                                        <label class="mb-1 ms-2">ลงทะเบียนกลุ่มเสี่ยงต่อโรค Metabolic และแนะนำเข้าโครงการปรับเปลี่ยนพฤติกรรม </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk8" id="chk16" value="0" target="check">
                                                        <label class="mb-1 ms-2">ส่งต่อเพื่อรักษา</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-end">
                                            <a id="saveresults" class="btn btn-sm btn-primary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm">ยืนยันการเพิ่มข้อมูล</a>
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


    <script src="../../../assets/user/results.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>