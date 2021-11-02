<?php
    $date = Date('Ymd');
    include 'common.php';
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
  <div class="login-all">
    
    <br>
    <div class="login login-join">
      <a href="./">
        <div class="login-title">
          용호중 인트라넷
        </div>
      </a>
      <br>
      <input autocomplete="off" type="text" placeholder="이름" name="name" class="login-name input-hov">
      <input autocomplete="off" type="text" placeholder="아이디 (최대 20자)" name="id" class="login-id input-hov">
      <br>
      <input autocomplete="off" type="password" placeholder="비밀번호 (최대 40자)" name="pw" class="login-pw input-hov">
      <input autocomplete="off" type="password" placeholder="비밀번호 재입력" name="repw" class="login-repw input-hov">
      <br>
      <input autocomplete="off" type="text" placeholder="학번 (4글자)" name="nm" class="login-nm input-hov" >
      <input autocomplete="off" type="password" placeholder="인증번호" name="ew" class="login-ew input-hov">
      <br>
      <div class="login-gender-text">
        성별 :
      </div>
      <select class="login-gender input-hov">
        <option value="">선택</option>
        <option value="남">남</option>
        <option value="여">여</option>
      </select>
      <br>
      <input type="submit" value="회원가입 / 비밀번호 재설정" class="login-login" onclick="ewchang();">
    </div>
  </div>
</div>


<script>
    $(window).load(function(){
      $('.login-name').focus();
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
    function ewchang(){
      if($('.login-gender').val() == '' || $('.login-id').val() == '' || $('.login-name').val() == '' || $('.login-pw').val() == '' || $('.login-repw').val() == '' || $('.login-nm').val() == '' || $('.login-ew').val() == ''){
        alert('입력되지 않은 칸이 있습니다.');
      }
      else if($('.login-pw').val() != $('.login-repw').val()){
        alert('비밀번호 확인이 잘못되었습니다.');
      }
      else{
        $.ajax({
            url:'https://chicken-moo.com/yongho/ew.php',
            data: {
                name: $('.login-name').val(),
                id: $('.login-id').val(),
                pw: $('.login-pw').val(),
                nm: $('.login-nm').val(),
                ew: $('.login-ew').val(),
                gender: $('.login-gender').val()
            },
            method: 'POST',
            success:function(data){
                alert(data);
                if(data == '성공적으로 회원가입/비밀번호 변경을 하였습니다.'){
                  location.href = "https://chicken-moo.com/yongho/";
                }
            }
        });
      }
      
    }
</script>




