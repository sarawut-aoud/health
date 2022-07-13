<?php
require_once '../../core/data_utllities.php';


require '../../core/session.php';
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
    #frmstatus span {
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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">กำหนดสิทธิ์การเข้าถึงแอป </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashborad.php">Home</a></li>
                                <li class="breadcrumb-item active">กำหนดสิทธิ์การเข้าถึง</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm col">
                            <div class="card card-shadow  ">
                                <div class="card-header  bg-gradient-blue">
                                    <h5 class="card-title">กำหนดสิทธิ์การเข้าถึง</h5>
                                </div>
                                <form action="" id="frmstatus" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">เลือกผู้ใช้งาน <span>*<span></label>
                                                    <select class="form-control py-2" id="pd_id" name="pd_id" required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7 p-1">
                                                <div class="form-group ">
                                                    <label class="small mb-1">เลือกสถานะ <span>*<span></label>
                                                    <div class="d-flex">
                                                        <div class="custom-control custom-checkbox mt-2 ms-5">
                                                            <input class="custom-control-input" type="checkbox" id="status_name1" name="status_name" value="1">
                                                            <label for="status_name1" class="custom-control-label">Admin</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox mt-2 ms-5">
                                                            <input class="custom-control-input" type="checkbox" id="status_name2" name="status_name" value="2">
                                                            <label for="status_name2" class="custom-control-label">แพทย์</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox mt-2 ms-5">
                                                            <input class="custom-control-input" type="checkbox" id="status_name3" name="status_name" value="3">
                                                            <label for="status_name3" class="custom-control-label">เจ้าหน้าที่สาธารณะสุข</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox mt-2 ms-5">
                                                            <input class="custom-control-input" type="checkbox" id="status_name4" name="status_name" value="4">
                                                            <label for="status_name4" class="custom-control-label">อสม.</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-end">
                                        <button id="saveStatus" class="btn btn-sm btn-primary  rounded-pill col-2">ยืนยันการเพิ่มข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm col">
                            <div class="card card-shadow">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <td>ชื่อ – สกุล</td>
                                                    <td>สถานะ</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td>ชื่อ – สกุล</td>
                                                <td>สถานะ</td>
                                                <td align="center" style="width: 20% ;">
                                                    <div class="btn-group btn-group-toggle">
                                                        <button id="edit" class="btn  btn-outline-warning  "><i class="fas fa-cog"></i></button>
                                                        <button id="delete" class="btn  btn-outline-danger  "><i class="fas fa-trash-alt"></i></button>
                                                    </div>

                                                </td>
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


    <script src="../../../assets/admin/dashborad.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>