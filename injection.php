
<div class="container mt-5">
<h1>SQL Injection 연습</h1>

<?php if (!isset($_SESSION[$sess_id])): ?>
    <!-- 로그인이 안 되어 있을 때 로그인 폼 -->
    <form action="index.php?cmd=login" method="post" class="mt-4">
        <div class="mb-3">
            <input type="text" name="id" class="form-control" placeholder="아이디를 입력하세요">
        </div>
        <div class="mb-3">
            <input type="password" name="pass" class="form-control" placeholder="비밀번호를 입력하세요">
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
    </form>
<?php else: ?>
    <!-- 로그인이 되어 있을 때 -->
    <p><?php echo $_SESSION[$sess_name]; ?> 님</p>
        <button type="submit" class="btn btn-danger" onClick="location.href='index.php?cmd=logout'">로그아웃</button>

<?php endif; ?>
</div>
