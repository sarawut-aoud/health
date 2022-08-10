<?php
require_once '../../core/data_utllities.php';

require_once '../../model/admin/dashborad_model.php';
require '../../core/session.php';
$class =  new dashboard_model();

require_once '../../model/user/dashborad_model.php';
$class2 =  new dashboard();
$sql2 = $class2->set_report($_SESSION['pd_id']);
$row_stat = $sql2->fetch_object();

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
    a.accordion-button:not(.collapsed)::after>i {
        transform: rotate(-180deg);
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
                            <h1 class="m-0">Dashboard </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashborad.php">Home</a></li>
                                <li class="breadcrumb-item active">หน้าแรก</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <?php

                        if ($row_stat->user_rate >= '4') {
                        ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 id="dash1"> </h3>
                                        <p>แพทย์</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hospital-user"></i>
                                    </div>

                                    <a class="accordion-button small-box-footer collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i>
                                    </a>

                                </div>
                            </div>
                        <?php
                        }
                        if ($row_stat->user_rate >= '3') {
                        ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 id="dash2"></h3>
                                        <p>เจ้าหน้าที่สาธารณะสุข</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas  fa-user-md"></i>

                                    </div>
                                    <a class="accordion-button collapsed small-box-footer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        if ($row_stat->user_rate >= '2') {
                        ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning ">
                                    <div class="inner">
                                        <h3 id="dash3"></h3>
                                        <p>อสม</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-user-nurse"></i>

                                    </div>
                                    <a class="accordion-button collapsed small-box-footer" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        ดูรายละเอียด <span class=" "><i class="fas fa-arrow-circle-right "></i></span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3 id="dash4"></h3>
                                        <p>ผู้สูงอายุ</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-user-injured"></i>
                                    </div>
                                    <a class="accordion-button collapsed small-box-footer" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <h3 class="text-center">แพทย์</h3>
                                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr align="center">
                                                        <td style="width: 30%;">ชื่อ – สกุล</td>
                                                        <td>เบอร์โทร</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = $class->get_table_1();
                                                    while ($row = $sql->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $row->title . $row->fullname; ?></td>
                                                            <td><?= $row->phone_number; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <h3 class="text-center">เจ้าหน้าที่สาธารณะสุข</h3>
                                            <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr align="center">
                                                        <td style="width: 30%;">ชื่อ – สกุล</td>
                                                        <td>เบอร์โทร</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = $class->get_table_2();
                                                    while ($row = $sql->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $row->title . $row->fullname; ?></td>
                                                            <td><?= $row->phone_number; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <h3 class="text-center">อสม.</h3>
                                            <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr align="center">
                                                        <td style="width: 30%;">ชื่อ – สกุล</td>
                                                        <td>เบอร์โทร</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = $class->get_table_3();
                                                    while ($row = $sql->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $row->title . $row->fullname; ?></td>
                                                            <td><?= $row->phone_number; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse4" class="accordion-collapse collapse show" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <h3 class="text-center">ผู้สูงอายุ</h3>
                                            <table class="table table-bordered" id="datra" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr align="center">
                                                        <td style="width: 30%;">ชื่อ – สกุล</td>
                                                        <td>เบอร์โทร</td>
                                                        <td>ผู้บันทึกผลตรวจ</td>
                                                        <td style="width: 10%;">ดูผลการตรวจ</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = $class->get_table_4();
                                                    function getname($id)
                                                    {
                                                        $class =  new dashboard_model();
                                                        $sql = $class->get_name($id);
                                                        $row = $sql->fetch_object();
                                                        return $row->title . $row->fullname;
                                                    }
                                                    while ($row = $sql->fetch_object()) { ?>
                                                        <tr>
                                                            <td><?= $row->title . $row->fullname; ?></td>
                                                            <td><?= $row->phone_number; ?></td>
                                                            <td><?= getname($row->pd_id_doctor); ?></td>
                                                            <td align="center">
                                                                <?php if ($row->em_id != '' || $row->em_id != NULL) { ?>
                                                                    <button id="view_pdf" data-id="<?= $row->pd_id; ?>" class="btn btn-info btn-sm"><i class="fas fa-clipboard-list-check"></i></button>
                                                                <?php } ?>
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

    <div class="modal fade" id="show_iframe_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title ">ข้อมูลแบบบันทึกสุขภาพ</h5>
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

    <script src="../../../assets/admin/dashborad.js"></script>
    <script src="../../../assets/h_template.js"></script>
    <script>
        $("#example1")
            .DataTable({
                // "searching": true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                // dom: "Btrip",
                buttons: {
                    dom: {
                        button: {
                            className: "btn btn-light  ",
                        },
                    },
                    buttons: [{
                        extend: "colvis",
                        className: "btn btn-outline-info",
                    }, ],
                },
                language: {
                    buttons: {
                        colvis: "เลือกดูคอลัมน์",
                    },
                },
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2")
            .DataTable({
                // "searching": true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                // dom: "Btrip",
                buttons: {
                    dom: {
                        button: {
                            className: "btn btn-light  ",
                        },
                    },
                    buttons: [{
                        extend: "colvis",
                        className: "btn btn-outline-success",
                    }, ],
                },
                language: {
                    buttons: {
                        colvis: "เลือกดูคอลัมน์",
                    },
                },
            })
            .buttons()
            .container()
            .appendTo("#example2_wrapper .col-md-6:eq(0)");
        $("#example3")
            .DataTable({
                // "searching": true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                // dom: "Btrip",
                buttons: {
                    dom: {
                        button: {
                            className: "btn btn-light  ",
                        },
                    },
                    buttons: [{
                        extend: "colvis",
                        className: "btn btn-outline-warning",
                    }, ],
                },
                language: {
                    buttons: {
                        colvis: "เลือกดูคอลัมน์",
                    },
                },
            })
            .buttons()
            .container()
            .appendTo("#example3_wrapper .col-md-6:eq(0)");
        $("#datra")
            .DataTable({
                // "searching": true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                // dom: "Btrip",
                buttons: {
                    dom: {
                        button: {
                            className: "btn btn-light  ",
                        },
                    },
                    buttons: [{
                        extend: "colvis",
                        className: "btn btn-outline-danger",
                    }, ],
                },
                language: {
                    buttons: {
                        colvis: "เลือกดูคอลัมน์",
                    },
                },
            })
            .buttons()
            .container()
            .appendTo("#example4_wrapper .col-md-6:eq(0)");
    </script>
</body>

</html>