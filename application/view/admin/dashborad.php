<?php require '../../core/path.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_path ?></title>
    <?php require '../../core/loadscript.php' ?>

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
                            <h1 class="m-0">Dashboard</h1>
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
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
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
                    </div>




                </div>
            </section>

        </div>

        <?php require '../footer.php'; ?>
    </div>

</body>

</html>