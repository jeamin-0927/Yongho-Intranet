<?php
    $date = Date('Ymd');
    include 'common.php';
    if (preg_match('/MSIE|Internet Explorer|Trident/i', $_SERVER['HTTP_USER_AGENT'])) {
      echo '<script>window.location="microsoft-edge:https://chicken-moo.com/yongho/"; </script>';
  }
?>
<!DOCTYPE html>
<title>용호중 인트라넷</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="common.css">
<!--
<script src="script.js"></script>
-->
<div class="login-dv">
  <div class="login-all login-all1">
    <div class="login1">
      <div class="login-title">
        용호중 인트라넷
      </div>
      <form method="post" action="main.php">
        <input autocomplete="off" type="text" placeholder="아이디" name="id" class="login-id input-hov">
        <br>
        <input autocomplete="off" type="password" placeholder="비밀번호" name="pw" class="login-pw input-hov">
        <br>
        <input type="submit" value="로그인" class="login-login">
        <br>
        <a href="join.php">
          <div class="reg">
            회원가입/비밀번호 찾기
          </div>
        </a>
      </form>
    </div>
  </div>
  <div class="login-all login-all2">
    <div class="login-meal-all">
      <div class="login-meal">
        NEIS 데이터 로드 중...
      </div>
    </div>
  </div>
</div>


<script>
    $('.login-id').focus();
    $(window).load(function(){
      $.ajax({
        url:'https://chicken-moo.com/yongho/meal.php',
        data: {
            date: '<?php echo $date; ?>'
        },
        method: 'GET',
        success:function(data){
            var gup = data.split('|');
            var gus = '';
            for(var i = 0; i < gup.length; i++){
              gus = gus + gup[i] + '<br>';
            }
            $('.login-meal').html(gus);
        }
    });
    });
</script>




