<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/creditConfirm.css">
<title>C.C.Donuts | カード情報登録完了</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > カート > 購入確認 > カード登録 > 情報確認 > 登録完了
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="creditCompleted container">
        <div class="center pageTitle">
            <h2>カード情報登録完了</h2>
        </div>
        <?php
        // データベースに接続。$pdoにPDOクラスのインスタンスを代入
        $sql=$pdo->prepare('INSERT INTO credit VALUES(?,?,?,?,?,?,?)');
        $sql->execute([
            $_SESSION['customer']['id'],
            $_SESSION['credit']['name'], $_SESSION['credit']['number'], $_SESSION['credit']['company'],
            $_SESSION['credit']['expiry_month'], $_SESSION['credit']['expiry_year'], $_SESSION['credit']['security']
        ]);
        unset($_SESSION['credit']);
        ?>
        <div class="message center">
            <p>支払い情報登録が完了しました。</br>続けて購入確認ページへお進みください。</p>
        </div>
        <p class="link"><a href="purchase.php">購入確認ページへすすむ</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>
