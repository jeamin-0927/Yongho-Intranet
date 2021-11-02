<?php
    include 'common.php';
    $dt = $_GET['date'];
    if($dt == ''){
        $dt = date("Ymd");
        echo 'asdf';
    }
    $link = 'https://open.neis.go.kr/hub/mealServiceDietInfo?KEY=3105e38da12c40d6ae84b15a5cfb85b4&Type=json&ATPT_OFCDC_SC_CODE=C10&SD_SCHUL_CODE=7181097&MLSV_YMD='.$dt;
    $res = json_decode(getWebPage($link), true)['mealServiceDietInfo'][1]['row'][0]['DDISH_NM'];
    //$res = var_dump($res);
    if($res == ''){
        echo '급식 정보가 없습니다.';
    }
    else{
        $res = preg_replace('<<br/>>', ' | ', $res);
        $res = str_replace('.', '', $res);
        $res = str_replace('1', '', $res);
        $res = str_replace('2', '', $res);
        $res = str_replace('3', '', $res);
        $res = str_replace('4', '', $res);
        $res = str_replace('5', '', $res);
        $res = str_replace('6', '', $res);
        $res = str_replace('7', '', $res);
        $res = str_replace('8', '', $res);
        $res = str_replace('9', '', $res);
        $res = str_replace('0', '', $res);
        
        print_r($res);
    }
?>