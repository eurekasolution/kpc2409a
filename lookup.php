<?php
// HTTP 헤더를 사용하여 문자셋을 UTF-8로 설정
?>
<div class="container mt-5">
    <h2>NS Lookup</h2>
    <form action="index.php?cmd=lookup" method="post">
        <div class="mb-3">
            <label for="ip" class="form-label">IP(도메인)</label>
            <input type="text" class="form-control" id="ip" name="ip" placeholder="조회할 IP/도메인">
        </div>
        <button type="submit" class="btn btn-primary">실행</button>
    </form>
    <div class="row">
        <div class="col">
            <pre>
    <?php
        if (isset($_POST["ip"])) {
            // 문자셋을 UTF-8로 설정
            header('Content-Type: text/html; charset=UTF-8');
            
            // 사용자의 입력을 안전하게 처리
            $ip = escapeshellcmd($_POST["ip"]);

            // nslookup 명령어 실행
            $output = system("nslookup " . $ip);

            // 결과를 출력
            echo htmlspecialchars(mb_convert_encoding($output, 'UTF-8', 'CP949')) . "\n";
        }
    ?>
            </pre>
        </div>
    </div>
</div>
