<?php
// POSTを受け取る
$name = $_POST['name'];
$subject = $_POST['subject'];
$contents = $_POST['contents'];

// 日付を入れる
$time = date('Y年m月d日　H時i分s秒');

//書き込む値を集める
$str = $time . $name . $subject . $contents;

// ファイルに書き込み
$file = fopen('./data/data.txt','a');
fwrite($file, $str . "\n");
fclose($file);

// ファイルを開く
$openfile = fopen('./data/data.txt','r');
while($str_all = fgets($openfile)){
    // nl2brはHTMLで改行するという関数
    nl2br($str_all);
}

// ファイルを閉じる
fclose($openfile);

?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>下記を投稿しました</h1>
    <p><?= $str ?></p>
    <h2>今まで投稿された内容はこちらになります。</h2>
        <?php
            // ファイルを読み込み専用でオープンする
            $fp = fopen('./data/data.txt', 'r');
            // 終端に達するまでループ
            while (!feof($fp)) {
            // ファイルから一行読み込む
            $line = fgets($fp);
            // 読み込んだ行を出力する
            print '<p>'.$line.'</p>';
            }
            // ファイルをクローズする
            fclose($fp);
        ?>

    <ul>
        <li><a href="input.php">入力フォームに戻る</a></li>
    </ul>
</body>

</html>
