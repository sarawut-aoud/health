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

                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150 <span>คน</span></h3>
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

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>150 <span>คน</span></h3>
                                    <p>เจ้าหน้าที่สาธารณะสุข</p>
                                </div>
                                <div class="icon">
                                    <i class="fas  fa-user-md"></i>

                                </div>
                                <a class="accordion-button collapsed small-box-footer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <!-- <a href="#" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning ">
                                <div class="inner">
                                    <h3>150 <span>คน</span></h3>
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
                                    <h3>150 <span>คน</span></h3>
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

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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