<?php
    include 'common.php';
    $date = $_GET['date'];
    $grade = $_GET['grade'];
    $class = $_GET['class'];
    $name = $_GET['name'];

    $date_print = substr($date, '0', '4').'년 '.substr($date, '4', '2').'월 '.substr($date, '6', '2').'일';
?>
<div class="content">
  <div class="content-inner">
    <div class="greeting">
      <div class="hello">
        오늘 하루도 <p class="nocum"></p>힘차게!
      </div>
      <br>
      <a href="javascript:load_application();">
        <div class="music hts">
          🎵 점심시간 노래 신청 🎵
        </div>
        <br>
        <div class="room hts">
          🚪 특별실 사용 신청 🚪
        </div>
      </a>
      <br>
      <div class="trapik hts">
        ❗ 과도한 트래픽 유도 금지 ❗
      </div>
      <br>
      <div class="buttons hts">
        <div class="hp">
        데이터 로드 중...
        </div>
        <br>
        <input type="button" value="시종 켜기" class="ts-button sound-button" onclick="sound();">
        <input type="button" value="팀즈 연결" class="ts-button teams-button" onclick="teams();">
      </div>
    </div>
  
    <div class="info">
      <div class="time">
        <div class="timeTitle">
          오늘의 학급 시간표
        </div>
        <div class="timeInfo">
          NEIS 데이터 로드 중...
        </div>
      </div>
      <p class="nocum"></p>
      <div class="schedule">
        <div class="scheduleTitle">
          오늘의 학사일정
        </div>
        <div class="scheduleBox">
          <div class="scheduleDate">
            <?php echo $date_print; ?>
          </div>
          <div class="scheduleInfo">
            NEIS 데이터 로드 중...
          </div>
        </div>
      </div>
      <br>
      <div class="meal">
        <div class="mealTitle">
          오늘의 급식 정보
        </div>
        <div class="mealInfo">
          NEIS 데이터 로드 중...
        </div>
      </div>
    </div>
    </div>
</div>

<script>
  setS();
  $.ajax({
        url:'https://chicken-moo.com/yongho/meal.php',
        data: {
            date: '<?php echo $date; ?>'
        },
        method: 'GET',
        success:function(data){
            $('.mealInfo').html(data);
        }
    });
    $.ajax({
        url:'https://chicken-moo.com/yongho/schedule.php',
        data: {
            date: '<?php echo $date; ?>'
        },
        method: 'GET',
        success:function(data){
            $('.scheduleInfo').html(data);
        }
    });
    $.ajax({
          url:'https://chicken-moo.com/yongho/getTimeTable.php',
          data: {
              date: '<?php echo $date; ?>',
              grade: '<?php echo $grade; ?>',
              class: '<?php echo $class; ?>',
              type: 'pre'
          },
          method: 'GET',
          success:function(data){
              $('.timeInfo').html(data);
          }
      });
</script>
