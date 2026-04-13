<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST['age'] ?? '', ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
    $question = htmlspecialchars($_POST['question'] ?? '', ENT_QUOTES, 'UTF-8');
    $sex = htmlspecialchars($_POST['sex']     ?? '', ENT_QUOTES, 'UTF-8');
} else {
    
    header("Location: form.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>送信内容の確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>送信内容の確認</h1>
        <div style="background: white; padding: 20px; border-radius: 10px; display: inline-block; text-align: left; width: 80%; max-width: 400px;">
            <p><strong>名前：</strong> <?php echo $name; ?> 様</p>
            <p><strong>年齢：</strong> <?php echo $age; ?> 歳</p>
            <p><strong>電話番号：</strong> <?php echo $phone; ?></p>
            <p><strong>メール：</strong> <?php echo $email; ?></p>
            <p><strong>住所：</strong> <?php echo $address; ?></p>
            <p><strong>質問：</strong> <?php echo $question; ?></p>
            <p><strong>性別：</strong> <?php echo $sex; ?></p>
            
            <div style="text-align: center; margin-top: 20px;">
                <a href="form.php" style="margin-right: 10px;">修正する</a>
                <button type="button" onclick="alert('送信しました（デモ）')">この内容で送信</button>
            </div>
        </div>
    </div>
</body>
</html>