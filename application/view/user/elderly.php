<?php require '../../core/path.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <?php require '../../core/loadscript.php' ?>
  
    <!-- <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-datepicker-thai/css/datepicker.css"> -->
    <link rel="stylesheet" href="../../../assets/custom_style.css">

</head>
<style>
    #Formregister label span {
        color: red;
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
                            <h1 class="m-0">จัดการข้อมูลผู้สูงอายุ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                  
                        <div class="col-md-4">
                            <form method="POST" id="register" class="needs-validation" novalidate>
                                <div class="card shadow-lg border-0 rounded-lg ">
                                    <div class="card-header  text-center bg-info bg-gradient   ">
                                        <h5 class="card-title text-black">เพิ่มข้อมูลผู้สูงอายุ</h5>
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
                                                    <input class="form-control py-2" id="birthday" name="birthday" type="text" autocomplete="off" placeholder="วันเดินปีเกิด" required>
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
                                            <!-- <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ยันยันรหัสผ่าน</label>
                                                    <div class="input-group">
                                                        <input class=" form-control py-2" type="password" id="confirm_password" name="confirm_password"  autocomplete="off" placeholder="ยินยันรหัสผ่าน" maxlength="20" required />

                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" id="register" name="register" class="btn btn-info ">บันทึก</button>
                                                <button type="reset"   class="btn btn-danger ">ยกเลิก</button>
                                            </div>
                                        </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header  text-center bg-info bg-gradient   ">
                                <h5 class="card-title text-black">ข้อมูลผู้สูงอายุ</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td align="center">บัตรประชาชน</td>
                                            <td align="center">ชื่อ – สกุล</td>
                                            <td align="center">อายุ</td>
                                            <td align="center">วันเดือนปีเกิด</td>
                                            <td align="center">การศึกษา</td>
                                            <td align="center">สถานะภาพ</td>
                                            <td align="center">อาชีพ</td>
                                            <td align="center">ประเภทที่อยู่อาศัย</td>
                                            <td align="center">ที่อยู่ปัจจุบัน</td>
                                            <td align="center">เบอร์โทร</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>        
            </section>
        </div>

        <?php require '../footer.php'; ?>
    </div>

    <!-- ส่วนของ Modal เปลี่ยนตำแหน่ง -->
    <div class="modal fade" id="change_position" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title ">เปลี่ยนตำแหน่ง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-3 ms-4 me-4">
                    <div class="row justify-content-between p-2">
                        <div class="col-md-6 text-start">
                            แพทย์
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-outline-info">เลือก</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <!-- <script src="../../plugins/jquery/jquery.js"></script>
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script> -->
    <!-- daterangepicker -->
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>
    <!-- Input mask -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.3.0/imask.min.js"></script> -->
    <script src="../../plugins/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>
    
    <script src="../../../assets/user/elderly.js"></script>
    <script src="../../../assets/numlock.js"></script>
    <script src="../../../assets/id_card.js"></script>
    <script src="../../../assets/h_template.js"></script>
    
</body>

</html>