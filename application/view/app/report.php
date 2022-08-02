<?php
require_once '../../core/data_utllities.php';

require_once '../../model/report_model.php';
require '../../core/session.php';
$class = new report_model();
$sql = $class->set_report($_SESSION['pd_id']);
$row = $sql->fetch_object();

if ($_SESSION['permission'] == 'admin') {
    $set = "ของผู้สูงอายุ";
} else {
    if ($row->user_rate != '1' && $row->user_rate != '5') {
        $set = "ของผู้สูงอายุ";
    } else if ($row->user_rate == '1') {
        $set = "";
    }
}
function DateThai($datetoday)
{
    $strYear = date("Y", strtotime($datetoday)) + 543;
    $strMonth = date("n", strtotime($datetoday));
    $strDay = date("j", strtotime($datetoday));

    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay - $strMonthThai - $strYear";
}
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
                            <h1 class="m-0">รายงานผลตรวจและผลการประเมิน<?= $set ?> </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= $_SESSION['permission'] == 'admin' ? "../admin/menu.php" : "../user/menu.php" ?>">Home</a></li>
                                <li class="breadcrumb-item active">รายงานผลตรวจและผลการประเมิน<?= $set ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <?php if ($row->user_rate != '1') { ?>
                        <div class="row justify-content-center">
                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm col">
                                <div class="card card-shadow  ">
                                    <div class="card-header  bg-gradient-info">
                                        <h5 class="card-title">รายงานผลตรวจและผลการประเมิน<?= $set ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-12">

                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3 id="dash5"> </h3>
                                                        <p>ไม่พบความเสี่ยง</p>
                                                        <div class="icon">
                                                            <i class="fas fa-thumbs-up"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12">

                                                <div class="small-box  bg-danger">
                                                    <div class="inner">
                                                        <h3 id="dash6"> </h3>
                                                        <p>พบความเสี่ยง</p>
                                                        <div class="icon">
                                                            <i class="far fa-exclamation-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12">

                                                <div class="small-box  bg-warning">
                                                    <div class="inner">
                                                        <h3 id="dash7"> </h3>
                                                        <p>ป่วยโรคเรื้อรัง</p>
                                                        <div class="icon">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php } ?>
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm col">
                    <div class="card card-shadow  ">
                        <div class="card-header  bg-gradient-info">
                            <h5 class="card-title">รายงานผลตรวจและผลการประเมิน<?= $set ?></h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <?php if ($row->user_rate == '1') { ?>
                                            <td style="width: 10%;">ครั้งที่</td>
                                        <?php } ?>
                                        <td style="width: 18%;">วันที่ทำเอกสาร</td>
                                        <td style="width: 30%;">ชื่อ – สกุล</td>

                                        <td style="width: 10%;">ดูผลการตรวจ</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SESSION['permission'] == 'admin') {
                                        $id = '';
                                    } else {
                                        if ($row->user_rate == '1') {
                                            $id = $_SESSION['pd_id'];
                                        }
                                    }
                                    $sql = $class->get_table($id);

                                    while ($row2 = $sql->fetch_object()) {
                                        $i = 1;

                                    ?>
                                        <tr>
                                            <?php if ($_SESSION['permission'] != 'admin') {
                                                if ($row->user_rate == '1') {
                                            ?>
                                                    <td align="center"><?php echo $i ?></td>
                                            <?php }
                                            } ?>
                                            <td><?= Datethai($row2->date) ?></td>
                                            <td><?= $row2->title . $row2->fullname ?></td>

                                            <td align="center">
                                                <button id="view_pdf" data-id="<?= $row2->pd_id ?>" class="btn btn-info btn-sm"><i class="fas fa-clipboard-list-check"></i></button>

                                            </td>

                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
                            </table>
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
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-fullscreen-md-down modal-fullscreen-lg-down">
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title ">ข้อมูลแบบปันทึกสุขภาพ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mt-3 ms-4 me-4">
                    <div class="ratio ratio-16x9">
                        <iframe title="PDF" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/h_template.js"></script>
    <script src="../../../assets/report_view.js"></script>
</body>

</html>