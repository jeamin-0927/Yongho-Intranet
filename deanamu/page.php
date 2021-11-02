<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <title>용대숲 - <?php echo $id; ?>번째 질문</title>
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
    <div id='ctn'>
    </div><br>
    <div id='dat'>
        아직 미완성입니답. 댓글 기능 추가 예정~
    </div>
    <script>
        function content(Qnumber){
            $.ajax({
                url:'https://chicken-moo.com/yongho/deanamu/content.php',
                data: {
                    id: Qnumber
                },
                method: 'GET',
                async: false,
                success:function(data){
                    $('#ctn').append(data);
                }
            });
        }
        content('<?php echo $id; ?>');
        if($('.tg<?php echo $id; ?>').text() == '삭제된 질문'){
            $('#dat').html('삭제된 질문은 댓글 기능을 지원하지 않습니다.');
        }
        else{

        }

    </script>
</body>
</html>
