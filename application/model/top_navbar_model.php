<?php
session_start();
if (isset($_SESSION['status_name'])) {
    session_unset();
    ($_SESSION['status_name']);
} else {
}

echo json_encode(array("is_success" => true));
