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
        <form action="confirm.php" method="post">
            <table class="table">
                <tr>
                    <th>お名前</th>
                    <td><?php echo $_POST["name"] ?></td>
                </tr>
                <tr>
                    <th>会社名</th>
                    <td><?php echo $_POST["company"] ?></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><?php echo $_POST["email"] ?></td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td><?php echo $_POST["age"] ?></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td><?php echo $_POST["message"] ?></td>
                </tr>
            </table>
            <div class="button-confirm">
                <input type="submit" class="submit-button"></input>
                <button type="button" onclick="history.back();">戻る</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>