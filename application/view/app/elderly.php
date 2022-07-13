<?php
require_once '../../core/path.php';
require '../../core/session.php';
require_once '../../core/data_utllities.php';
require_once '../../model/user/elderly.php';
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
    #Formelderly label span {
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
                            <h1 class="m-0">จัดการข้อมูลผู้สูงอายุ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <form method="POST" id="Formelderly" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header  text-center bg-info bg-gradient   ">
                                        <h5 class="card-title text-black">เพิ่มข้อมูลผู้สูงอายุ</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-3 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">คำนำหน้า <span>*<span></label>
                                                    <select class="form-select" id="title" name="title" autocomplete="off" required>

                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกคำนำหน้า</option>';
                                                        foreach ($title_name as $key => $val) {
                                                            if ($dataset == $key) {
                                                                echo "<option selected value='$key'>$val</option>";
                                                            } else {
                                                                echo "<option value='$key'>$val</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ชื่อ <span>*<span></label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" placeholder="ชื่อ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">นามสกุล <span>*<span></label>
                                                    <input class="form-control py-2" id="lname" name="lname" type="text" autocomplete="off" placeholder="นามสกุล" required>
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
                                                    <label class="small mb-1">วันเดือนปีเกิด <span>*<span></label>
                                                    <input class="form-control py-2" id="birthday" name="birthday" type="text" autocomplete="off" placeholder="วันเดินปีเกิด" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">อายุ <span>*<span></label>
                                                    <input class="form-control py-2" id="age" name="age" type="text" autocomplete="off" placeholder="อายุ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">การศึกษา <span>*<span></label>
                                                    <select class="form-select" id="education" name="education" autocomplete="off" required>
                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกการศึกษา</option>';
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
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">สถานะภาพ <span>*<span></label>
                                                    <select class="form-select" id="pd_status" name="pd_status" autocomplete="off" required>
                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกสถานะภาพ</option>';
                                                        foreach ($pd_status as $key => $val) {
                                                            if ($dataset == $key) {
                                                                echo "<option selected value='$key'>$val</option>";
                                                            } else {
                                                                echo "<option value='$key'>$val</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">อาชีพปัจจุบัน <span>*<span></label>
                                                    <select class="form-select" id="occupation" name="occupation" autocomplete="off" required>

                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกอาชีพปัจจุบัน</option>';
                                                        foreach ($occupation as $key => $val) {
                                                            if ($dataset == $key) {
                                                                echo "<option selected value='$key'>$val</option>";
                                                            } else {
                                                                echo "<option value='$key'>$val</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ประเภทที่อยู่อาศัย <span>*<span></label>
                                                    <select class="form-select" id="housing_type" name="housing_type" autocomplete="off" required>

                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกประเภทที่อยู่อาศัย</option>';
                                                        foreach ($housing_type as $key => $val) {
                                                            if ($dataset == $key) {
                                                                echo "<option selected value='$key'>$val</option>";
                                                            } else {
                                                                echo "<option value='$key'>$val</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
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
                                                    <textarea class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" required></textarea>
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

                                        <div class="card-footer text-end">
                                            <button type="reset" class="btn btn-sm btn-secondary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm mt-3">ยกเลิก</button>
                                            <button  id="elderly" name="elderly" class="btn btn-sm btn-primary  rounded-pill col col-xxl-4 col-xl-4 col-lg-4 col-md col-sm mt-3">ยืนยันการเพิ่มข้อมูล</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <div class="card shadow-lg border-0 rounded-lg ">
                                <div class="card-header  text-center bg-info bg-gradient   ">
                                    <h5 class="card-title text-black">ข้อมูลผู้สูงอายุ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <td>บัตรประชาชน</td>
                                                    <td>ชื่อ – สกุล</td>
                                                    <td>อายุ</td>
                                                    <td>วันเดือนปีเกิด</td>
                                                    <td>ที่อยู่ปัจจุบัน</td>
                                                    <td>เบอร์โทร</td>
                                                </tr>
                                            </thead>
                                            <?php
                                            $class = new addelderly();
                                            $sql = $class->Get_table();
                                            while ($row = $sql->fetch_object()) { ?>
                                                <tbody align="center">
                                                    <td><?= $row->id_card ?></td>
                                                    <td><?= $row->title . $row->first_name . "  " . $row->last_name ?></td>
                                                    <td><?= $row->age ?></td>
                                                    <td><?= $row->birthday ?></td>
                                                    <td><?= $row->address ?></td>
                                                    <td><?= $row->phone_number ?></td>
                                                </tbody>
                                            <?php } ?>
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


    <!-- <script src="../../plugins/jquery/jquery.js"></script>
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script> -->
    <!-- daterangepicker -->
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>
    <!-- Input mask -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.3.0/imask.min.js"></script> -->
    <script src="../../plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>

    <script src="../../../assets/user/elderly.js"></script>
    <script src="../../../assets/numlock.js"></script>
    <script src="../../../assets/id_card.js"></script>
    <script src="../../../assets/h_template.js"></script>

</body>

</html>