<?php
    if( !isset($_SESSION[$sess_level]) or (isset($_SESSION[$sess_level]) and $_SESSION[$sess_level] < $adminLevel ))
    {
        echo "
        <script>
            alert('접근권한이 없습니다.');
            location.href='index.php';
        </script>
        ";

        exit();
    }
?>

관리자만 볼 수 있는 영역.