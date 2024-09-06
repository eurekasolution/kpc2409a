<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script>
        function checkError()
        {
            var id = document.getElementById('id').value; // ES5
            var regex = /^[a-zA-Z0-9]{4,10}$/;
            if(!regex.test(id))
            {
                alert('아이디는 영문 대소문자, 숫자로 4~10글자 입니다.');
                document.getElementById('id').focus();
                return false;
            }
        }
    </script>

    <div class="container mt-5">
        <h2 class="text-center">로그인</h2>
        <form action="05.php" method="post" onSubmit="return checkError()">
            <div class="mb-3">
                <label for="id" class="form-label">아이디</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="아이디를 입력하세요" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="비밀번호를 입력하세요" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">로그인</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for enhanced features like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
