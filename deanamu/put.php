<?php
    include 'common.php';    
    
    date_default_timezone_set('Asia/Seoul');
    $title = $_POST['title'];
    $password = 'yonghoms826';
    $tag = $_POST['tag'];
    $content = $_POST['content'];
    $set = $_POST['type'];
    $admin = $_POST['admin'];
    $deln = $_POST['id'];
    $ip = $_POST['ip'];
    
    $qdmin = (date('Ymd') * 150 + 15) / 5;
    //echo $qdmin.' ';
    if($admin != $qdmin){
        res('허용되지 않는 접근입니다.');
    }
    else{
        if($set == 'put'){
            if($password == '' || $title == '' || $tag == '태그 선택' || $content == ''){
                res('입력되지 않은 칸이 있습니다.');
            }
            else if($password != 'yonghoms826'){
                res('용호중학교 와이파이 비밀번호가 틀렸습니다.');
            }
            else{
                if($ip == ''){
                    $ip = 'ipBlocked';
                }
                $pack = $ip.' '.$_SERVER['HTTP_USER_AGENT'];
                alert($pack);
                $time = date('YmdHi');
                $ct = DB("SELECT * FROM data WHERE time='count'");
                $cs = mysqli_fetch_array($ct);
                $count = $cs[pack];
                if($count > 0){
                    $count = $count + 1;
                } 
                else{
                    DB("INSERT INTO data (number, time, title, content, tag, pack) VALUES('-1', 'count', 'count', 'count', 'count', '1')");
                    $count = 1;
                }
                
                
                DB("UPDATE data SET pack='".$count."' WHERE time='count'");
                alert($count);
                $data = "'".$count."', '".$time."', '".$title."', '".$content."', '".$tag."', '".$pack."'";
                $qry = "INSERT INTO data (number, time, title, content, tag, pack) VALUES(".$data.")";
                alert($qry.'<br>');
                if(DB($qry) == '1'){
                    res('성공적으로 DB에 추가하였습니다.');
                }
                else{
                    res('DB 추가 중 오류가 발생하였습니다.');
                }
            }
            
        }
        else if($set == 'del'){
            if($deln == ''){
                res('삭제할 게시물 번호를 입력 해 주세요.');
            }
            else{
                $qry = "DELETE FROM data where number=".$deln;
                if(DB($qry) == 1){
                    res('성공적으로 DB에서 삭제하였습니다.');
                }
                else{
                    res('DB 삭제 중 오류가 발생하였습니다.');
                }
            
            }
            
            
        }
        else{
            res('type을 입력해 주세요.');
        }
    }



?>