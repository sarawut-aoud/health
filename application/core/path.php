<?php
$title_path = 'แบบบันทึกตรวจสุขภาพ';

function select_data($type, $dataset = '')
{
    require_once 'data_utllities.php';

    if ($type == "title") {
        if (!empty($dataset)) {
            foreach ($title_name as $key => $val) {
                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo  '<option value="" selected disabled>คำนำหน้า</option>';
            foreach ($title_name as $key => $val) {
                echo "<option value='$key'>$val</option>";
            }
        }
    }

    if ($type == 'cigarate') {
        if (!empty($dataset)) {
            foreach ($cigarate as $key => $val) {

                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---เลือกชนิดบุหรี่---</option>';
            foreach ($cigarate as $key => $val) {
                echo "<option value='$key'>$val</option>";
            }
        }
    }
    if ($type == 'alcohol') {
        if (!empty($dataset)) {
            foreach ($cigarate as $key => $val) {
                if ($alcohol == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---เลือกชนิดเหล้าสี---</option>';
            foreach ($alcohol as $key => $val) {
                echo  "<option value='$key'>$val</option>";
            }
        }
    }
}
