<?php
// require_once '../../core/path.php';
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
<style>
    #Formscreening label span {
        color: red;
    }
</style>

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
                            <h1 class="m-0">แบบบันทึกตรวจสุขภาพ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="Formscreening" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary mb-0" data-bs-toggle="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">ตรวจร่างกาย คัดกรอง</a>
                                            </li>
                                        </ul>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ความดันโลหิตครั้งที่ 1 <span>*<span></label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="ความดันโลหิตครั้งที่ 1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ความดันโลหิตครั้งที่ 2 <span>*<span></label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="โรคประจำตัว" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">น้ำหนัก <span>*<span></label>
                                                    <input class="form-control py-2" id="lname" name="lname" type="text" placeholder="น้ำหนัก" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-3 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ส่วนสูง <span>*<span></label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="ส่วนสูง" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">รอบเอว <span>*<span></label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" placeholder="รอบเอว" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">การคลุมกำเนิด <span>*<span></label>
                                                    <select class="form-select" id="education" name="education" autocomplete="off" required>
                                                        <?php
                                                        echo '<option value="" selected disabled>เลือกการคลุมกำเนิด</option>';
                                                        foreach ($contraceptive as $keye => $vale) {
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
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">โรคประจำตัว 1</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 1">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">เป็นมานาน</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">โรคประจำตัว 2</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 2">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">เป็นมานาน</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">โรคประจำตัว 3</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 3">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">เป็นมานาน</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">โรคประจำตัว 4</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 4">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">เป็นมานาน</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">โรคประจำตัว 5</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="โรคประจำตัว 5">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">เป็นมานาน</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="เป็นมานาน">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ปี รพ.รักษาประจำ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.รักษาประจำ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">รพ.ที่ตรวจพบครั้งแรก</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="รพ.ที่ตรวจพบครั้งแรก">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="row g-6  align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">ถ้าอายุ 35 ปีขึ้นและไม่ป่วยเบาหวานความดัน ให้ตรวจระดับน้ำตาลในเลือดหลังอดอาหาร ผลตรวจครั้งนี้เท่ากับ</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ผลตรวจ">
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center p-2">
                                                <div class="col-auto">
                                                    <label class="small mb-1">mg% หรือเคยตรวจครั้งสุดท้ายภายใน 1 ปี ผลตรวจเท่ากับ </label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="inputPassword6" name="fname" class="form-control py-2" placeholder="ผลตรวจ">
                                                </div>
                                                <div class="col-auto">
                                                    <label class="small mb-1">mg% </label>
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


    <script src="../../../assets/user/infomation.js"></script>
    <script src="../../../assets/h_template.js"></script>
</body>

</html>