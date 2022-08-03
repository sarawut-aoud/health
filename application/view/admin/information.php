<?php

require_once '../../core/data_utllities.php';

require_once '../../model/user/dashborad_model.php';
require_once '../../core/session.php';

// $username = $_REQUEST['username'];
$sql = new dashboard();
$query = $sql->personal();
$data = mysqli_fetch_object($query);

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
                            <h1 class="m-0">โปรไฟล์</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./menu.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="register" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" data-bs-toggle="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">ข้อมูลส่วนตัว</a>
                                            </li>
                                        </ul>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-2 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">คำนำหน้า</label>
                                                    <select class="custom-select py-2" id="title" name="title" autocomplete="off" placeholder="ชื่อ" disabled>
                                                        <?php
                                                        echo '<option  selected disabled>เลือกคำนำหน้า</option>';
                                                        foreach ($title_name as $keye => $vale) {
                                                            if ($data->title == $keye) {
                                                                echo "<option selected value='$keye'>$vale</option>";
                                                            } else {
                                                                echo "<option value='$keye'>$vale</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ชื่อ</label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" value="<?php echo $data->first_name; ?>" placeholder="ชื่อ" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">นามสกุล</label>
                                                    <input class="form-control py-2" id="lname" name="lname" type="text" value="<?php echo $data->last_name; ?>" placeholder="นามสกุล" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">อายุ</label>
                                                    <input class="form-control py-2" id="age" name="age" type="text" value="<?php echo $data->age; ?>" placeholder="อายุ" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-8 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">วันเดือนปีเกิด</label>
                                                    <input class="form-control py-2" id="birthday" name="birthday" type="text" value="<?php echo $data->birthday; ?>" placeholder="วันเดินปีเกิด" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">บัตรประชาชน</label>
                                                    <input class="form-control py-2" id="id_card" name="id_card" type="tel" value="<?php echo $data->id_card; ?>" placeholder="X-XXXX-XXXXX-XX-X" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">เบอร์โทร</label>
                                                    <input class="form-control py-2" id="phone_number" name="phone_number" type="tel" value="<?php echo $data->phone_number; ?>" placeholder="เบอร์โทร" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ที่อยู่ปัจจุบัน</label>
                                                    <input class="form-control py-2" id="address" name="address" type="text" value="<?php echo $data->address; ?>" placeholder="ที่อยู่ปัจจุบัน" rows="4" disabled></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ตำบล</label>
                                                    <input class="form-control py-2" id="tumbon_id" name="tumbon_id" type="text" disabled>
                                                    <input type="hidden" id="tumbon_set" value="<?php echo $data->tumbon_id; ?>">

                                                </div>
                                            </div>
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">อำเภอ</label>
                                                    <input class="form-control py-2" id="amphoe_id" name="amphoe_id" type="text" disabled>
                                                    <input type="hidden" id="amphoe_set" value="<?php echo $data->ampher_id; ?>">

                                                </div>
                                            </div>
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">จังหวัด</label>
                                                    <input class="form-control py-2" id="province_id" name="province_id" type="text" disabled>
                                                    <input type="hidden" id="province_set" value="<?php echo $data->province_id; ?>">

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


    <script src="../../../assets/user/infomation.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>