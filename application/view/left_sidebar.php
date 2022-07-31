<?php
require_once '../../model/left_sidebar_model.php';
require_once '../../core/path.php';
$left  = new left_sidemodel();
$query = $left->Get_application();
$row = $query->fetch_object();

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link text-center">
        <!-- <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light ">ระบบสุขภาพ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-2 nav_sidebar mt-3 pb-3 mb-3 d-flex">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <?php $cut = explode("/", $_SERVER["REQUEST_URI"]);
                    if ($cut[4] == 'admin') {
                    ?>
                        <a href="./dashborad.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                </li>
            <?php } ?>

            <?php
            if ($cut[4] == 'user') {
                if ($row->user_rate != '1') {
            ?>
                    <a href="./dashboradreport.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                <?php } ?>
                <a href="./dashborad.php" class="nav-link active">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                        ข้อมูลส่วนตัว
                    </p>
                </a>
            <?php } ?>
            <?php
            if ($cut[4] == 'app') {
                if ($row->user_rate == '5') {
                    $href = '../admin/dashborad.php';
                } else {
                    $href = '../user/dashborad.php';
                }
                if ($row->user_rate != '1') {
            ?>
                <a href="<?= $href ?>" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
                <?php } if ($_SESSION['permission'] == 'user') { ?>
                    <a href="<?= $href ?>" class="nav-link active">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            ข้อมูลส่วนตัว
                        </p>
                    </a>
                <?php } ?>
            <?php } ?>
            <?php
            if ($row->user_rate == '5') {
            ?>
                <li class="nav-header">Setting</li>
                <li class="nav-item ">
                    <a href="#" class="nav-link active ">
                        <i class=" nav-icon far fa-cog"></i>
                        <p>
                            ตั้งค่า
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="../admin/status.php" class="nav-link ">
                                <i class="far fa-user-cog nav-icon"></i>
                                <span>กำหนดสถานะ</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../admin/application.php" class="nav-link ">
                                <i class="fas fa-shield-check nav-icon"></i>
                                <span>กำหนดสิทธิ์การเข้าถึงแอป</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../admin/add_user.php" class="nav-link ">
                                <i class="far fa-user nav-icon"></i>
                                <span>ผู้ใช้งานระบบ</span>
                            </a>

                        </li>

                    </ul>
                </li>
            <?php } ?>
            <!-- ส่วนของเพิ่มข้อมูล -->
            <?php if ($row->user_rate != "" && $row->user_rate != NULL && $row->user_rate != '1') {
                if ($_SESSION['permission'] == "admin") {
            ?>
                    <li class="nav-header">Infomation</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>
                                เพิ่มข้อมูล
                                <i class="far fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($query as $menu) {
                                if ($menu['href_module'] != "") {
                            ?>
                                    <li class="nav-item">
                                        <a href="<?= '..' . $menu['href_module'] ?>" class="nav-link">
                                            <i class="<?= $menu['app_icon'] ?> nav-icon"></i>
                                            <span><?= $menu['application_name'] ?></span>
                                        </a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-header">Infomation</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>
                                เพิ่มข้อมูล
                                <i class="far fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($query as $menu) {
                                if ($menu['href_module'] != "") {
                            ?>
                                    <li class="nav-item">
                                        <a href="<?= '..' . $menu['href_module'] ?>" class="nav-link">
                                            <i class="<?= $menu['app_icon'] ?> nav-icon"></i>
                                            <span><?= $menu['application_name'] ?></span>
                                        </a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </li>


            <?php }
            } ?>
            <!-- ส่วนของรายงานข้อมูล -->
            <li class="nav-header">Report</li>
            <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link active">

                    <p>
                        รายงานข้อมูล
                        <i class="far fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <?php if ($_SESSION['permission'] == "admin") { ?>
                        <li class="nav-item ">
                            <a href="../app/report.php" class="nav-link  ">
                                <i class="nav-icon fad fa-file-chart-line"></i>
                                <p>รายงานผลตรวจและผลการประเมินของผู้สูงอายุ</p>
                            </a>
                        </li>
                        <?php } else {
                        if ($row->user_rate != '1' && $row->user_rate != '5') { ?>
                            <li class="nav-item ">
                                <a href="../app/report.php" class="nav-link  ">
                                    <i class="nav-icon fad fa-file-chart-line"></i>
                                    <p>รายงานผลตรวจและผลการประเมินของผู้สูงอายุ</p>
                                </a>
                            </li>

                        <?php } else { ?>
                            <li class="nav-item ">
                                <a href="../app/report.php" class="nav-link  ">
                                    <i class="nav-icon fad fa-file-chart-line"></i>
                                    <p>รายงานผลตรวจและผลการประเมิน</p>
                                </a>
                            </li>
                    <?php }
                    } ?>
                </ul>

            </ul>

        </nav>


        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>