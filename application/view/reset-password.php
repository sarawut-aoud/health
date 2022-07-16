<?php require_once '../core/data_utllities.php';
$components = parse_url($_SERVER["REQUEST_URI"]);
parse_str($components['query'], $results);

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
    <link rel="icon" href="../../assets/icon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="../../assets/bootstrap5/css/bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
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
                        <form method="" id="frmLogin" class="needs-validation" novalidate>
                            <input type="hidden" id="pd_id" value="<?php echo $results['pd_id']; ?>">
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
                                        <input class=" form-control py-2 " type="password" id="confirm_password" name="confirm_password" aria-describedby="passwordHelp" placeholder="ยินยันรหัสผ่าน" maxlength="20" required />

                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="col-12 mt-4 mb-0">
                                    <a id="btnLogin" name="btnLogin" class="btn btn-info reset">บันทึกรหัสผ่าน</a>
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

    <script src="../plugins/jquery/jquery.js"></script>
    <script src="../../assets/bootstrap5/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../../assets/forget_pass.js"></script>
    <script>

    </script>
</body>



</html>