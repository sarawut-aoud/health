<?php
$title_path = 'แบบบันทึกตรวจสุขภาพ';

function select_data($type)
{
    require_once 'data_utllities.php';
    $data = '';
    if ($type == "title") {
        echo  '<option value="" selected disabled>คำนำหน้า</option>';

        foreach ($title_name as $key => $val) {
            echo "<option value='$key'>$val</option>";
        }
    }

    if ($type == 'cigarate') {
        echo '<option value="" selected disabled>---เลือกชนิดบุหรี่---</option>';
        foreach ($cigarate as $key => $val) {
            echo "<option value='$key'>$val</option>";
        }
    }
    if ($type == 'alcohol') {
        echo '<option value="" selected disabled>---เลือกชนิดเหล้าสี---</option>';
        foreach ($alcohol as $key => $val) {
            echo  "<option value='$key'>$val</option>";
        }
    }
}
