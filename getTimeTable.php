<?php
    include 'common.php';
    $grade = $_GET['grade'];
    $class = $_GET['class'];
    $date = $_GET['date'];
    $day = date('w', strtotime($date));
    $period = $_GET['period'];
    $type = $_GET['type'];

    function qrz($grade, $class, $day, $period){
        $qry = "SELECT * FROM timetable WHERE(stuGrade=".$grade." AND stuClass=".$class." AND day=".$day." AND period=".$period.")";
        $res = DB($qry);
        $res = mysqli_fetch_array($res)[subject];
        if($res == ''){
            $res = '없음';
        }
        return $res;
    }
    
    if($period != ''){
        echo qrz($grade, $class, $day, $period);
    }
    else{
        if($type == 'pre'){
            for($i = 1; $i < 7; $i++){
                echo $i.'교시 '.qrz($grade, $class, $day, $i).'<br>';
            }
            echo $i.'교시 '.qrz($grade, $class, $day, 7);
        }
        else{
            for($i = 1; $i < 7; $i++){
                echo qrz($grade, $class, $day, $i).'|';
            }
            echo qrz($grade, $class, $day, 7);
        }
    }
?>