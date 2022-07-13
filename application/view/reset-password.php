<?php require_once '../../core/data_utllities.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title_path ?></title>
    <link rel="stylesheet" href="../../assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/custom_style.css">
</head>
<style>

</style>

<body class="body_index">
    <!-- login-logo -->
    <div class="content-wrapper">
        <div class="col-10 col-sm-10 col-md-6 col-xl-3 col-xxl-3 position-absolute top-50 start-50 translate-middle">
            <div class="card shadow">
                <div class="card-header  text-center bg-info bg-gradient ">
                    <h5 class="card-title ">ขอรหัสผ่านใหม่</h5>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <!-- Form -->
                        <form method="POST" id="frmLogin" class="needs-validation" novalidate>

                            <div role="alert" id="loginAlert"></div>


                            <div class="col-md-12 p-1">
                                <div class="form-group">
                                    <label class="small mb-1">รหัสผ่าน</label>
                                    <div class="input-group">
                                        <input class=" form-control py-2" type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="รหัสผ่าน" maxlength="20" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 p-1">
                                <div class="form-group">
                                    <label class="small mb-1">ยันยันรหัสผ่าน</label>
                                    <div class="input-group">
                                        <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password" aria-describedby="passwordHelp" placeholder="ยินยันรหัสผ่าน" maxlength="20" required />

                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="col-12 mt-4 mb-0">
                                    <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-info ">บันทึกรหัสผ่าน</button>
                                </div>
                            </center>

                            <div class="mt-4 d-flex justify-content-around">

                                <a href="../../index.php" style="font-size: 16px !important;">เข้าสู่ระบบ</a>

                            </div>
                            <!-- /.col -->
                        </form>
                        <!-- /.Form -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>

    </div>


    <script src="../../assets/bootstrap5/js/bootstrap.min.js"></script>
    <script src="../../assets/javascript/h_tempalt.js"></script>

</body>



</html>