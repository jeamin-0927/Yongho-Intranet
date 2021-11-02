<?php
    include 'common.php';
?>
<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <title>용대숲 - 시행 규칙</title>
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
        추가하기귀찮아
    </div>
    <br>
    <script>
        $.ajax({
            url:'https://dimigo.dev/policy',
            success:function(data){
                $('.inset').html(data);
            }
        });
    </script>
    
</body>
</html>
