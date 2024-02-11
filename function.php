<?php
/************************************************************************
 * COPY RIGHT https://github.com/imron-malee/php-form-validator-qna-board
************************************************************************/

function validateTopicFormValue($formValue) {
    if (preg_match_all('/[0-9]{13}/', $formValue, $matches)) {//card id
      foreach ($matches[0] as $key => $value) {
        $res = validateCardID($value);
        if($res){
          return false;
        }
      }
    }else if (preg_match_all('/[0-9]{10}/', $formValue, $matches)) {//tel num
      foreach ($matches[0] as $key => $value) {
        $res = validatePhoneNumber($value);
        if($res){
          return false;
        }
      }
    }
    return true;
}
  
function validateCardID($id) {
    // ตรวจสอบความยาวของ ID
    if (strlen($id) != 13) {
        return false;
    }
  
    // คำนวณค่าตามเงื่อนไข
    $sum = 0;
    for ($i = 0; $i < 12; $i++) {
        $sum += intval($id[$i]) * (13 - $i);
    }
  
    // ตรวจสอบค่าสุดท้าย
    if ((11 - $sum % 11) % 10 != intval($id[12])) {
        return false;
    }
  
    // ถ้าผ่านทุกเงื่อนไข, คืนค่า true
    return true;
}
  
  
function validatePhoneNumber($formValue) {
    // ตรวจสอบค่าฟอร์มตามเงื่อนไข
    if (preg_match('/^0[0-9]{9}$/', $formValue)) {
        return true;
    } else {
        return false;
    }
}
?>