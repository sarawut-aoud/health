<?php
require_once '../../core/data_utllities.php';
require_once '../../model/admin/application_model.php';
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
    #frmapplication label span {
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
                                <div class="card-header  bg-gradient-info">
                                    <h5 class="card-title">กำหนดสิทธิ์การเข้าถึง</h5>
                                </div>
                                <form action="" id="frmapplication" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">เลือกผู้ใช้งาน <span>*<span></label>
                                                    <select class="form-control py-2 select2" id="pd_id" name="pd_id" required>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group ">
                                                    <label class="small mb-1">เลือกสิทธิ์ที่ให้เข้าถึง <span>*<span></label>
                                                    <div class="d-flex d-sm-block d-xxl-flex d-xl-flex" id="application_show">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-end">
                                        <a id="cancle" class="btn btn-sm btn-secondary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm">ยกเลิก</a>

                                        <a id="updateStatus" class="btn btn-sm btn-warning  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm"><i class="fas fa-edit"></i> ยืนยันการแก้ไขข้อมูล</a>
                                        <a id="saveStatus" class="btn btn-sm btn-primary  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm"><i class="fas fa-save"></i> ยืนยันการเพิ่มข้อมูล</a>
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
                                                    <td style="width:15%;">สถานะ</td>
                                                    <td style="width: 30%;">ชื่อ – สกุล</td>
                                                    <td>สิทธิ์ที่เข้าถึง</td>
                                                    <td style="width: 20%;"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                function set_input($name)
                                                {
                                                    if ($name != null) {
                                                        echo '<div class="custom-control custom-checkbox ms-3 ">';
                                                        echo '<input class="custom-control-input" type="checkbox" checked="checked" disabled >';
                                                        echo '<label  class="custom-control-label">' . $name . '</label>';
                                                        echo '</div>';
                                                    }
                                                }
                                                $class = new application_model();
                                                $sql = $class->Get_table();
                                                while ($row = $sql->fetch_object()) { ?>
                                                    <tr>
                                                        <td><?= $row->status_name ?></td>
                                                        <td><?= $row->fullname ?></td>

                                                        <td>
                                                            <div class="d-sm-block d-xxl-blcok d-xl-blcok ">
                                                                <?php
                                                                foreach ($class->Get_table_status($row->pd_id) as $status) {

                                                                    set_input($status['application_name']);
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td align="center">
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


    <script src="../../../assets/admin/application.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>