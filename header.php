<?php
    include 'common.php';
    $grade1 = $_POST['grade'];
    $class1 = $_POST['class'];
    $name1 = $_POST['name'];

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $qry = "SELECT * FROM user WHERE(userId='".$id."' AND userPassword='".$pw."' AND userName ='".$name1."' AND stuGrade = ".$grade1." AND stuClass = ".$class1.")";
    $res = DB($qry);
    $res = mysqli_fetch_array($res)[userType];
    $type = False;
    if($res == '관리자') $type = True;
    
?>


<div class="logo">
  <a href="javascript:load_main();" class="logoText">용호중 인트라넷</a>
</div>


<div class="menu cleft">
  <a href="javascript:load_main();" class="home cleft headerButton">
    홈
  </a>
  <a href="javascript:load_timetable();" class="timetable cleft headerButton">
    시간표
  </a>
  <a href="javascript:load_application();" class="application cleft headerButton">
    신청
  </a>
  <a href="javascript:load_deanamu();" class="deanamu cleft headerButton">
    대나무 숲
  </a>
  <?php if($type) echo '<a href="javascript:load_setting();" class="application cleft headerButton">설정</a>'; ?>
</div>
<p class="nocum"></p>
<div class="userInfo">
  <!--
  <div class="userIMG">
    <img class="userIMG-inner" src="https://chicken-moo.com/yhms/files/img/school_logo.jpg">
  </div>
-->
  <div class="userLC">
    <a class="userGN" href="javascript:logout();">
      <div class="userGrade">
        <?php 
        $reqs = $grade1.'학년 '.$class1.'반';
        echo $reqs; 
        ?>
      </div>
      
      <div class="userName">
        <?php echo '&nbsp;'.$name1.' ('.$res.')'; ?>
      </div>
    </a>
  </div>
</div>
<script>
  function logout(){
    var apt = confirm("로그아웃 하시겠습니까?");
    if(apt) location.replace('./');
  }
</script>