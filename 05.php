<?php
// 데이터베이스 연결 함수
function connectDB() {
    $host = 'localhost';
    $DBName = 'kpc';
    $DBUser = 'kpc';
    $DBPass = '1111';

    // MySQLi를 사용하여 데이터베이스 연결
    $conn = mysqli_connect($host, $DBUser, $DBPass, $DBName);

    // 연결 체크
    if (mysqli_connect_errno()) {
        echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
        exit;
    }

    return $conn;
}

$conn = connectDB();

// id와 pass 값은 SQL 인젝션 테스트를 위해 직접 사용
$id = $_POST['id'];

//$id = htmlspecialchars($_POST["id"]);
// id = str_replace("--", "", $id);
// id = str_replace(" ", "", $id);

$pass = $_POST['pass'];

// SQL 쿼리문
$query = "SELECT * FROM users WHERE id = '$id' AND pass = '$pass'";
                                //       '' OR 2>1 limit 0, 1 -- ' AND pass = '  '

// 쿼리 실행
$result = mysqli_query($conn, $query);

// 쿼리 결과를 배열로 가져옴
$user = mysqli_fetch_array($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 결과</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">로그인 결과</h2>
        <div class="mt-4">
            <?php if ($user) { ?>
                <div class="alert alert-success" role="alert">
                    로그인 성공! 아이디: <strong><?php echo $user["id"]; ?></strong>
                </div>
            <?php } else{ ?>
                <div class="alert alert-danger" role="alert">
                    로그인 실패! 아이디 또는 비밀번호가 잘못되었습니다.
                </div>
            <?php } ?>
        </div>
        <a href="04.php" class="btn btn-primary mt-3">돌아가기</a>
    </div>

    <!-- Bootstrap JS (optional, for enhanced features like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
