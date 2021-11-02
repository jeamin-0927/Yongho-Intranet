<?php
  include 'common.php';
  $grade = $_POST['grade'];
  $class = $_POST['class'];
  $grb = '로드 중...';
  $grs = '요일';
  $id = $_POST['id'];
  $pw = $_POST['pw'];
  $name = $_POST['name'];

  $type = ifAdmin($id, $pw, $grade, $class, $name);
  if($type == FALSE){
    header("HTTP/1.0 404 Not Found");
    exit();
  }
?>

<div class="timetable-timetable">
<div class="tt-0">
  <div class="tt-0-0 0-inner tt-inner tt-inner-1"> </div>
  <div class="tt-0-1 0-inner tt-inner tt-inner-2"> 1교시 </div>
  <div class="tt-0-2 0-inner tt-inner tt-inner-2"> 2교시 </div>
  <div class="tt-0-3 0-inner tt-inner tt-inner-2"> 3교시 </div>
  <div class="tt-0-4 0-inner tt-inner tt-inner-2"> 4교시 </div>
  <div class="tt-0-5 0-inner tt-inner tt-inner-2"> 5교시 </div>
  <div class="tt-0-6 0-inner tt-inner tt-inner-2"> 6교시 </div>
  <div class="tt-0-7 0-inner tt-inner tt-inner-2"> 7교시 </div>
  <div class="tt-0-8 0-inner tt-inner tt-inner-4"> </div>
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>

<div class="tt-1">
  <div class="tt-1-0 mon-inner tt-inner tt-inner-1"> 월<?php echo $grs; ?> </div>
  <input type="text" class="tt-1-1 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-2 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-3 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-4 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-5 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-6 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-1-7 mon-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <div class="tt-1-8 0-inner tt-inner tt-inner-4"> </div>
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>
<br>


<div class="tt-2">
  <div class="tt-2-0 tue-inner tt-inner tt-inner-1"> 화<?php echo $grs; ?> </div>
  <input type="text" class="tt-2-1 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-2 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-3 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-4 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-5 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-6 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-2-7 tue-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <div class="tt-2-8 0-inner tt-inner tt-inner-4"> </div>
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>
<br>


<div class="tt-3">
  <div class="tt-3-0 wed-inner tt-inner tt-inner-1"> 수<?php echo $grs; ?> </div>
  <input type="text" class="tt-3-1 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-2 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-3 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-4 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-5 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-6 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <input type="text" class="tt-3-7 wed-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>">
  <div class="tt-3-8 0-inner tt-inner tt-inner-4"> </div>
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>
<br>


<div class="tt-4">
  <div class="tt-4-0 thu-inner tt-inner tt-inner-1"> 목<?php echo $grs; ?> </div>
  <input type="text" class="tt-4-1 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-2 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-3 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-4 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-5 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-6 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-4-7 thu-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>
<br>


<div class="tt-5">
  <div class="tt-5-0 fri-inner tt-inner tt-inner-1"> 금<?php echo $grs; ?> </div>
  <input type="text" class="tt-5-1 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-2 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-3 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-4 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-5 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-6 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="text" class="tt-5-7 fri-inner tt-inner tt-inner-0" value="<?php echo $grb; ?>"> 
  <input type="button" class="tt-5-8 fri-inner tt-inner tt-inner-0" value="설정하기" onclick="putDB();" readonly> 
  <div class="tt-4-8 0-inner tt-inner tt-inner-4"> </div>
</div>
<br>
</div>

<script>
    function ts(dt){
        var year = dt.getFullYear();
        var month = dt.getMonth() + 1;
        var date = dt.getDate();
        if(month < 10) month = '0' + String(month);
        if(date < 10) date = '0' + String(date);
        var dca = String(year) + String(month) + String(date);
        
        var day = dt.getDay();
        var where = 'tt-' + day + '-';
        $.ajax({
              url:'https://chicken-moo.com/yongho/getTimeTable.php',
              data: {
                  grade: '<?php echo $grade; ?>',
                  class: '<?php echo $class; ?>',
                  date: dca
              },
              method: 'GET',
              success:function(data){
                  var sp = data.split('|');
                  //console.log(sp);
                  //console.log(dca);
                  for(var i = 1; i <= 7; i++){
                      //console.log(where + i + '-' + sp[i - 1]);
                      $('.' + where + i).val(sp[i - 1]);
                  }
              }
        });
  }
  function setTable(){
    var today = new Date();
    var year = today.getFullYear();
    var month = today.getMonth();
    var date = today.getDate();
    var day = today.getDay();
    var mon = new Date(year, month, date + (1 - day));
    var tue = new Date(year, month, date + (2 - day));
    var wed = new Date(year, month, date + (3 - day));
    var thu = new Date(year, month, date + (4 - day));
    var fri = new Date(year, month, date + (5 - day));
    ts(mon);
    ts(tue);
    ts(wed);
    ts(thu);
    ts(fri);
  }
  setTable();
  function getTable(){
    var q = '';
    for(var i = 1; i <= 5; i++){
      for(var j = 1; j <= 7; j++){
        q = q + $('.' + 'tt-' + i + '-' + j).val() + '|';
      }
    }
    return q;
  }
  function putDB(){
    var sq = confirm('DB 데이터를 수정하시겠습니까?');
    if(sq){
      $.ajax({
              url:'<?php if($type) echo "https://chicken-moo.com/yongho/putTimeTable.php"; ?>',
              data: {
                  grade: '<?php echo $grade; ?>',
                  class: '<?php echo $class; ?>',
                  id: '<?php echo $id; ?>',
                  pw: '<?php echo $pw; ?>',
                  name: '<?php echo $name; ?>',
                  subject: getTable()
              },
              method: 'POST',
              success:function(data){
                  setTable();
                  alert(data);
              }
        });
        
    }
  }
</script>

