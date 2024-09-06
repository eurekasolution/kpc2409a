<?php
    // 모든 세션 변수 제거
    unset($_SESSION[$sess_id]);
    unset($_SESSION[$sess_name]);
    unset($_SESSION[$sess_level]);

    // 세션 종료
    session_destroy();

    echo"
    <script>
        alert('OK Logout');
        location.href='index.php?cmd=injection';
    </script>
    ";
?>