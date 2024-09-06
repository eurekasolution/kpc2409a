<?php
    $LPP = 10;
    if(!isset($_GET["page"]))
        $page = 1;
    else
        $page = $_GET["page"];

    $start = ($page -1) * $LPP;

    $sql = "select count(*) as dcount from log";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    echo "data count = $data[dcount] <br>";
    $dataCount = $data["dcount"];

    $maxPage = ceil($dataCount/$LPP);
    echo "maxPage = $maxPage<br>";

    $sql = "select * from log order by idx desc limit $start, $LPP";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $today = Date('Y-m-d');
    echo "today = $today<br>";
    // 순서, IP, WHEN, WORK
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['time', 'count'],
          <?php
                for($i=0; $i<24; $i++)
                {
                    $sql = "select count(*) as c from log 
                                where 
                                time>='$today $i:00:00' 
                                and time<='$today $i:59:59' ";
                    $result1 = mysqli_query($conn, $sql);
                    $data1 = mysqli_fetch_array($result1);
                    $connections = $data1["c"];

                    echo "['$i' , $connections],";
                }
          ?>
        ]);

        var options = {
          title: '접속로그 기록',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('kpc_chart'));

        chart.draw(data, options);
      }
    </script>

      <?php
        if($_SESSION[$sess_sms])
        {
            // do nothing
        }else
        {
            $SendingMsg = "접속자 수가 너무 많습니다.";
            $ReceiveMobile = "010-0000-0000";
            include "auto_sms.php";
            $_SESSION[$sess_sms] = "sendOK";
        }
      ?>
    <div class="container">

        <div class="row">
            <div class="col colLine" id="kpc_chart" style="height:500px;"></div>
        </div>

        <div class="row">
            <div class="col-1 colLine">순서</div>
            <div class="col colLine">IP</div>
            <div class="col colLine">시간</div>
            <div class="col-5 colLine">WORK</div>
            <div class="col colLine">비고</div>
        </div>
    <?php
        while($data)
        {
            ?>
            <div class="row">
                <div class="col-1 colLine"><?php echo $data["idx"]?></div>
                <div class="col colLine"><?php echo $data["ip"]?></div>
                <div class="col colLine"><?php echo $data["time"]?></div>
                <div class="col-5 colLine"><?php echo $data["work"]?></div>
                <div class="col colLine">비고</div>
            </div>

            <?php
            $data = mysqli_fetch_array($result);
        }
    ?>
        <div class="row">
            <div class="col colLine">
                <?php 
                for($i=1; $i<=$maxPage; $i++)
                {
                    if($i == $page)
                    {
                        echo "<span class='badge rounded-pill bg-primary'><a href='index.php?cmd=log&page=$i'>$i</a></span> ";
                    }else
                    {
                        echo "<span class='badge rounded-pill bg-secondary'><a href='index.php?cmd=log&page=$i'>$i</a></span> ";
                    }
                    
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function(){
            //location.href='index.php?cmd=log';
            location.reload();
        }, 3000);

    </script>