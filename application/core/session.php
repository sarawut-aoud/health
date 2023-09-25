<?php
error_reporting(~E_NOTICE);
session_start();
$sessionlifetime = 120; //กำหนดเป็นนาที

if (isset($_SESSION["pd_id"]) && isset($_SESSION["id_card"])) {
    if (isset($_SESSION["timeLasetdActive"])) {
        $seclogin = (time() - $_SESSION["timeLasetdActive"]) / 60;
        //หากไม่ได้ Active ในเวลาที่กำหนด
        if ($seclogin > $sessionlifetime) {
            //goto logout page
            session_destroy();
            echo "<script> window.location = '../../../index.php'</script>";
            exit;
        } else {
            $_SESSION["timeLasetdActive"] = time();
        }
    } else {
        $_SESSION["timeLasetdActive"] = time();
    }
  
} else {
    echo "<script> window.location = '../../../index.php'</script>";
}
