<?php
include 'common.php';
$id = $_POST['id'];
$pw = $_POST['pw'];
$nm = $_POST['nm'];
$ew = $_POST['ew'];
$name = $_POST['name'];
$gender = $_POST['gender'];

if($ew != getToken($nm)){
    echo "인증번호가 잘못되었습니다.";
    // 3721 == 34920
    // 2204 == 20736
}
else{
    $grade = substr($nm, 0, 1);
    $class = substr($nm, 1, 1);
    $stuNumber = substr($nm, 2, 2);
    DB('DELETE FROM user WHERE(stuGrade="'.$grade.'" AND stuClass="'.$class.'" AND stuNumber="'.$stuNumber.'")');
    $qry = "INSERT INTO user VALUES('".$id."', '".$pw."', '".$name."', '".$gender."', '학생', ".$grade.", ".$class.", ".$stuNumber.")";
    $res = DB_res($qry);
    if($res == 'success'){
        echo "성공적으로 회원가입/비밀번호 변경을 하였습니다.";
    }
    else{
        echo "허용되지 않는 문자를 사용하였습니다.";
    }
}

?>