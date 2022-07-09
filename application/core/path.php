<?php
$title_path = 'แบบบันทึกตรวจสุขภาพ';

function select_data($type = '')
{
    require_once 'data_utllities.php';
    if ($type = 'title') {
        $data = '<option value="">------เลือกคำนำหน้า------</option>';
        foreach ($title_name as $key => $val) {
            $data += '<option value="' . $key . '">' . $val . '</option>';
        }
        return $data;
    }

    if ($type = 'cigarate') {
        $data = '<option value="">------เลือกชนิดบุหรี่------</option>';
        foreach ($cigarate as $key => $val) {
            $data += '<option value="' . $key . '">' . $val . '</option>';
        }
        return $data;
    }
    if ($type = 'alcohol') {
        $data = '<option value="">------เลือกชนิดเหล้าสี------</option>';
        foreach ($alcohol as $key => $val) {
            $data += '<option value="' . $key . '">' . $val . '</option>';
        }
        return $data;
    }
}
