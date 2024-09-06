<?php
// 이미지 업로드 처리 부분
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'uploads/'; // 이미지를 저장할 폴더 경로
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // 업로드된 파일을 지정된 위치로 이동
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo "<div class='alert alert-success mt-3'>파일 업로드 성공: {$uploadFile}</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>파일 업로드 실패</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>파일을 업로드하는 중 오류가 발생했습니다.</div>";
    }
}
?>

<div class="container mt-5">
    <h2>이미지 업로드</h2>
    <form action="index.php?cmd=file" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">이미지 파일</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">업로드</button>
    </form>

    <?php if (isset($uploadFile)): ?>
        <div class="mt-4">
            <h3>업로드된 이미지:</h3>
            <img src="<?php echo $uploadFile; ?>" alt="Uploaded Image" class="img-fluid">
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
