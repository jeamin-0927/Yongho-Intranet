<?php
    include 'common.php';
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $class = $_POST['class'];
    $time = $_POST['time'];
    $type = ifAdmin($id, $pw, $grade, $class, $name);
    if($type == FALSE){
        header("HTTP/1.0 404 Not Found");
        exit();
      }


    if($type){
        $ts = explode('|', $_POST['time']);
        $k = 0;
        $rq = TRUE;
        
        for($i = 0; $i <= 7; $i++){
            DB("DELETE FROM time WHERE(num='".$i."')");
            $res = DB_res("INSERT INTO time VALUES('".$i."', '".$ts[$k]."', '".$ts[$k + 1]."')");
            if($res == 'False') $rq = FALSE;
            $k = $k + 2;
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