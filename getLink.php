<?php
    include 'common.php';
    $grade = $_POST['grade'];
    $class = $_POST['class'];
    $subject= $_POST['subject'];
    if($grade != '' && $class != '' && $subject != ''){
        $qry = "SELECT * FROM link WHERE(stuGrade=".$grade." AND stuClass=".$class." AND subject='".$subject."')";
        //echo $qry;
        $res = DB($qry);
        $res = mysqli_fetch_array($res)[url];
        if($res == ''){
            echo 'nolink';
        }
        else{
            echo $res;
        }
    }
    else{
        echo 'noform';
    }
?>