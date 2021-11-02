<?php
    include 'common.php';
    function getStartTime($gs){
        $qry = "SELECT * FROM time where(num=".$gs.")";
        $res = DB($qry);
        $res = mysqli_fetch_array($res)[startTime];
        if($res == ''){
            $res = '0000';
        }
        return $res;
    }
    function getEndTime($gs){
        $qry = "SELECT * FROM time WHERE(num='".$gs."')";
        $res = DB($qry);
        $res = mysqli_fetch_array($res)[endTime];
        if($res == ''){
            $res = '0000';
        }
        return $res;
    }

    for($i = 0; $i <= 7; $i++){
        echo substr(getStartTime($i), 0, 2);
        echo '|';
        echo substr(getStartTime($i), 2, 2);
        echo '|';
        echo substr(getEndTime($i), 0, 2);
        echo '|';
        echo substr(getEndTime($i), 2, 2);
        echo '|';
    }
?>