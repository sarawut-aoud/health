<?php
require_once  '../../config/database.php';

class addelderly extends Database_set
{
    public function add_tumbon($ampher)
    {
        if ($ampher == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_district WHERE amphoe_id ='$ampher' ");
            return $result;
        }
    }
    public function add_ampher($province = '')
    {
        if ($province == '') {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe ");
            return $result;
        } else {
            $result = mysqli_query($this->dbcon, "SELECT * FROM system_amphoe WHERE province_id ='$province' ");
            return $result;
        }
    }
    public function add_province()
    {

        $result = mysqli_query($this->dbcon, "SELECT * FROM system_province ");
        return $result;
    }
    public function Get_table()
    {
        $result = mysqli_query($this->dbcon, "SELECT *,
        CASE 
            WHEN title = 1 THEN 'นาย'
            WHEN title = 2 THEN 'นาง'
            WHEN title = 3 THEN 'นางสาว'
            END as title 
        FROM personal_document pd
      
        LEFT JOIN   user_status_keep uk ON uk.pd_id = pd.pd_id
        LEFT JOIN user_status us ON us.id = uk.status_id 
    WHERE
        pd.`status` = 'active'
        AND uk.status_id = '5' 
        AND pd.pd_id NOT IN ( SELECT MIN( pdid.pd_id ) FROM personal_document AS pdid ORDER BY
        pdid.pd_id ASC  )
        ");
        return $result;
    }



    //? ตรวจร่างกายคัดกรอง
    public function save_formdata($post)
    {

        parse_str($post["frmdata"], $post);
        echo '<pre>';
        print_r($post);
        die;
        $title = trim($post["title"], "\0");
        $fname = trim($post["fname"], "\0");
        $lname =  trim($post["lname"], "\0");
        $age = trim($post["age"], "\0");
        $birthday_set = trim($post["birthday"], "\0");
        $id_card_set = trim($post["id_card"], "\0");
        $phone_number_set = trim($post["phone_number"], "\0");
        $education = trim($post["education"], "\0");
        $type_live = trim($post["type_live"], "\0");
        $pd_status = trim($post["pd_status"], "\0");
        $occupation = trim($post["occupation"], "\0");
        $address = trim($post["address"], "\0");
        $province_id = trim($post["province_id"], "\0");
        $amher_id = trim($post["amher_id"], "\0");
        $tumbon_id = trim($post["tumbon_id"], "\0");

        if (
            !empty($title) &&  !empty($fname) && !empty($lname) && !empty($age) && !empty($birthday_set) && !empty($id_card_set) && !empty($phone_number_set)
            && !empty($education) && !empty($pd_status) && !empty($type_live) && !empty($occupation) && !empty($address) && !empty($province_id) && !empty($amher_id) && !empty($tumbon_id)
        ) {
            $id_card = preg_replace('/[-]/i', '', $id_card_set);
            $phone_number = preg_replace('/[-]/i', '', $phone_number_set);
            $birthday = date('Y-m-d', strtotime($birthday_set . "-543 year"));

            $personal_last_id = $this->addelderly_model($title, $fname, $lname, $address, $amher_id, $tumbon_id, $province_id, $id_card, $age, $birthday, $phone_number, $education, $pd_status, $occupation, $type_live);
            if (!empty($personal_last_id)) {

                if (!empty($post["congen"])) {
                    $disease = $this->disease($personal_last_id, $post["congen"], $post["long"], $post["hospi"], $post["hosfirst"]);
                    if (!empty($disease)) {
                        $darily_keep =   $this->darily_keep($personal_last_id, $post);
                    }
                } else {
                    $darily_keep = $this->darily_keep($personal_last_id, $post);
                }
                if ($darily_keep) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    /** สว่นของการลงทะเบียน */

    private function addelderly_model($title, $fname, $lname, $address, $ampher, $tumbon, $province, $id_card, $age, $birthday, $phone_number, $education, $pd_status, $occupation, $housing_type)
    {

        $result = mysqli_query($this->dbcon, "INSERT INTO personal_document (title, 
     first_name, 
     last_name, 
     address, 
     ampher_id, 
     tumbon_id, 
     province_id, 
     id_card, 
     age, 
     birthday, 
     phone_number,
     education,
     pd_status,
     occupation,
     type_live )
     VALUES ('$title',
     '$fname',
     '$lname',
     '$address',
     '$ampher',
     '$tumbon',
     '$province','$id_card','$age','$birthday','$phone_number','$education','$pd_status','$occupation','$housing_type')");

        $last_id = mysqli_insert_id($this->dbcon);
        $set_user = $this->set_user($last_id);
        if (!empty($set_user)) {
            return $last_id;
        }
    }

    private function set_user($last_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `user_status_keep` ( `pd_id`, `status_id`, `set_status` )
        VALUES
            ('$last_id','5','1') ");
        return $result;
    }

    private function disease($last_id, $congen, $long, $hospi, $hosfirst)
    {

        for ($i = 0; $i < count($congen); $i++) {
            $this->disease_insert($last_id, $congen[$i], $long[$i], $hospi[$i], $hosfirst[$i]);
        }
        return 'success';
    }
    private function disease_insert($last_id, $congen, $long, $hospi, $hosfirst)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `disease`( `pd_id`, `hospital`, `hospital_first`, `congen`, `long_time`) 
        VALUES ('$last_id','$hospi','$hosfirst','$congen','$long')");
        return $result;
    }
    private function darily_keep($last_id, $post)
    {

        $result = $this->health_keep($last_id, $post);
        $sugar = trim($post["sugar"], "\0");
        $kidney = trim($post["kidney"], "\0");
        $choles = trim($post["choles"], "\0");
        $tri = trim($post["tri"], "\0");
        $fat1 = trim($post["fat1"], "\0");
        $fat2 = trim($post["fat2"], "\0");
        $eye = trim($post["eye"], "\0");
        $type_eye = trim($post["type_eye"], "\0");
        $foot = trim($post["foot"], "\0");

        if (!empty($sugar) || !empty($kidney) || !empty($choles) || !empty($tri) || !empty($fat1) || !empty($fat2) || !empty($eye) || !empty($type_eye) || !empty($foot)) {
            $this->optional($last_id, $sugar, $kidney, $choles, $tri, $fat1, $fat2, $eye, $type_eye, $foot);
        }
        return $result;
    }
    private function optional($last_id, $sugar, $kidney, $choles, $tri, $fat1, $fat2, $eye, $type_eye, $foot)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO `optional`( `pd_id`, `sugar`, `kidney`, `cholesterol`, `trigly`, `fat_hdl`, `fat_ldl`, `eye`, `type_eye`, `foot`) 
        VALUES ('$last_id','$sugar','$kidney','$choles','$tri','$fat1','$fat2','$eye','$type_eye','$foot')");
        return $result;
    }

    private function health_keep($last_id, $post)
    {
        $datenow = date('Y-m-d');
        parse_str($post["frmdata"], $post);
        $pd_id_doctor = trim($post["pd_id_doctor"], "\0");
        $blood1 = trim($post["blood1"], "\0");
        $blood2 = trim($post["blood2"], "\0");
        $weight = trim($post["weight"], "\0");
        $height = trim($post["height"], "\0");
        $waistline = trim($post["waistline"], "\0");
        $birth = trim($post["birth"], "\0");
        $diabetes =  trim($post["diabetes"], "\0");
        $last = trim($post["last"], "\0");
        //? -----------------------------------ส่วนที่สาม
        $symptom1 = trim($post["symptom1"], "\0");
        $symptom2 = trim($post["symptom2"], "\0");
        //? -----------------------------------ส่วนที่สี่
        $veget = trim($post["veget"], "\0");
        $condiment = trim($post["condiment"], "\0");
        $sweet = trim($post["sweet"], "\0");
        $exercise = trim($post["exercise"], "\0");
        $loll = trim($post["loll"], "\0");
        $sleep = trim($post["sleep"], "\0");
        $brush = trim($post["brush"], "\0");
        $brushlong = trim($post["brushlong"], "\0");
        $cigarette = trim($post["cigarette"], "\0");
        //? -----------------------------------ส่วนที่ห้า
        $cigarate = trim($post["cigarate"], "\0");
        $num = trim($post["num"], "\0");
        $after = trim($post["after"], "\0");
        $drink = trim($post["drink"], "\0");
        $alcohol = trim($post["alcohol"], "\0");
        $amount = trim($post["amount"], "\0");
        $bloodlast = trim($post["bloodlast"], "\0");
        $resul = trim($post["resul"], "\0");
        $gum = trim($post["gum"], "\0");
        $limestone = trim($post["limestone"], "\0");
        $cavities = trim($post["cavities"], "\0");
        $breast = trim($post["breast"], "\0");
        $breastlast = trim($post["breastlast"], "\0");
        $breastre = trim($post["breastre"], "\0");
        $cervix = trim($post["cervix"], "\0");
        $cervixre = trim($post["cervixre"], "\0");
        $cervixsub = trim($post["cervixsub"], "\0");
        //? -----------------------------------ส่วนที่หก

        $result = mysqli_query($this->dbcon, "INSERT INTO `health_kepp`(
            `date`, `pd_id`, `pd_id_doctor`, `blood1`, `blood2`, `weight`, `height`, `waistline`, `birth`, 
            `diabetes`, `last`, `symptom1`, `symptom2`, `veget`, `condiment`, `sweet`, `exercise`, `loll`, 
            `sleep`, `brush`, `brushlong`, `cigarette`, `cigarate`, `num`, `after`, `drink`, `alcohol`, `amount`, 
            `bloodlast`, `resul`, `gum`, `limestone`, `cavities`, `breast`, `breastlast`, `breastre`, `cervix`, 
            `cervixre`, `cervixsub`)
             VALUES ('$datenow','$last_id','$pd_id_doctor','$blood1','$blood2','$weight',
             '$height','$waistline',' $birth','$diabetes','$last','$symptom1','$symptom2',
             '$veget','$condiment','$sweet','$exercise','$loll','$sleep','$brush',
             '$brushlong','$cigarette','$cigarate','$num','$after','$drink','$alcohol',
             '$amount','$bloodlast','$resul','$gum','$limestone','$cavities ','$breast',
             '$breastlast','$breastre','$cervix','$cervixre','$cervixsub')");

        return $result;
    }
}
