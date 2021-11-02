<?php
    include 'common.php';
    $date = Date('Ymd');
    //$date = '20211105';

    $userInfo = getUserInfo($_POST['id'], $_POST['pw']);
    //USER INFO

    $grade = $userInfo[stuGrade];
    $class = $userInfo[stuClass];
    $name = $userInfo[userName];
    $stuNumber = $userInfo[stuNumber];
    
    if($name == ''){
      echo '<script>alert("로그인 정보가 잘못되었습니다."); location.replace("./");</script>';
    }

    $date_print = substr($date, '0', '4').'년 '.substr($date, '4', '2').'월 '.substr($date, '6', '2').'일';
?>
<!DOCTYPE html>
<title>용호중 인트라넷</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="common.css">
<header></header>
<div class="body"></div>
<script>
  load_main();
  $(window).ready(function(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/header.php',
          data: {
              name: '<?php echo $name; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              id: '<?php echo $_POST['id']; ?>', 
              pw: '<?php echo $_POST['pw']; ?>'
          },
          method: 'POST',
          success:function(data){
              $('header').html(data);
          }
    });
  });
  function load_main(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/infomation.php',
          data: {
              name: '<?php echo $name; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              date: '<?php echo $date; ?>'
          },
          method: 'GET',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function load_application(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/application.php',
          data: {
              name: '<?php echo $name; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              date: '<?php echo $date; ?>'
          },
          method: 'GET',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function load_deanamu(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/deanamu/insert.php',
          data: {
              name: '<?php echo $name; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              date: '<?php echo $date; ?>'
          },
          method: 'GET',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function load_timetable(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/timetable.php',
          data: {
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>'
          },
          method: 'GET',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function load_setting(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/setting.php',
          data: {
              name: '<?php echo $name; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              id: '<?php echo $_POST['id']; ?>', 
              pw: '<?php echo $_POST['pw']; ?>'
          },
          method: 'POST',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function getTime(){
    var sq;
    $.ajax({
              url:'https://chicken-moo.com/yongho/getTime2.php',
              data: {},
              async: false,
              method: 'GET',
              success:function(data){
                  sq = data;
              }
        });
    return sq;
  }


  var audioFile;
  var isClicked = false;
  function stop_all_audio() {
    if (audioFile != undefined) {
        audioFile.pause();
    }
  }
  function play_audio(a) {
    stop_all_audio();
    audioFile = new Audio('audio/' + a);
    audioFile.volume = 0.5;
    audioFile.play();
  }
  var vvs;
  function sound(){
    if(isClicked){
      isClicked = false;
      $('.sound-button').val('시종 켜기');
      stop_all_audio();
      play_audio('dd.mp3');
      clearInterval(vvs);
    }
    else{
      isClicked = true;
      $('.sound-button').val('시종 끄기');
      play_audio('dd.mp3');
      chaim();
      vvs = setInterval(chaim, 1000);
    }
  }
  function setS(){
    if(isClicked){
      $('.sound-button').val('시종 끄기');
    }
    else{
      $('.sound-button').val('시종 켜기');
    }
  }
  var setTime = set_Time();
  function set_Time(){
    var sq = getTime().split('|');
    return {
        "조례": {
          "시작": sq[0],
            "끝": sq[1]
        },
        "1교시": {
          "시작": sq[2],
            "끝": sq[3]
        },
        "2교시": {
          "시작": sq[4],
            "끝": sq[5]
        },
        "3교시": {
          "시작": sq[6],
            "끝": sq[7]
        },
        "4교시": {
          "시작": sq[8],
            "끝": sq[9]
        },    
        "5교시": {
          "시작": sq[10],
            "끝": sq[11]
        }, 
        "6교시": {
          "시작": sq[12],
            "끝": sq[13]
        }, 
        "7교시": {
          "시작": sq[14],
            "끝": sq[15]
        }
    };
  }

  function chaim() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth();
    var date = now.getDate();
    var day = now.getDay();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    if (seconds != 0) {
        return;
    }
    if(minutes < 10) minutes = '0' + String(minutes);
    if(hours < 10) hours = '0' + String(hours);
    
    var ttmm = String(hours) + String(minutes);

    if (ttmm == setTime['조례']['시작']) {
        play_audio('study.mp3');
    }
    if (ttmm == setTime['조례']['끝'] || ttmm == setTime['1교시']['끝'] || ttmm == setTime['2교시']['끝'] || ttmm == setTime['3교시']['끝'] || ttmm == setTime['4교시']['끝'] || ttmm == setTime['5교시']['끝']) {
        play_audio('end.mp3');
    }
    if (day == 2 || day == 4) {
        if (ttmm == setTime['6교시']['끝']) {
            play_audio('end.mp3');
        }
        if (ttmm == setTime['7교시']['시작']) {
            play_audio('start.mp3');
        }
        if (ttmm == setTime['7교시']['끝']) {
            play_audio('final.mp3');
        }
    }
    if (day == 1 || day == 3 || day == 5) {
        if (ttmm == setTime['6교시']['끝']) {
            play_audio('final.mp3');
        }
    }
    if (ttmm == setTime['1교시']['시작'] || ttmm == setTime['2교시']['시작'] || ttmm == setTime['3교시']['시작'] || ttmm == setTime['4교시']['시작'] || ttmm == setTime['5교시']['시작'] || ttmm == setTime['6교시']['시작']) {
        play_audio('start.mp3');
    }
    if (ttmm == setTime['1교시']['시작'] - 5) {
        play_audio('beforestart.mp3');
    }
  }
  function cpc(name, time1, time2){
      time1 = time1.substr(0, 2) + ':' + time1.substr(2, 2) + '';
      time2 = time2.substr(0, 2) + ':' + time2.substr(2, 2) + '';
      $('.hp').html(name + ': '+ time1 + ' ~ ' + time2);
  }
  function getNowSubject(){
    var period = check();
    if(period == 8){
      return '일과 시간이 아닙니다.';
    }
    else{
      var sq;
      $.ajax({
        url:'https://chicken-moo.com/yongho/getTimeTable.php',
        data: {
          grade: '<?php echo $grade; ?>',
          class: '<?php echo $class; ?>',
          date: '<?php echo $date; ?>',
          period: period
        },
        async: false,
        method: 'GET',
        success:function(data){
            sq = data;
        }
      });
      return sq;
    }
  }
  function check() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth();
    var date = now.getDate();
    var day = now.getDay();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    if(minutes < 10) minutes = '0' + String(minutes);
    if(hours < 10) hours = '0' + String(hours);
    
    var ttmm = String(hours) + String(minutes);
    
    if (ttmm >= setTime['조례']['시작'] && ttmm < setTime['조례']['끝']) {
      cpc('조례', setTime['조례']['시작'], setTime['조례']['끝']);
      return 0;
    }
    else if (ttmm >= setTime['조례']['끝'] && ttmm < setTime['1교시']['끝']) {
      cpc('1교시', setTime['1교시']['시작'], setTime['1교시']['끝']);
      return 1;
    }
    else if (ttmm >= setTime['1교시']['끝'] && ttmm < setTime['2교시']['끝']) {
      cpc('2교시', setTime['2교시']['시작'], setTime['2교시']['끝']);
      return 2;
    }
    else if (ttmm >= setTime['2교시']['끝'] && ttmm < setTime['3교시']['끝']) {
      cpc('3교시', setTime['3교시']['시작'], setTime['3교시']['끝']);
      return 3;
    }
    else if (ttmm >= setTime['3교시']['끝'] && ttmm < setTime['4교시']['끝']) {
      cpc('4교시', setTime['4교시']['시작'], setTime['4교시']['끝']);
      return 4;
    }
    else if (ttmm >= setTime['4교시']['끝'] && ttmm < setTime['5교시']['끝']) {
      cpc('5교시', setTime['5교시']['시작'], setTime['5교시']['끝']);
      return 5;
    }
    else if (ttmm >= setTime['5교시']['끝'] && ttmm < setTime['6교시']['끝']) {
      cpc('6교시', setTime['6교시']['시작'], setTime['6교시']['끝']);
      return 6;
    }
    else if (ttmm >= setTime['6교시']['끝'] && ttmm < setTime['7교시']['끝']) {
      cpc('7교시', setTime['7교시']['시작'], setTime['7교시']['끝']);
      return 7;
    }
    else {
      $('.hp').html('일과 시간이 아닙니다.');
      return 8;
    }
  }
  setInterval(check, 1000);
  function getNowLink(subject = getNowSubject()){
    if(subject == '일과 시간이 아닙니다.'){
      return 'notime';
    }
    else{
      var sq;
      $.ajax({
        url:'https://chicken-moo.com/yongho/getLink.php',
        data: {
          grade: '<?php echo $grade; ?>',
          class: '<?php echo $class; ?>',
          subject: subject
        },
        async: false,
        method: 'POST',
        success:function(data){
            sq = data;
        }
      });
      return sq;
    }
  }
  var ret;
  function teams(){
    var link = getNowLink();
    if(typeof rat != 'undefined'){
      rat.close();
    }
    else if(link == 'nolink'){
      alert('현재 과목의 URL 데이터가 없습니다.\n조종례 방으로 이동합니다.');
      link = getNowLink('조례');
      ret = window.open(link);
    }
    else if(link == 'notime'){
      alert('지금은 일과 시간이 아닙니다.\n조종례 방으로 이동합니다.');
      link = getNowLink('조례');
      ret = window.open(link);
    }
    else{
      ret = window.open(link);
    }
    
    
  }
</script>

