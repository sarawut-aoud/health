<?php
session_start();
unset($_SESSION['title']);
unset($_SESSION['pd_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['address']);
unset($_SESSION['phone_number']);
unset($_SESSION['id_card']);
unset($_SESSION['ampher_id']);
unset($_SESSION['tumbon_id']);
unset($_SESSION['province_id']);
unset($_SESSION['status_name']);

echo json_encode(array("is_success" => true));
