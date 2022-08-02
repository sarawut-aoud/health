<?php

require '../../core/session.php';
require_once '../../core/data_utllities.php';
require_once '../../model/admin/add_user_model.php';
$class = new addusermodel();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <?php require '../../core/loadscript.php' ?>

    <!-- <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">-->
    <link rel="stylesheet" href="../../plugins/bootstrap-datepicker-thai/css/datepicker.css">
    <link rel="stylesheet" href="../../../assets/custom_style.css">

</head>
<style>
    #FormUser label span {
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
                            <h1 class="m-0">เพิ่มข้อมูลผู้ใช้งาน</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./menu.php">Home</a></li>
                                <li class="breadcrumb-item active">เพิ่มข้อมูลผู้ใช้งาน</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <form method="POST" id="FormUser" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header  text-center bg-info bg-gradient   ">
                                        <h5 class="card-title text-black">เพิ่มข้อมูลผู้ใช้งาน</h5>
                                    </div>

                                    <div class="card-body">
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
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small md-1">ชื่อเข้าใช้งาน <span>*<span></label>
                                                    <input class="form-control py-2" id="username" name="username" type="text" placeholder="ชื่อเข้าใช้งาน" autocomplete="off" required>
                                                    <label class="p-2"> <span id="show_username"><span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small md-1">กำหนดสถานะ <span>*<span></label>
                                                    <select class="form-control py-2" id="status_id" name="status_id" required></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">รหัสผ่าน <span>*<span></label>
                                                    <div class="input-group">
                                                        <input class=" form-control py-2" type="password" id="password-input" name="password-input" autocomplete="off" placeholder="รหัสผ่าน" maxlength="20" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ยันยันรหัสผ่าน <span>*<span></label>
                                                    <div class="input-group">
                                                        <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" autocomplete="off" maxlength="20" required />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-end">
                                            <a id='cancle' class="btn btn-sm btn-secondary  rounded-pill col col-xxl-2 col-xl-2 col-lg-2 col-md col-sm mt-3">ยกเลิก</a>
                                            <a id="btnsave" class="btn btn-sm btn-primary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm mt-3"><i class="fas fa-save"></i> ยืนยันการเพิ่มข้อมูล</a>
                                            <a id="update" class="btn btn-sm btn-warning  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm mt-3"><i class="fas fa-edit"></i> ยืนยันการแก้ไขข้อมูล</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card shadow-lg border-0 rounded-lg ">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <td>สถานะ</td>
                                                    <td>บัตรประชาชน</td>
                                                    <td>ชื่อ – สกุล</td>
                                                    <td>อายุ</td>
                                                    <td>เบอร์โทร</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody align="center">
                                                <?php

                                                $sql = $class->Get_table();
                                                while ($row = $sql->fetch_object()) { ?>
                                                    <tr>
                                                        <td><?= $row->status_name ?></td>
                                                        <td><?= $row->id_card ?></td>
                                                        <td><?= $row->title . $row->first_name . "  " . $row->last_name ?></td>

                                                        <td><?= $row->age . ' ปี' ?></td>
                                                        <td><?= $row->phone_number ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-toggle">
                                                                <button value="<?= $row->pd_id ?>" id="edit" class="btn  btn-outline-warning  "><i class="fas fa-cog"></i></button>
                                                                <button value="<?= $row->pd_id ?>" id="delete" class="btn  btn-outline-danger  "><i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
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



    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>

    <script src="../../plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>
    <!-- Input mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.3.0/imask.min.js"></script>
    <script src="../../../assets/admin/add_user.js"></script>
    <script src="../../../assets/numlock.js"></script>
    <script src="../../../assets/id_card_admin.js"></script>
    <script src="../../../assets/h_template.js"></script>

</body>

</html>