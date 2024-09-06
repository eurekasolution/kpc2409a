<?php
set_time_limit(0); // 시간 제한 해제

$chars = range('a', 'z'); // 소문자 알파벳 배열
$found = false; // 비밀번호가 발견되면 true로 설정

// 4글자의 모든 조합을 생성하고 검사하는 함수
function generate_and_check_passwords($chars, $conn) {
    global $found;

    // 4중 루프를 사용해 'aaaa'부터 'zzzz'까지 생성
    foreach ($chars as $first) {
        foreach ($chars as $second) {
            foreach ($chars as $third) {
                foreach ($chars as $fourth) {
                    $text = $first . $second . $third . $fourth; // 비밀번호 조합

                    // 데이터베이스에서 pass='$text'인 데이터를 검색
                    $query = "SELECT id, pass FROM users WHERE pass='$text'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // 일치하는 데이터가 있으면 아이디와 비밀번호를 출력
                        $row = mysqli_fetch_assoc($result);
                        echo "<div class='alert alert-success'>아이디: {$row['id']}, 비밀번호: {$row['pass']}</div>";
                        $found = true;
                        return;
                    }
                }
            }
        }
    }
}

?>

<div class="container mt-5">
    <h2>Brute Force 공격</h2>
    <p>4글자의 영문 소문자 조합을 이용하여 비밀번호를 찾습니다.</p>

    <?php
    // 비밀번호 찾기 시작
    if (!$found) {
        generate_and_check_passwords($chars, $conn);
    }

    if (!$found) {
        echo "<div class='alert alert-danger'>비밀번호를 찾을 수 없습니다.</div>";
    }

    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
