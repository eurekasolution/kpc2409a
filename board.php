<?php
// 기본 모드 설정
$mode = isset($_GET['mode']) ? $_GET['mode'] : 'list';

// 게시판 목록 출력
if ($mode == "list") {
    $query = "SELECT idx, title, name, DATE_FORMAT(time, '%Y-%m-%d') as date FROM board ORDER BY idx DESC";
    $result = mysqli_query($conn, $query);
    ?>

    <div class="container mt-5">
        <h2>게시판 목록</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>순서</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['idx']; ?></td>
                        <td><a href="index.php?cmd=board&mode=show&idx=<?php echo $row['idx']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="index.php?cmd=board&mode=write" class="btn btn-primary">글쓰기</a>
    </div>

    <?php
}

// 글쓰기 폼 출력
if ($mode == "write") {
    ?>

    <div class="container mt-5">
        <h2>글 작성</h2>
        <form action="index.php?cmd=board&mode=dbwrite" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">제목</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">작성자</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="html" class="form-label">내용</label>
                <textarea class="form-control" id="html" name="html" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">저장</button>
        </form>
    </div>

    <?php
}

// 글 저장 처리
if ($mode == "dbwrite") {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $html = $_POST['html'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date('Y-m-d H:i:s');
/*
    $title = str_replace("<", "&lt;", $title);
    $title = str_replace(">", "&gt;", $title);

    $html = str_replace("<", "&lt;", $html);
    $html = str_replace(">", "&gt;", $html);
*/

    $query = "INSERT INTO board
     (title, name, html, ip, time) VALUES 
     ('$title', '$name', '$html', '$ip', '$time')";
    $result = mysqli_query($conn, $query);

    echo "
    <script>
        alert('글이 성공적으로 저장되었습니다.');
        location.href='index.php?cmd=board';
    </script>
    ";
}

// 글 보기
if ($mode == "show") {
    $idx = $_GET['idx'];
    $query = "SELECT title, name, html, DATE_FORMAT(time, '%Y-%m-%d %H:%i:%s') as time FROM board WHERE idx='$idx'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container mt-5">
        <h2><?php echo $row['title']; ?></h2>
        <p>작성자: <?php echo $row['name']; ?></p>
        <p>작성일: <?php echo $row['time']; ?></p>
        <div>
            <?php echo $row['html']; ?>
        </div>
        <a href="index.php?cmd=board" class="btn btn-primary mt-3">목록으로</a>
    </div>

    <?php
}
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
