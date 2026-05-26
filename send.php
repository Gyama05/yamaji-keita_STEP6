<?php
// POST以外（フォーム以外）からのアクセスは contact.php へリダイレクト
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

// POSTデータ受け取り
$name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
$company = htmlspecialchars($_POST['company'] ?? '', ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($_POST['age'] ?? '', ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

// ここでメール送信などの処理を行う
// 今は例として「成功した」と仮定
$success = true;

// もしメール送信などでエラーが起きたら
// $success = false;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム - 送信完了画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>お問い合わせフォーム - 送信完了画面</h1>
    </header>

    <div class="result">
        <?php if ($success): ?>
            <p class="success">お問い合わせが送信されました。ありがとうございます！</p>
        <?php else: ?>
            <p class="error">送信中にエラーが発生しました。時間をおいて再度お試しください。</p>
        <?php endif; ?>
    </div>

    <div class="rink">
        <a href="http://localhost:8888/yamaji-keita_STEP6/contact.php">
            お問い合わせフォームに戻る 
        </a>
    </div>

    <script src="script.js"></script>
</body>

</html>