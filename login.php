<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['cmd']) && $_GET['cmd'] == 'login') {
        $id = $_POST['id'];
        $pass = $_POST['pass'];

        // 보안 기능이 제거된 SQL 인젝션이 가능한 쿼리
        $sql = "SELECT * FROM users WHERE id='$id' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        if ($user) {
            // 로그인 성공: 세션 값 저장
            $_SESSION[$sess_id] = $user['id'];
            $_SESSION[$sess_name] = $user['name'];
            $_SESSION[$sess_level] = $user['level'];
            $msg = $_SESSION[$sess_name] . "님 반갑니다.";
        } else {
            $msg = "아이디와 비밀번호를 확인하세요.";
        }

        echo "
        <script>
            alert('$msg');
            location.href='index.php?cmd=injection';
        </script>
        ";
    }

?>