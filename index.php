<?php
	include "db.php";
	include "config.php";

	$conn = connectDB();

	session_save_path("sess");
	session_start();
	
    $_SESSION["sess_clicktime"] = "2024-09-05 13:34:56";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>취약점 분석</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.js"></script>
    <style>

    </style>
</head>
<body>

	<?php

		//phpinfo();
		$ip = $_SERVER["REMOTE_ADDR"];

		$a = rand(1, 254);
		$b = rand(1, 254);
		$c = rand(1, 254);
		$d = rand(1, 254);
		$ip = "$a.$b.$c.$d";
		// echo "ip = $ip<br>";
		$work = $_SERVER["REQUEST_URI"];
		if(!isset($_SESSION[$sess_id]))
		{
			$logid = "";
		}else
		{
			$logid = $_SESSION[$sess_id];
		}

        if(isset($_GET["cmd"]) and $_GET["cmd"] != "log") {
            $sql = "insert into log (id, ip, time, work) VALUES 
		 			 ('$logid', '$ip', now(), '$work') ";
		    mysqli_query($conn, $sql);
        }
		



		include "menu.php";
	?>
    <!-- Body Content -->
    <div class="container-flex">
        <div class="container mt-4">
            <?php
            if (isset($_GET['cmd'])) {
                $cmd = $_GET['cmd'];
                $filename = "$cmd.php";
                if (file_exists($filename)) {

					//echo "include $filename , sessid = $sess_id<br>";
                    include $filename;
                } else {
                    echo "<div class='alert alert-danger'>해당 페이지가 존재하지 않습니다.</div>";
                }
            } else {
                include "init.php";
            }
            ?>
        </div>
    </div>



    <!-- 추가된 부분: 팝업창 HTML -->
    <div id="popupOverlay"></div>
    <div id="popupLayer">
        <h5>공지사항</h5>
        <p>오늘 하루 이 창을 다시 보지 않으시겠습니까?</p>
        <button id="closePopup">닫기</button>
        <button id="closePopupForDay">하루 동안 보지 않기</button>
    </div>



    <!-- Footer -->
    <footer class="text-center bg-secondary">
        <div class="container">
            <p>한국생산성본부(KPC) 웹 취약점 분석과 시큐어 코딩 과정</p>
        </div>
    </footer>

    <?php
    mysqli_close($conn);
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>
        // 팝업창을 닫기 위한 버튼들
        const closePopup = document.getElementById("closePopup");
        const closePopupForDay = document.getElementById("closePopupForDay");
        const popupLayer = document.getElementById("popupLayer");
        const popupOverlay = document.getElementById("popupOverlay");

        // 팝업창을 보여주는 함수
        function showPopup() {
            popupLayer.style.display = "block";
            popupOverlay.style.display = "block";
        }

        // 팝업창을 닫는 함수
        function hidePopup() {
            popupLayer.style.display = "none";
            popupOverlay.style.display = "none";
        }

        // 페이지 로드 시 localStorage 확인 후 팝업 표시 여부 결정
        window.onload = function() {
            const hidePopupUntil = localStorage.getItem("hidePopupUntil");
            const currentDate = new Date();

            if (!hidePopupUntil || new Date(hidePopupUntil) < currentDate) {
                // showPopup();
            }
        }

        // "닫기" 버튼 클릭 시
        closePopup.addEventListener("click", function() {
            hidePopup();
        });

        // "하루 동안 보지 않기" 버튼 클릭 시
        closePopupForDay.addEventListener("click", function() {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1); // 1일 후 시간 설정
            localStorage.setItem("hidePopupUntil", tomorrow); // localStorage에 저장
            hidePopup();
        });
    </script>