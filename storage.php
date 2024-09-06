<div class="container mt-5">
<h1>SQL Injection 연습</h1>

<?php if (!isset($_SESSION[$sess_id])): ?>
    <!-- 로그인이 안 되어 있을 때 로그인 폼 -->
    <form action="index.php?cmd=login" method="post" class="mt-4" id="loginForm">
        <div class="mb-3">
            <!-- 아이디 저장 체크박스 및 입력 필드 -->
            <input type="checkbox" id="saveId" class="form-check-input"> 아이디 저장<br>
            <input type="text" name="id" id="idInput" class="form-control mt-2" placeholder="아이디를 입력하세요">
        </div>
        <div class="mb-3">
            <!-- 비밀번호 저장 체크박스 및 입력 필드 -->
            <input type="checkbox" id="savePass" class="form-check-input"> 비밀번호 저장<br>
            <input type="password" name="pass" id="passInput" class="form-control mt-2" placeholder="비밀번호를 입력하세요">
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
    </form>
<?php else: ?>
    <!-- 로그인이 되어 있을 때 -->
    <p><?php echo $_SESSION[$sess_name]; ?> 님</p>
    <button type="submit" class="btn btn-danger" onClick="location.href='index.php?cmd=logout'">로그아웃</button>

<?php endif; ?>
</div>

<!-- JavaScript로 localStorage 관리 -->
<script>
    // AES 암호화에 사용할 키 (이 키는 비밀스럽게 관리되어야 함)
    const secretKey = "mySecretKey12345";

    // 페이지 로드 시 localStorage에서 저장된 아이디와 비밀번호 불러오기
    //window.onload = function() {
        // localStorage에 ID가 있는 경우
        const savedId = localStorage.getItem("savedId");
        if (savedId) {
            document.getElementById("idInput").value = savedId; // 입력창에 저장된 ID 표시
            document.getElementById("saveId").checked = true;   // 체크박스를 체크 상태로
        }

        // localStorage에 암호화된 비밀번호가 있는 경우
        const savedPass = localStorage.getItem("savedPass");
        if (savedPass) {
            // AES 복호화
            Utconst decryptedPass = CryptoJS.AES.decrypt(savedPass, secretKey);
            const originalPass = decryptedPass.toString(CryptoJS.enc.f8);

            document.getElementById("passInput").value = originalPass; // 입력창에 복호화된 비밀번호 표시
            document.getElementById("savePass").checked = true;       // 체크박스를 체크 상태로
        }
    //}

    // 폼 제출 시 localStorage에 아이디와 비밀번호 저장/삭제
    document.getElementById("loginForm").addEventListener("submit", function() {
        // ID 저장 여부 확인 및 localStorage 처리
        if (document.getElementById("saveId").checked) {
            localStorage.setItem("savedId", document.getElementById("idInput").value);
        } else {
            localStorage.removeItem("savedId");
        }

        // 비밀번호 저장 여부 확인 및 localStorage 처리
        if (document.getElementById("savePass").checked) {
            // AES 암호화
            const encryptedPass = CryptoJS.AES.encrypt(document.getElementById("passInput").value, secretKey).toString();
            localStorage.setItem("savedPass", encryptedPass);
        } else {
            localStorage.removeItem("savedPass");
        }
    });
</script>
