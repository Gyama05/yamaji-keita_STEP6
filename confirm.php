<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム - 確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>お問い合わせフォーム - 確認画面</h2>
    </header>
    <div class="sidebar">
        <ul>
            <li><a href="top">トップページ</a></li>
            <li><a href="">人気投稿</a></li>
            <li><a href="">エンジニアおすすめ商品</a></li>
            <li><a href="">エンジニアおすすめ記事</a></li>
            <li><a href="">投稿ページ</a></li>
        </ul>
    </div>
    <div>
        <form action="send.php" method="post">

            <?php
            // POST以外（フォーム以外）からのアクセスは contact.php へリダイレクト
            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                header("Location: contact.php");
                exit;
            }

            $name = $_POST["name"];
            $companyName = $_POST["companyName"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            $message = $_POST["message"];

            // 空欄チェック（どれか1つでも空ならエラー）
            if (empty($name) || empty($companyName) || empty($email) || empty($age) || empty($message)) {
                echo "<p>入力されていない項目があります。</p>";
            }
            // バリデーション
            if (!preg_match("/^[\p{Han}\p{Hiragana}\p{Katakana}a-zA-Z\s'-]+$/u", $name)) {
                echo "<p>お名前は日本語または英字のみで入力してください。</p>";
            } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                echo "<p>正しい形式のメールアドレスを入力してください。</p>";
            } elseif (!preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z0-9０-９\s。、！!？?（）()「」『』\-・…]+$/u", $message)) {
                echo "<p>お問い合わせ内容に使用できない文字が含まれています。</p>";
            } else {
                // 入力内容の表示（テーブル形式）
                echo '<table class="table">';
                echo "<tr><th>お名前</th><td>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</td></tr>";
                echo "<tr><th>会社名</th><td>" . htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8') . "</td></tr>";
                echo "<tr><th>メールアドレス</th><td>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</td></tr>";
                echo "<tr><th>年齢</th><td>" . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . "</td></tr>";
                echo "<tr><th>お問い合わせ内容</th><td>" . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</td></tr>";
                echo '</table>';

                // send.php に渡す hidden
                echo '<input type="hidden" name="name" value="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '">';
                echo '<input type="hidden" name="companyName" value="' . htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8') . '">';
                echo '<input type="hidden" name="email" value="' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '">';
                echo '<input type="hidden" name="age" value="' . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . '">';
                echo '<input type="hidden" name="message" value="' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '">';
            }

            ?>

            <div class="button-confirm">
                <input type="submit" class="submit-button"></input>
                <button type="button" onclick="history.back();">戻る</button>
            </div>
        </form>
    </div>
</body>

</html>