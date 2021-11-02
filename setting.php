<?php
  include 'common.php';
  $grade = $_POST['grade'];
  $class = $_POST['class'];
  $name = $_POST['name'];
  $id = $_POST['id'];
  $pw = $_POST['pw'];
  $type = ifAdmin($id, $pw, $grade, $class, $name);
  if($type == FALSE){
    header("HTTP/1.0 404 Not Found");
    exit();
  }
  echo "<script>
  function load_timetableset(grade, glass){
  $.ajax({
        url:'https://chicken-moo.com/yongho/timetableset.php',
        data: {
            grade: grade,
            class: glass,
            id: '".$id."',
            pw: '".$pw."',
            name: '".$name."'
        },
        method: 'POST',
        success:function(data){
            $('.body').html(data);
        }
  });
}
function load_time(){
    $.ajax({
          url:'https://chicken-moo.com/yongho/time.php',
          data: {
            grade: '".$grade."',
            class: '".$class."',
            id: '".$id."',
            pw: '".$pw."',
            name: '".$name."'
          },
          method: 'POST',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
  function load_link(grade, glass){
    $.ajax({
          url:'https://chicken-moo.com/yongho/link.php',
          data: {
              grade: grade,
              class: glass,
              id: '".$id."',
              pw: '".$pw."',
              name: '".$name."'
          },
          method: 'POST',
          success:function(data){
              $('.body').html(data);
          }
    });
  }
</script>";

?>

<div class="setting-contents">
  <div class="setting-big">
    <div class="">
      <div class="setting-music setting-div">
        <div class="setting-img">
          🕑
        </div>
        <div class="setting-inner">
          <div class="setting-title">
            시간표 설정
          </div>
          <br>
          <div class="setting-content">
            시간표 세부 내용 설정 페이지로<br>이동합니다.
            <br>
            <div class="setting-cq">
              <input type="number" value="<?php echo $grade; ?>" class="setting-grade setting-c" placeholder="학년">학년&nbsp;
              <input type="number" value="<?php echo $class; ?>" class="setting-class setting-c" placeholder="학반">반&nbsp;
              <input type="button" value="이동하기" class="setting-click setting-cp" onclick="onclp();">    
            </div>  
          </div>
        </div>
      </div>
    </div>
    
    <div class="">
      <a href="javascript:load_time();">
        <div class="setting-music setting-div">
          <div class="setting-img">
            🌌
          </div>
          <div class="setting-inner">
            <div class="setting-title">
              시종 시간 설정
            </div>
            <br>
            <div class="setting-content">
             시종 시간 세부 설정 페이지로<br>이동합니다.
            </div>
          </div>
        </div>
      </a>
    </div>
    
    <div class="">
      <div class="setting-music setting-div">
        <div class="setting-img">
          ☣️
        </div>
        <div class="setting-inner">
          <div class="setting-title">
            팀즈 URL 설정
          </div>
          <br>
          <div class="setting-content">
            팀즈 URL 세부 설정 페이지로<br>이동합니다.
            <br>
            <div class="setting-cq">
              <input type="number" value="<?php echo $grade; ?>" class="setting-grade-tm setting-c" placeholder="학년">학년&nbsp;
              <input type="number" value="<?php echo $class; ?>" class="setting-class-tm setting-c" placeholder="학반">반&nbsp;
              <input type="button" value="이동하기" class="setting-click setting-cp" onclick="onclptm();">    
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    function onclp(){
        var grd = $('.setting-grade').val();
        var cll = $('.setting-class').val();
        if(grd != '' && cll != '') load_timetableset(grd, cll);
        else{
            alert('학년, 학반을 모두 입력해 주세요.');
        }
    }
    function onclptm(){
        var grd = $('.setting-grade-tm').val();
        var cll = $('.setting-class-tm').val();
        if(grd != '' && cll != '') load_link(grd, cll);
        else{
            alert('학년, 학반을 모두 입력해 주세요.');
        }
    }
    
</script>


<style>
  .body{
    display: flex;
  }
  
</style>
