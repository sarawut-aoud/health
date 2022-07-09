<?php require '../core/path.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>

    <link rel="stylesheet" href="../../assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/custom_style.css">
</head>
<style>
    #Formregister label span {
        color: red;
    }
</style>

<body class="body_index">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" id="Formregister" class="needs-validation" novalidate>
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header  text-center bg-info bg-gradient   ">
                            <h5 class="card-title text-black">ลงทะเบียนเข้าใช้งาน</h5>
                        </div>

                        <div class="card-body">
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-2 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">คำนำหน้า <span>*<span></label>
                                        <select class="form-select" id="title" name="title" autocomplete="off" placeholder="ชื่อ" required>

                                            <?= select_data('title') ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ชื่อ <span>*<span></label>
                                        <input class="form-control py-2" id="fname" name="fname" type="text" onkeypress="not_number(event)" autocomplete="off" placeholder="ชื่อ" required>
                                    </div>
                                </div>
                                <div class="col-md-5 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">นามสกุล <span>*<span></label>
                                        <input class="form-control py-2" id="lname" name="lname" type="text" onkeypress="not_number(event)" autocomplete="off" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">อายุ <span>*<span></label>
                                        <input class="form-control py-2" id="age" name="age" type="tel" onkeypress="number(event)" autocomplete="off" placeholder="อายุ" required>
                                    </div>
                                </div>
                                <div class="col-md-8 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">วัน/เดือน/ปีเกิด </label>
                                        <input class="form-control py-2" id="birthday" name="birthday" onkeypress="not_number(event)" type="date" autocomplete="off" placeholder="วันเดินปีเกิด" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">บัตรประชาชน <span>*<span></label>
                                        <input class="form-control py-2" id="id_card" name="id_card" type="tel" autocomplete="off" placeholder="X-XXXX-XXXXX-XX-X" required>
                                    </div>
                                </div>
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">เบอร์โทร <span>*<span></label>
                                        <input class="form-control py-2" id="phone_number" name="phone_number" type="tel"  autocomplete="off" placeholder="เบอร์โทร" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-row p-2">
                                <div class="col-md-12 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ที่อยู่ปัจจุบัน <span>*<span></label>
                                        <textarea class="form-control py-2" id="address" name="address" type="tel" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">จังหวัด <span>*<span></label>
                                        <select class="form-control select2" id="province_id" name="province_id" type="text" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">อำเภอ <span>*<span></label>
                                        <select class="form-control select2" id="ampher_id" name="ampher_id" type="text" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ตำบล <span>*<span></label>
                                        <select class="form-control select2" id="tumbon_id" name="tumbon_id" type="text" required>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small md-1">ชื่อเข้าใช้งาน <span>*<span></label>
                                        <input class="form-control " id="username" name="username" type="text" placeholder="ชื่อเข้าใช้งาน" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-md-flex d-sm-block form-row p-2">
                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">รหัสผ่าน <span>*<span></label>
                                        <div class="input-group">
                                            <input class=" form-control py-2" type="password" id="password-input" name="password-input" autocomplete="off" placeholder="รหัสผ่าน" maxlength="20" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 p-1">
                                    <div class="form-group">
                                        <label class="small mb-1">ยันยันรหัสผ่าน <span>*<span></label>
                                        <div class="input-group">
                                            <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" autocomplete="off" maxlength="20" required />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" d-flex justify-content-center">
                                <div class="form-group mt-4 mb-0">
                                    <button id="register" name="register" class="btn btn-info ">ยืนยันการสมัคร</button>
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



    <script src="../plugins/jquery/jquery.js"></script>

    <script src="../../assets/bootstrap5/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <script src="../../assets/h_template.js"></script>
    <script src="../../assets/register.js"></script>
    <script src="../../assets/numlock.js"></script>

</body>

</html>