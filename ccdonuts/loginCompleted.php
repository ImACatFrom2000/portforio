<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/loginCompleted.css">
<title>C.C.Donuts | ログイン完了</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > ログイン > ログイン完了
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="loginCompleted container">
        <div class="center pageTitle">
            <h2>ログイン完了</h2>
        </div>
        <div class="message">
            <p>ログインが完了しました。<br>引き続きお楽しみください。</p>
        </div>
        <p class="link"><a href="confirm.php">購入確認ページへすすむ</a></p>
        <p class="link"><a href="index.php">TOPページへもどる</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>