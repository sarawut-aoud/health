<?php
error_reporting(~E_NOTICE);
session_start();

if (isset($_SESSION["pd_id"]) && isset($_SESSION["id_card"])) {
    // ทำตรงนี้
} else {
    echo "<script> window.location = '../../../index.php'</script>";
}
