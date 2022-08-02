<?php
// require_once '../../core/path.php';
require_once '../../core/data_utllities.php';

require_once '../../model/user/dashborad_model.php';
require_once '../../core/session.php';

// $username = $_REQUEST['username'];
$sql = new dashboard();
$query = $sql->personal();
$data = mysqli_fetch_object($query);

$query2 = $sql->set_report($_SESSION['pd_id']);
$row = $query2->fetch_object();
if ($row->user_rate != '1') {
    $chk = '';
} else {
    $chk = 'disabled';
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
    <link rel="stylesheet" href="../../plugins/bootstrap-datepicker-thai/css/datepicker.css">
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
                            <form id="infomation" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" data-bs-toggle="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">ข้อมูลส่วนตัว</a>
                                            </li>
                                        </ul>
                                        <div class="card-body">
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-2 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">คำนำหน้า </label>
                                                        <select class="form-select py-2" id="title" name="title" autocomplete="off" placeholder="ชื่อ" required <?= $chk ?>>

                                                            <?php
                                                            echo '<option value="" selected disabled>เลือกคำนำหน้า</option>';
                                                            foreach ($title_name as $key => $val) {
                                                                if ($data->title == $key) {
                                                                    echo "<option selected value='$key'>$val</option>";
                                                                } else {
                                                                    echo "<option value='$key'>$val</option>";
                                                                }
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">ชื่อ </label>
                                                        <input class="form-control py-2" id="fname" name="fname" type="text" onkeypress="not_number(event)" value="<?= $data->first_name ?>" <?= $chk ?> autocomplete="off" placeholder="ชื่อ" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">นามสกุล </label>
                                                        <input class="form-control py-2" id="lname" name="lname" type="text" onkeypress="not_number(event)" value="<?= $data->last_name ?>" <?= $chk ?> autocomplete="off" placeholder="นามสกุล" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">อายุ </label>
                                                        <input class="form-control py-2" id="age" name="age" type="text" maxlength="2" onkeypress="return onlyNumber(event)" value="<?= $data->age ?>" <?= $chk ?> autocomplete="off" placeholder="อายุ" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">วัน/เดือน/ปีเกิด </label>
                                                        <input class="form-control py-2" id="birthday" name="birthday" type="text" autocomplete="off" placeholder="วันเดินปีเกิด" value="<?= $data->birthday ?>" <?= $chk ?> required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-6 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">บัตรประชาชน </label>
                                                        <input class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="" value="<?= $data->id_card ?>" <?= $chk ?> required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">เบอร์โทร </label>
                                                        <input class="form-control py-2" id="phone_number" name="phone_number" maxlength="10" <?= $chk ?> onkeypress="return onlyNumber(event)" value="<?= $data->phone_number ?>" type="text" autocomplete="off" placeholder="เบอร์โทร" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">การศึกษา </label>
                                                        <select class="form-select py-2" id="education" name="education" autocomplete="off" placeholder="ชื่อ" required>
                                                            <?php
                                                            echo '<option  selected disabled>เลือกการศึกษา</option>';
                                                            foreach ($education2 as $keye => $vale) {
                                                                if ($data->education == $keye) {
                                                                    echo "<option selected value='$keye'>$vale</option>";
                                                                } else {
                                                                    echo "<option value='$keye'>$vale</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">อาชีพหลักในปัจจุบัน </label>
                                                        <select class="form-select py-2" id="occupation" name="occupation" autocomplete="off" placeholder="ชื่อ" required>
                                                            <?php
                                                            echo '<option  selected disabled>เลือกอาชีพหลักในปัจจุบัน</option>';
                                                            foreach ($occupation as $keye => $vale) {
                                                                if ($data->occupation == $keye) {
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
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">สถานะภาพ </label>
                                                        <select class="form-select py-2" id="pd_status" name="pd_status" autocomplete="off" placeholder="ชื่อ" required>
                                                            <?php
                                                            echo '<option  selected disabled>เลือกสถานะภาพ</option>';
                                                            foreach ($pd_status as $keye => $vale) {
                                                                if ($data->pd_status == $keye) {
                                                                    echo "<option selected value='$keye'>$vale</option>";
                                                                } else {
                                                                    echo "<option value='$keye'>$vale</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">ประเภทพักอาศัย </label>
                                                        <select class="form-select py-2" id="type_live" name="type_live" autocomplete="off" placeholder="ชื่อ" required>
                                                            <?php
                                                            echo '<option  selected disabled>เลือกประเภทพักอาศัย</option>';
                                                            foreach ($housing_type as $keye => $vale) {
                                                                if ($data->type_live == $keye) {
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
                                            <div class=" form-row p-2">
                                                <div class="col-md-12 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">ที่อยู่ปัจจุบัน </label>
                                                        <textarea class="form-control py-2" id="address" name="address" type="tel" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" <?= $chk ?> required><?= $data->address ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">จังหวัด </label>
                                                        <select class="form-control select2" id="province_id" name="province_id" type="text" required <?= $chk ?>>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">อำเภอ </label>
                                                        <select class="form-control select2" id="ampher_id" name="ampher_id" type="text" required <?= $chk ?>>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">ตำบล </label>
                                                        <select class="form-control select2" id="tumbon_id" name="tumbon_id" type="text" required <?= $chk ?>>

                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-6 p-1">
                                                    <div class="form-group">
                                                        <label class="small md-1">ชื่อเข้าใช้งาน </label>
                                                        <input class="form-control py-2" id="username" name="username" type="text" value="<?= $data->username != "" ? $data->username : $data->phone_number ?>" disabled placeholder="ชื่อเข้าใช้งาน" autocomplete="off" required>
                                                        <label class="p-2"> <span id="show_username"><span></label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="d-md-flex d-sm-block form-row p-2">
                                                <div class="col-md-6 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">รหัสผ่าน </label>
                                                        <div class="input-group">
                                                            <input class=" form-control py-2" type="password" id="password-input" name="password-input" autocomplete="off" placeholder="รหัสผ่าน" maxlength="20" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 p-1">
                                                    <div class="form-group">
                                                        <label class="small mb-1">ยันยันรหัสผ่าน </label>
                                                        <div class="input-group">
                                                            <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" autocomplete="off" maxlength="20" required />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer text-end">
                                                <a id="update" class="btn btn-sm btn-warning  rounded-pill col col-xxl-2 col-xl-2 col-lg-4 col-md col-sm mt-3"><i class="fas fa-edit"></i> ยืนยันการแก้ไขข้อมูล</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" id="tumbon_set" value="<?= $data->tumbon_id ?>">
                                <input type="hidden" id="amphoe_set" value="<?= $data->ampher_id ?>">
                                <input type="hidden" id="province_set" value="<?= $data->province_id ?>">
                                <input type="hidden" name="pd_id" value="<?= $_SESSION['pd_id'] ?>">
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
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>

    <script src="../../plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>

    <script src="../../../assets/user/infomation.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>