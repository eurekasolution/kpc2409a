<?php
// 랜덤 이름 생성을 위한 배열 정의
$first = "김,김,김,강,강,고,고,독고,곽,구,권,김,김,나,남,노,류,민,박,박,봉,서,성,손,송,정,신,심,최";
$second = "병,석,연,윤,인,완,호,다,본,경";
$third = "민,하,구,진,태,은,우,의정,선,근,석,환,영,현,식";

// 쉼표로 배열 생성
$first_names = explode(",", $first);
$second_names = explode(",", $second);
$third_names = explode(",", $third);

function generate_unique_name($first_names, $second_names, $third_names) {
    do {
        $first = $first_names[array_rand($first_names)];
        $second = $second_names[array_rand($second_names)];
        $third = $third_names[array_rand($third_names)];
    } while ($first == $second || $first == $third || $second == $third); // 중복 방지

    return $first . $second . $third;
}

$num = isset($_POST['num']) ? (int)$_POST['num'] : 0;
?>

<div class="container mt-5">
    <h2>Fake Name Generator</h2>
    <form action="index.php?cmd=fake" method="post">
        <div class="mb-3">
            <label for="num" class="form-label">생성할 이름 수</label>
            <input type="number" class="form-control" id="num" name="num" placeholder="숫자를 입력하세요" value="<?php echo htmlspecialchars($num); ?>">
        </div>
        <button type="submit" class="btn btn-primary">생성</button>
    </form>

    <?php if ($num > 0): ?>
        <h3 class="mt-4">생성된 이름</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>순서</th>
                    <th>이름</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= $num; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo generate_unique_name($first_names, $second_names, $third_names); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
