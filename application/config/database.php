<?php
error_reporting(~E_NOTICE);
define('DB_SERVER', 'localhost'); // Hostname
define('DB_USER', 'root'); //Database Username
define('DB_PASS', ''); // Database Password
define('DB_NAME', 'db_health'); // Database Name
date_default_timezone_set('Asia/Bangkok');


class Database_set
{
    // Connect Database
    public function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $conn->set_charset("utf8");
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    function encode($pass)
    {
        $key = 'key@_health';
        $url = utf8_encode($pass);
        $base64 = base64_encode(base64_encode($url));
        $str = strrev($base64);
        $password = hash_hmac("sha256", $str, $key);
        return $password;
    }
    function decode($string)
    {
        $key = 'key@_health';
        $str = strrev($string);
        $base64 = base64_decode(base64_decode($str));
        $url = urldecode($base64);
        return $url;
    }
}
