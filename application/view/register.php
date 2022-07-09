<?php require '../core/path.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <link rel="stylesheet" href="../../assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/custom_style.css">
</head>

<body class="body_index">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" id="register" class="needs-validation" novalidate>
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header  text-center bg-info bg-gradient   ">
                            <h5 class="card-title text-black">ลงทะเบียนเข้าใช้งาน</h5>
                        </div>

                        <div class="card-body">
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-2 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">คำนำหน้า</label>
                                        <select class="form-select" id="title" name="title" autocomplete="off" placeholder="ชื่อ" required>

                                            <?= select_data('title') ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ชื่อ</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" placeholder="ชื่อ" required>
                                    </div>
                                </div>
                                <div class="col-md-5 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">นามสกุล</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">อายุ</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" placeholder="อายุ" required>
                                    </div>
                                </div>
                                <div class="col-md-8 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">วันเดือนปีเกิด</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="date" autocomplete="off" placeholder="วันเดินปีเกิด" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">บัตรประชาชน</label>
                                        <input class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="X-XXXX-XXXXX-XX-X" required>
                                    </div>
                                </div>
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">เบอร์โทร</label>
                                        <input class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="เบอร์โทร" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-row p-2">
                                <div class="col-md-12 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ที่อยู่ปัจจุบัน</label>
                                        <textarea class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ตำบล</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">อำเภอ</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">จังหวัด</label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small md-1">ชื่อเข้าใช้งาน</label>
                                        <input class="form-control py-2" id="username" name="username" type="text" placeholder="ชื่อเข้าใช้งาน" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">รหัสผ่าน</label>
                                        <div class="input-group">
                                            <input class=" form-control py-2" type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="รหัสผ่าน" maxlength="20" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ยันยันรหัสผ่าน</label>
                                        <div class="input-group">
                                            <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password" aria-describedby="passwordHelp" placeholder="ยินยันรหัสผ่าน" maxlength="20" required />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" id="register" name="register" class="btn btn-info ">ยืนยันการสมัคร</button>
                                </div>
                            </div>

                </form>
            </div>
            <div class="card-footer text-center p-4">
                <div class="small"><a href="../../index.php" style="font-size: 18px;">เข้าสู่ระบบ</a></div>
            </div>
        </div>
        <!-- /card -->
    </div>




    <script src="../../assets/bootstrap5/js/bootstrap.min.js"></script>
    <script src="../../assets/h_template.js"></script>
</body>

</html>