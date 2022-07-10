<?php require "./application/core/path.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title_path ?></title>


    <link rel="stylesheet" href="./assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./application/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="./assets/custom_style.css">

</head>
<style>

</style>

<body class="body_index">
    <!-- login-logo -->
    <div class="content-wrapper">
        <div class="col-10 col-sm-10 col-md-6 col-xl-3 col-xxl-3 position-absolute top-50 start-50 translate-middle">
            <div class="card shadow">
                <div class="card-header  text-center bg-info bg-gradient ">
                    <h5 class="card-title ">LOGIN</h5>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <!-- Form -->
                        <form method="POST" id="frmLogin" class="needs-validation" novalidate>

                            <div role="alert" id="loginAlert"></div>


                            <div class="  form-floating mb-3 mt-3">
                                <input type="text" name="inputUsername" id="inputUsername" class="form-control" autocomplete="off" placeholder="ชื่อเข้าใช้งาน หรือ เบอร์โทร" required />
                                <label for="floatingInputValue"> <small>ชื่อเข้าใช้งาน หรือ เบอร์โทร</small></label>
                                <div class="invalid-feedback">
                                    ชื่อเข้าใช้งาน หรือ เบอร์โทร
                                </div>
                            </div>
                            <div class=" form-floating mb-3 mt-3">
                                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" required />
                                <label for="floatingInputValue"><small>รหัสผ่าน</small></label>

                            </div>
                            <center>
                                <div class="col-12 mt-4 mb-0">
                                    <button id="btnLogin" name="btnLogin" class="btn btn-info ">เข้าสู่ระบบ</button>
                                </div>
                            </center>

                            <div class="mt-4 d-flex justify-content-around">

                                <a href="./application/view/register.php" style="font-size: 16px !important;">ลงทะเบียนเข้าสู่ระบบ</a>


                                <a href="./application/view/forget-password.php" style="font-size: 16px !important;">ลืมรหัสผ่าน</a>

                            </div>
                            <!-- /.col -->
                            <center>
                                <div class="copyright mt-4 ">
                                    Copyright &copy; 2022
                                </div>
                            </center>

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




</body>
<script src="./application/plugins/jquery/jquery.min.js"></script>
<script src="./assets/bootstrap5/js/bootstrap.min.js"></script>
<script src="./application/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- <script src="./assets/h_template.js"></script> -->
<script src="./assets/login.js"></script>


</html>