<?php
    function getWebPage($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
         
        return $res;
    }
    $dt = $_GET['date'];
    if($dt == ''){
        $dt = date("Ymd");
        echo 'asdf';
    }
    $link = 'https://open.neis.go.kr/hub/SchoolSchedule?KEY=3105e38da12c40d6ae84b15a5cfb85b4&Type=json&ATPT_OFCDC_SC_CODE=C10&SD_SCHUL_CODE=7181097&AA_YMD='.$dt;
    $res = json_decode(getWebPage($link), true)['SchoolSchedule'][1]['row'][0]['EVENT_NM'];
    //$res = var_dump($res);
    if($res == ''){
        echo '학사일정 정보가 없습니다.';
    }
    else{
        print_r($res);
    }
?>