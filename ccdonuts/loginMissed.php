<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/loginMissed.css">
<title>C.C.Donuts | ログイン失敗</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="login.php">ログイン</a> > ログイン失敗
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="loginMissed container">
        <div class="center pageTitle">
            <h2>ログイン失敗</h2>
        </div>
        <div class="message">
            <p>メールアドレスまたはパスワードが違います</p>
        </div>
        <p class="link"><a href="login.php">ログインページへもどる</a></p>
        <p class="link"><a href="register.php">会員登録する</a></p>
    </div>
</main>