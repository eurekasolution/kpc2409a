<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX를 이용한 페이지 로드</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (최신 버전) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- 내용은 jQuery로 getInitPage.php에서 로드됩니다 -->

        <script>
        $(document).ready(function() {
            // getInitPage.php에서 데이터를 가져와 body에 출력
            $.get('getInitPage.php', function(data) {
                console.log("AJAX 요청 성공");
                console.log("서버 응답:", data);
                $('#body').html(data);
            })
            .fail(function() {
                console.log("AJAX 요청 실패");
            });
        });
    </script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body id="body">

</body>
</html>
