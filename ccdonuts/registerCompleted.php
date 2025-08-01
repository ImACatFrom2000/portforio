<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/registerCompleted.css">
<title>C.C.Donuts | 会員登録完了</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="login.php">ログイン</a> > <a href="register.php">会員登録</a> > 入力完了
</p></nav>
<?php require 'includes/welcome.php'?>

<?php 

$pdo=new PDO('mysql:host=localhost;dbname=データベース名;charset=utf8', 'ユーザー名', 'パスワード');
$sql=$pdo->prepare('INSERT INTO customers VALUES(null, ?,?,?,?,?,?,?)');
$sql->execute([
    $_SESSION['confirm']['name'], $_SESSION['confirm']['nameKana'], $_SESSION['confirm']['postcode3'],
    $_SESSION['confirm']['postcode4'], $_SESSION['confirm']['address'],
    $_SESSION['confirm']['email'], $_SESSION['confirm']['password']
]);
unset($_SESSION['confirm']);
?>

<main>
    <div class="registerCompleted container">
        <div class="center pageTitle">
            <h2>会員登録完了</h2>
        </div>
        <div class="message">
            <p>会員登録が完了しました。</p>
            <p>ログインページへお進みください。</p>
        </div>
        <p class="link"><a href="Cregit.php">クレジットカード登録へすすむ</a></p>
        <p class="link"><a href="confirm.php">購入確認ページへすすむ</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>
