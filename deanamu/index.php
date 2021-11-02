<?php
    include 'common.php';
?>
<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <title>용대숲</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <style>
        @import url('https://chicken-moo.com/yongho/deanamu/main.css') screen and (min-width: 750px);
        @import url('https://chicken-moo.com/yongho/deanamu/mobile.css') screen and (max-width: 750px);
    </style>
    <script src="https://chicken-moo.com/yongho/deanamu/script.js"></script>
</head>
<body link="black" alink="black" vlink="black">
    <div class="header">
    </div>
    <br>
    <div class="inset">
        <div class="inset-inner">
            <input id="title" name="title" class="bxt title" type="text" autocomplete="off" placeholder="제목 (최대 20자)">
            <input id="password" name="password" class="bxt sep" type="hidden" value="yonghoms826" autocomplete="off" placeholder="용호중 와이파이 비밀번호는?">
            <select id="tag" name="tag" class="bxt tag">
                <option>태그 선택</option>
                <option>궁금증</option>
                <option>진로진학</option>
                <option>학교생활</option>
                <option>인간관계</option>
                <option>유머</option>
                <option>개인</option>
            </select>
            <br>
            <textarea id="content" name="content" class="bxt content" type="text" autocomplete="off" placeholder="욕설 및 비방은 징계 대상입니다. (최대 3000자)"></textarea>
            <br>
            <div class="apx a_reCAPTCHA">이 사이트는 프로그래밍 연습용으로 <a href="https://dimigo.dev/" class="apc ca" target="_blank">디대숲</a>을 참고하여 만들어졌습니다.</div>
            <br>
            <input id="type" name="type" class="bxt sub" type="submit" value="제보하기" onclick="Onput();">
            <div class="div_pol">
                <a class="a_pol ca" href="policy.php">게시 규정 ></a>
            </div>
            <input id="ip" name="ip" type="hidden" value="" class="ip">
            <input id="admin" name="admin" type="hidden" value="<?php date_default_timezone_set('Asia/Seoul'); echo (date('Ymd') * 150 + 15) / 5;"" ?>">
            <input id="cnt" class="cnt" name="cnt" type="hidden" value="<?php 
        $ct = DB("SELECT * FROM data WHERE time='count'");
        $cs = mysqli_fetch_array($ct);
        $count = $cs[pack];
        echo $count;
        ?>">
        </div>
    </div>
    <br>
    
    <script>
        if(parent.location.href != 'https://chicken-moo.com/yongho/main.php'){
            location.replace('https://chicken-moo.com/yongho/');
        }
        var cnt = $('.cnt').val();
        show(cnt);
        $(document).ready(function(){
            $(window).scroll(function(){
                show_check();
            });

            var ts = 'content';
            $('#' + ts).change(function(){$('#' + ts).val(fill_out_kl($('#' + ts).val()));});
            var ts = 'title';
            $('#' + ts).change(function(){$('#' + ts).val(fill_out_kl($('#' + ts).val()));});
            var ts = 'password';
            $('#' + ts).change(function(){$('#' + ts).val(fill_out_kl($('#' + ts).val()));});
            
        });
        $('#password').val('yonghoms826');
        $.ajax({
            url: 'https://api64.ipify.org',
            success:function(data){
                $('.ip').val(data);
            }
        });
    </script>
    
</body>
</html>
