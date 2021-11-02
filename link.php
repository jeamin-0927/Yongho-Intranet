<center class="link-center">
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
  else{
    $qry = "SELECT DISTINCT subject FROM timetable WHERE(stuGrade=".$grade." AND stuClass=".$class." AND subject!='없음')";
    //echo $qry;
    $res = DB($qry);
    $res_n = mysqli_num_rows($res);
    $req = array();
    //echo $res_n;
    while($row = mysqli_fetch_row($res)) {
      $req[] = $row[0];
    }
    //print_r($req);

    function getLink($grade, $class, $subject){
      if($grade != '' && $class != '' && $subject != ''){
        $qry = "SELECT * FROM link WHERE(stuGrade=".$grade." AND stuClass=".$class." AND subject='".$subject."')";
        //echo $qry;
        $res = DB($qry);
        $res = mysqli_fetch_array($res)[url];
        if($res == ''){
          return '';
        }
        else{
          return $res;
        }
      }
      else{
        return '';
      }
    }

    function print_input($i, $subject, $link){
      echo '
      <input type="text" placeholder="과목" value="'.$subject.'" class="link-input link-subject link-subject-'.$i.'" >
      :
      <input type="text" placeholder="URL" value="'.$link.'" class="link-input link-link link-link-'.$i.'" >
      
      <br>
      ';
    }
    
    for($i = 0; $i < $res_n; $i++){
      print_input($i, $req[$i], getLink($grade, $class, $req[$i]));
    }
    
  }
?>
<input type="button" value="수정하기" onclick="linkChange();" class="link-input link-button">
<br>
<input type="hidden" value="" onclick="" class="link-input">


<style>
  .body{
    display: inline-block;
  }
</style>

<script>
  function tochangeLink(ds){
    $.ajax({
              url:'<?php if($type) echo "https://chicken-moo.com/yongho/putLink.php"; ?>',
              data: {
                  grade: '<?php echo $grade; ?>',
                  class: '<?php echo $class; ?>',
                  id: '<?php echo $id; ?>',
                  pw: '<?php echo $pw; ?>',
                  name: '<?php echo $name; ?>',
                  dt: ds
              },
              method: 'POST',
              success:function(data){
              }
        });
  }
  function linkChange(){
    var sq = confirm('DB 데이터를 수정하시겠습니까?');
    if(sq){
      for(var i = 0; i < <?php echo $res_n; ?>; i++){
        var info = $('.link-subject-' + i).val() + '|' + $('.link-link-' + i).val();
        tochangeLink(info);
      }
    }
    
  }

</script>

</center>