<?php
// require_once '../../core/path.php';
require_once '../../core/data_utllities.php';

require_once '../../model/user/cancer_model.php';
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
    #Formcancer label span {
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
                                <li class="breadcrumb-item"><a href="<?= $_SESSION['permission'] == 'admin' ? "../admin/menu.php" : "../user/menu.php" ?>">Home</a></li>
                                <li class="breadcrumb-item active">แบบบันทึกตรวจสุขภาพ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container p-1">
                    <div class="row  justify-content-center">
                        <div class="col-md-10">
                            <form id="Formcancer" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header bg-info bg-gradient">
                                        <h5 class="card-title ">ประเมินความเสี่ยงโรคมะเร็ง</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">เลือกผู้สูงอายุ <span>*<span></label>
                                                    <select class="form-control py-2 select2 " id="pd_id" name="pd_id" required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="show_iframe" class="col-md-2 p-1 mt-2">
                                                <div class="form-group mt-1">
                                                    <div class="input-group ">
                                                        <a class="btn btn-outline-info mt-3" id="btn_show"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="mb-1">ดื่มสุราเป็นประจำ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk1" id="chk1" value="0" target="check" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk1" id="chk2" value="1" target="check" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">รับประทานอาหารที่มีสารก่อมะเร็ง เช่น ปลาร้า ปลาจ่อม แหนม ไส้กรอก อาหารปิ้งย่างจนไหม้เกรียม <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk2" id="chk3" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk2" id="chk4" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">รับประทานอาหารที่มีราใน ถั่ว ข้าวโพด กระเทียม เต้าเจี้ยว เต้าหู้ยี้ พริกป่น พริกแห้ง <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk5" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk3" id="chk6" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">มีประวัติครอบครัว โดยเฉพาะญาติสายตรง เป็นมะเร็งตับ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk4" id="chk7" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk4" id="chk8" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">มีภาวะตับอักเสบ หรือมีการติดเชื้อของไวรัสตับอักเสบชนิด บี ซี <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk5" id="chk9" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk5" id="chk10" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">มีพยาธิใบไม้ในตับ <span>*<span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk11" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="chk6" id="chk12" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-end">
                                                    <a id="savecancer" class="btn btn-sm btn-primary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm">ยืนยันการเพิ่มข้อมูล</a>
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
    <div class="modal fade" id="show_iframe_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title ">ข้อมูลแบบปันทึกสุขภาพ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mt-3 ms-4 me-4">
                    <div class="ratio  " style="--bs-aspect-ratio:400%;">
                        <iframe title="PDF" allowfullscreen ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/user/cancer.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>