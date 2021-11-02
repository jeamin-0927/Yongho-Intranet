<?php
include 'common.php';
$grab = '로드 중..';
$grb = '00';
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$grade = $_POST['grade'];
$class = $_POST['class'];

$type = ifAdmin($id, $pw, $grade, $class, $name);
  if($type == FALSE){
    header("HTTP/1.0 404 Not Found");
    exit();
  }
?>

<div class="time-time">
  
<div class="t-0">
  <div class="t-0-10 0-inner t-inner t-inner-30"> </div>
  <div class="t-0-0 0-inner t-inner t-inner-2"> 조례 </div>
  <div class="t-0-1 0-inner t-inner t-inner-2"> 1교시 </div>
  <div class="t-0-2 0-inner t-inner t-inner-2"> 2교시 </div>
  <div class="t-0-3 0-inner t-inner t-inner-2"> 3교시 </div>
  <div class="t-0-4 0-inner t-inner t-inner-2"> 4교시 </div>
  <div class="t-0-5 0-inner t-inner t-inner-2"> 5교시 </div>
  <div class="t-0-6 0-inner t-inner t-inner-2"> 6교시 </div>
  <div class="t-0-7 0-inner t-inner t-inner-2"> 7교시 </div>
  <div class="t-0-8 0-inner t-inner t-inner-4"> </div>
</div>

<div class="t-1">
  <div class="t-1-10 mon-inner t-inner t-inner-1"> 시작 시간 </div>
  <input type="text" class="t-1-0 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-1 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-2 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-3 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-4 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-5 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-6 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-1-7 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <div class="t-1-8 0-inner t-inner t-inner-4"> </div>
</div>
<br>

<div class="ttt-1">
  <div class="ttt-1-10 mon-inner ttt-inner ttt-inner-0">  </div>
  <div class="ttt-1-0 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-1 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-2 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-3 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-4 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-5 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-6 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-7 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-8 0-inner ttt-inner ttt-inner-4"> </div>
</div>
<br>

<div class="t-2">
  <div class="t-2-10 tue-inner t-inner t-inner-1"> 시작 분 </div>
  <input type="text" class="t-2-0 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-2-1 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-2 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-3 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-4 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-5 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-6 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-2-7 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <div class="t-2-8 0-inner t-inner t-inner-4"> </div>
</div>
<br>

<div class="ttt-1">
  <div class="ttt-1-10 mon-inner ttt-inner ttt-inner-0">  </div>
  <div class="ttt-1-0 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-1 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-2 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-3 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-4 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-5 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-6 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-7 mon-inner ttt-inner ttt-inner-0"> ~ </div>
  <div class="ttt-1-8 0-inner ttt-inner ttt-inner-4"> </div>
</div>
<br>

<div class="t-3">
  <div class="t-1-10 mon-inner t-inner t-inner-1"> 끝 시간 </div>
  <input type="text" class="t-3-0 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-1 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-2 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-3 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-4 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-5 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-6 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-3-7 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <div class="t-1-8 0-inner t-inner t-inner-4"> </div>
</div>
<br>

<div class="ttt-1">
  <div class="ttt-1-10 mon-inner ttt-inner ttt-inner-0">  </div>
  <div class="ttt-1-0 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-1 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-2 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-3 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-4 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-5 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-6 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-7 mon-inner ttt-inner ttt-inner-0"> : </div>
  <div class="ttt-1-8 0-inner ttt-inner ttt-inner-4"> </div>
</div>
<br>

<div class="t-4">
  <div class="t-2-10 tue-inner t-inner t-inner-1"> 끝 분 </div>
  <input type="text" class="t-4-0 mon-inner t-inner t-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="t-4-1 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-2 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-3 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-4 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-5 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-6 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="t-4-7 tue-inner t-inner t-inner-0" value="<?php echo $grb; ?>"> 
  <input type="button" class="t-2-8 0-inner t-inner t-inner-0" value="수정하기" onclick="clickTime();">
</div>
<br>

</div>


<script>
    function clickTime(){
      var sp = confirm('DB 데이터를 수정하시겠습니까?');
      if(sp){
        $.ajax({
              url:'https://chicken-moo.com/yongho/putTime.php',
              data: {
                  grade: '<?php echo $grade; ?>',
                  class: '<?php echo $class; ?>',
                  id: '<?php echo $id; ?>',
                  pw: '<?php echo $pw; ?>',
                  name: '<?php echo $name; ?>',
                  time: getTime()
              },
              method: 'POST',
              success:function(data){
                  setTable();
                  setTime = set_Time();
                  alert(data);
                  
              }
        });
      }
    }
    function setTable(){
      $.ajax({
              url:'https://chicken-moo.com/yongho/getTime.php',
              data: {
                
              },
              method: 'GET',
              success:function(data){
                  var sp = data.split('|');
                  var k = 0;
                  for(var i = 0; i <= 7; i++){
                    $('.t-1-' + i).val(sp[k]);
                    $('.t-2-' + i).val(sp[k + 1]);
                    $('.t-3-' + i).val(sp[k + 2]);
                    $('.t-4-' + i).val(sp[k + 3]);

                    k = k + 4;
                  }
              }
        });
    }
    setTable();
    function getTime(){
      var cp = '';
      for(var i = 0; i <= 7; i++){
        var start = String($('.t-1-' + i).val()) + String($('.t-2-' + i).val());
        var end = String($('.t-3-' + i).val()) + String($('.t-4-' + i).val());
        cp = cp + start + '|' + end + '|';
      }
      return cp;
    }
  
</script>

