<?php
error_reporting(~E_NOTICE);

$title_path = 'แบบบันทึกตรวจสุขภาพ';
function select_data($type, $dataset = '')
{



    if ($type == "title") {
        require_once 'data_utllities.php';
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

    if ($type == "cigarate") {
        require_once 'data_utllities.php';

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
    if ($type == "alcohol") {
        require_once 'data_utllities.php';

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
}
function select_edu($type)
{
    if ($type == "education") {
        require_once 'data_utllities.php';

        if (!empty($dataset)) {

            foreach ($education2 as $keye => $vale) {
                if ($dataset == $keye) {
                    echo "<option selected value='$keye'>$vale</option>";
                } else {
                    echo "<option value='$keye'>$vale</option>";
                }
            }
        } else {
            echo '<option value="" selected disabled>---การศึกษา---</option>';
            foreach ($education2 as $e => $v) {
                echo  "<option value='" . $e . "'>$v</option>";
            }
        }
    }
}

function select_add($type)
{
    if ($type == 'pd_status') {
        require_once 'data_utllities.php';

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
        require_once 'data_utllities.php';

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
        require_once 'data_utllities.php';

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
