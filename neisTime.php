<?php
    include 'common.php';
    $dt = $_GET['date'];
    if($dt == ''){
        $dt = date("Ymd");
        echo 'asdf';
    }
    $grade = $_GET['grade'];
    $class = $_GET['class'];
    $link = 'https://open.neis.go.kr/hub/misTimetable?KEY=3105e38da12c40d6ae84b15a5cfb85b4&Type=json&ATPT_OFCDC_SC_CODE=C10&SD_SCHUL_CODE=7181097&ALL_TI_YMD='.$dt.'&GRADE='.$grade.'&CLASS_NM='.$class;
    $resq = json_decode(getWebPage($link), true)['misTimetable'][1]['row'];
    //$res = var_dump($res);
    if($resq == ''){
        echo '시간표 정보가 없습니다.';
    }
    else{
        for($i = 1; $i <= 7; $i++){
            $res = $resq[$i - 1]['ITRT_CNTNT'];
            $res = str_replace('-', '', $res);
            if($res == '') $res = '없음';
            if($i != 7) $res = $i.'교시 '.$res.'<br>';
            else $res = $i.'교시 '.$res;

            if($res == $i.'교시 없음<br>' || $res == $i.'교시 없음'){

            }
            else{
                print_r($res);
            }
            
        }
    }
?>