<?php
    include 'common.php';
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $class = $_POST['class'];

    $type = ifAdmin($id, $pw, $grade, $class, $name);
    if($type == FALSE){
        header("HTTP/1.0 404 Not Found");
        exit();
      }


    if($type){
        $subject = explode('|', $_POST['subject']);
        $k = -1;
        $rq = TRUE;
        
        for($i = 1; $i <= 5; $i++){
            for($j = 1; $j <= 7; $j++){
                $k = $k + 1;
                $reqs = DB_res("DELETE FROM timetable WHERE(stuGrade=".$grade." AND stuClass=".$class." AND day=".$i." AND period=".$j.")");
                $res = DB_res("INSERT INTO timetable VALUES(".$grade.", ".$class.", ".$i.", ".$j.", '".$subject[$k]."')");
                if($res == 'False') $rq = FALSE;
            }
        }
        if($rq){
            echo '성공적으로 DB 데이터를 수정하였습니다.';
        }
        else{
            echo 'DB 데이터 수정 중 오류가 발생하였습니다.';
        }

    }
    else{
        echo '권한 부족';
    }
    
?>