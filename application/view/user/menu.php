<?php
require_once '../../model/left_sidebar_model.php';
require_once '../../core/path.php';
require_once '../../core/session.php';

$left  = new left_sidemodel();
$query = $left->Get_application();
$row = $query->fetch_object();
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
    #frmstatus .small span {
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
                            <h1 class="m-0">Menu </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
                                <li class="breadcrumb-item active">Menu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .alert-info {
                    color: #fff;
                    background-color: #6cccdb !important;
                    border-color: #148ea1 !important;
                }

                .alert-info:hover {
                    color: #fff;
                    background-color: #1aa0b5 !important;
                    border-color: #148ea1 !important;
                }
            </style>
            <section class="content">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm col">
                            <div class="card card-shadow ">
                                <div class="card-body text-center">
                                    <div class=" d-flex justify-content-around">
                                        <sapn class="me-4"> ชื่อ - สกุล : <?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></sapn>
                                        <sapn class="ms-4 me-5"> สถานะตำแหน่ง : <span id='user_position2'></span></sapn>
                                        <a class="ms-5 " href="./dashborad.php"><i class="fas fa-user-cog"></i> แก้ไขข้อมูลส่วนตัว</a>
                                    </div>


                                </div>
                            </div>
                            <div class="card card-shadow  ">
                                <div class="card-header  bg-gradient-info">
                                    <h5 class=" text-center">Menu </h5>
                                </div>

                                <div class="card-body text-center">
                                    <?php if ($row->user_rate != "" && $row->user_rate != NULL && $row->user_rate != '1') {
                                        if ($_SESSION['permission'] == "admin") {
                                    ?>

                                            <?php foreach ($query as $menu) {
                                                if ($menu['href_module'] != "") {
                                            ?>
                                                    <a href="<?= '..' . $menu['href_module'] ?>">
                                                        <div class="alert alert-info " role="alert">
                                                            <i class="<?= $menu['app_icon'] ?> nav-icon"></i> <?= $menu['application_name'] ?>
                                                        </div>
                                                    </a>
                                            <?php }
                                            } ?>

                                        <?php } else { ?>

                                            <?php foreach ($query as $menu) {
                                                if ($menu['href_module'] != "") {
                                            ?>
                                                    <a href="<?= '..' . $menu['href_module'] ?>">
                                                        <div class="alert alert-info " role="alert">
                                                            <i class="<?= $menu['app_icon'] ?> nav-icon"></i> <?= $menu['application_name'] ?>
                                                        </div>
                                                    </a>
                                            <?php }
                                            } ?>
                                    <?php }
                                    } ?>
                                    <hr>
                                    <?php if ($_SESSION['permission'] == "admin") { ?>

                                        <a href="../app/report.php">
                                            <div class="alert alert-info " role="alert">
                                                <i class="nav-icon fad fa-file-chart-line"></i> รายงานผลตรวจและผลการประเมินของผู้สูงอายุ
                                            </div>
                                        </a>

                                        <?php } else {
                                        if ($row->user_rate != '1' && $row->user_rate != '5') { ?>

                                            <a href="../app/report.php">
                                                <div class="alert alert-info " role="alert">
                                                    <i class="nav-icon fad fa-file-chart-line"></i> รายงานผลตรวจและผลการประเมินของผู้สูงอายุ
                                                </div>
                                            </a>


                                        <?php } else { ?>

                                            <a href="../app/report.php">
                                                <div class="alert alert-info " role="alert">
                                                    <i class="nav-icon fad fa-file-chart-line"></i> รายงานผลตรวจและผลการประเมิน
                                                </div>
                                            </a>

                                    <?php }
                                    } ?>
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
                            <div class="col-md-6 text-start  pt-2">
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


    <script src="../../../assets/admin/status.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>