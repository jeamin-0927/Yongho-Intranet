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
          π
        </div>
        <div class="setting-inner">
          <div class="setting-title">
            μκ°ν μ€μ 
          </div>
          <br>
          <div class="setting-content">
            μκ°ν μΈλΆ λ΄μ© μ€μ  νμ΄μ§λ‘<br>μ΄λν©λλ€.
            <br>
            <div class="setting-cq">
              <input type="number" value="<?php echo $grade; ?>" class="setting-grade setting-c" placeholder="νλ">νλ&nbsp;
              <input type="number" value="<?php echo $class; ?>" class="setting-class setting-c" placeholder="νλ°">λ°&nbsp;
              <input type="button" value="μ΄λνκΈ°" class="setting-click setting-cp" onclick="onclp();">    
            </div>  
          </div>
        </div>
      </div>
    </div>
    
    <div class="">
      <a href="javascript:load_time();">
        <div class="setting-music setting-div">
          <div class="setting-img">
            π
          </div>
          <div class="setting-inner">
            <div class="setting-title">
              μμ’ μκ° μ€μ 
            </div>
            <br>
            <div class="setting-content">
             μμ’ μκ° μΈλΆ μ€μ  νμ΄μ§λ‘<br>μ΄λν©λλ€.
            </div>
          </div>
        </div>
      </a>
    </div>
    
    <div class="">
      <div class="setting-music setting-div">
        <div class="setting-img">
          β£οΈ
        </div>
        <div class="setting-inner">
          <div class="setting-title">
            νμ¦ URL μ€μ 
          </div>
          <br>
          <div class="setting-content">
            νμ¦ URL μΈλΆ μ€μ  νμ΄μ§λ‘<br>μ΄λν©λλ€.
            <br>
            <div class="setting-cq">
              <input type="number" value="<?php echo $grade; ?>" class="setting-grade-tm setting-c" placeholder="νλ">νλ&nbsp;
              <input type="number" value="<?php echo $class; ?>" class="setting-class-tm setting-c" placeholder="νλ°">λ°&nbsp;
              <input type="button" value="μ΄λνκΈ°" class="setting-click setting-cp" onclick="onclptm();">    
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
            alert('νλ, νλ°μ λͺ¨λ μλ ₯ν΄ μ£ΌμΈμ.');
        }
    }
    function onclptm(){
        var grd = $('.setting-grade-tm').val();
        var cll = $('.setting-class-tm').val();
        if(grd != '' && cll != '') load_link(grd, cll);
        else{
            alert('νλ, νλ°μ λͺ¨λ μλ ₯ν΄ μ£ΌμΈμ.');
        }
    }
    
</script>


<style>
  .body{
    display: flex;
  }
  
</style>
