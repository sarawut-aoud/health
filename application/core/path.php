<?php
error_reporting(~E_NOTICE);

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
                if ($dataset == $key) {
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

    if ($type == 'education') {
        if (!empty($dataset)) {
            foreach ($education as $key => $val) {
                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---การศึกษา---</option>';
            foreach ($education as $key => $val) {
                echo  "<option value='$key'>$val</option>";
            }
        }
    }

    if ($type == 'pd_status') {
        if (!empty($dataset)) {
            foreach ($pd_status as $key => $val) {
                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---สถานะภาพ---</option>';
            foreach ($pd_status as $key => $val) {
                echo  "<option value='$key'>$val</option>";
            }
        }
    }

    if ($type == 'occupation') {
        if (!empty($dataset)) {
            foreach ($occupation as $key => $val) {
                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---อาชีพปัจจุบัน---</option>';
            foreach ($occupation as $key => $val) {
                echo  "<option value='$key'>$val</option>";
            }
        }
    }
    if ($type == 'housing_type') {
        if (!empty($dataset)) {
            foreach ($housing_type as $key => $val) {
                if ($dataset == $key) {
                    echo "<option selected value='$key'>$val</option>";
                } else {
                    echo "<option value='$key'>$val</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---ประเภทที่อยู่อาศัย---</option>';
            foreach ($housing_type as $key => $val) {
                echo  "<option value='$key'>$val</option>";
            }
        }
    }
}
