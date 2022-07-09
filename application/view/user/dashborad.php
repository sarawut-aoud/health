<?php 
require '../../core/path.php';
require '../../model/user/dashborad_model.php';

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
                                                    <input class="form-control py-2" id="title" name="title" type="text" value="<?php echo $data->titile; ?>" autocomplete="off" placeholder="ชื่อ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ชื่อ</label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="ชื่อ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">นามสกุล</label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" value="<?php echo $data->last_name; ?>" autocomplete="off" placeholder="นามสกุล" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-4 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">อายุ</label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="text" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="อายุ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">วันเดือนปีเกิด</label>
                                                    <input class="form-control py-2" id="fname" name="fname" type="date" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="วันเดินปีเกิด" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-sm-block form-row p-2">
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">บัตรประชาชน</label>
                                                    <input class="form-control py-2" id="id_card" name="id_card" type="tel" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="X-XXXX-XXXXX-XX-X" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">เบอร์โทร</label>
                                                    <input class="form-control py-2" id="id_card" name="id_card" type="tel" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="เบอร์โทร" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-row p-2">
                                            <div class="col-md-12 p-1">
                                                <div class="form-group">
                                                    <label class="small mb-1">ที่อยู่ปัจจุบัน</label>
                                                    <textarea class="form-control py-2" id="id_card" name="id_card" type="tel" value="<?php echo $data->first_name; ?>" autocomplete="off" placeholder="ที่อยู่ปัจจุบัน" rows="4" required></textarea>
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
                                    

                                       
                                    </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

       

        <?php require '../footer.php'; ?>
    </div>

</body>

</html>