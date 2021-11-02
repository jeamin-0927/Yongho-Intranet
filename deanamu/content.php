<?php
    include 'common.php';
    $id = $_GET['id'];
    $ct = DB("SELECT * FROM data WHERE number='".$id."'");
    $cs = mysqli_fetch_array($ct);
    
    $title = $cs[title];
    $content = $cs[content];
    $tag = $cs[tag];
    $time = $cs[time];

    if($tag == ''){
        $tag = '삭제된 질문';
        $title = '삭제된 질문입니다.';
    }
?>
<a href="page.php?id=<?php echo $id; ?>">
<div class="inset insetc">
    <div class="code ist">
        
        #<?php echo $id; ?>번째 질문
        
    </div>
    <br>
    <div class="ctime ctime<?php echo $id; ?> ist content<?php echo $id; ?>">
        
    </div>
    <br class="content<?php echo $id; ?>">
    <div class="ctitle isq">
        <?php echo $title; ?>
    </div>
    <br class="content<?php echo $id; ?>">
    <div class="ccontent isq content<?php echo $id; ?>">
        <?php echo $content; ?>
    </div>
    <br>
    <div class="ctag tg<?php echo $id; ?>"><?php echo $tag; ?></div>
    <script>
        if('<?php echo $tag; ?>' == '삭제된 질문'){
            $('.content<?php echo $id; ?>').css('display', 'none');
        }
        var time = '<?php echo $time; ?>';
        var year = time.substring(0, 4);
        var month = time.substring(4, 6);
        var date = time.substring(6, 8);
        var t1 = time.substring(8, 10);
        var t3 = '';
        if(t1 >= 0 && t1 <= 5){
            t3 = '새벽';
        }
        else if(t1 >= 6 && t1 <= 9){
            t3 = '아침';
        }
        else if(t1 >= 10 && t1 <= 14){
            t3 = '점심';
        }
        else if(t1 >= 15 && t1 <= 17){
            t3 = '낮';
        }
        else if(t1 >= 18 && t1 <= 21){
            t3 = '저녁';
        }
        else if(t1 >= 22 && t1 <= 24){
            t3 = '밤';
        }
        var t2 = time.substring(10, 12);

        var spce = year + '년 ' + month + '월 ' + date + '일 ' + t3;
        $('.ctime<?php echo $id; ?>').text(spce);
    </script>
</div>
</a>
<br>