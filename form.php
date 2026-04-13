<?php
$errors = []; 
$name = $age = $phone = $email = $address = $question = $sex = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $phone = $_POST['phone'] ?? ''; 
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $question =$_POST['question'] ?? '';
    $sex = $_POST['sex'] ?? '';

    
    // 1_名前：ひらがな、カタカナ、漢字、英字のみ
    if (empty($name) || !preg_match("/^[ぁ-んァ-ヶー一-龠々〇〻ーーa-zA-Zａ-ｚＡ-Ｚ]+$/u", $name)) {
    $errors[] = "name：名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
    }

    // 2_年齢：0から150の間
    if ($age === "" || !is_numeric($age) || $age < 0 || $age > 150) {
        $errors[] = "age：年齢は0から150の間で入力してください。";
    }

    // 3_電話番号：半角数字とハイフンのみ
    if (empty($phone) || !preg_match("/^[0-9-]+$/", $phone)) {
        $errors[] = "phone：電話番号は半角数字とハイフンのみ使用できます。";
    }

    // 4_メールアドレスの形式
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email：メールアドレスの形式が正しくありません。";
    }

    // 5_住所：ひらがな、カタカナ、漢字、英字のみ
    if (empty($address) || !preg_match("/^[ぁ-んァ-ヶー一-龠ａ-ｚＡ-Ｚa-zA-Z]+$/u", $address)) {
        $errors[] = "address：住所はひらがな、カタカナ、漢字のみ使用できます。";
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
      if (empty($errors)) {
        
        include('confilm.php'); 
        exit; 
       }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>フォーム入力</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .info-box { padding: 15px; margin: 20px auto; width: 80%; max-width: 400px; border-radius: 10px; text-align: left; }
        .error-list { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; list-style: none; padding-left: 20px; }
        .error-list li { margin-bottom: 5px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>フォーム入力</h1>

        <?php if (!empty($errors)): ?>
            <ul class="info-box error-list">
                <?php foreach ($errors as $err): ?>
                    <li><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="form.php" method="POST"> <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">

            <label for="age">年齢:</label>
            <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">

            <label for="phone">電話番号:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">

            <label for="email">メールアドレス:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="address">住所:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>">

            <label for="question">質問:</label>
            <input type="text" id="question" name="question" value="<?php echo htmlspecialchars($question); ?>">

            <label for="sex">性別:</label>
            <select id="sex" name="sex">
                <option value="選択しない" <?php if($sex == "選択しない") echo "selected"; ?>>選択しない</option>
                <option value="男" <?php if($sex == "男") echo "selected"; ?>>男</option>
                <option value="女" <?php if($sex == "女") echo "selected"; ?>>女</option>
            </select>

            <button type="submit">送信</button>
            
        </form>
    </div>
</body>
</html>