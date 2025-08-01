<?php session_start();?>
<?php
if(isset($_SESSION['customer'])) {
    header('Location:logout.php');
    exit();
}
?>

<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/login.css">
<title>C.C.Donuts | ログイン</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > ログイン
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="login container">
        <div class="center pageTitle">
            <h2>ログイン</h2>
        </div>
        <form class="loginForm" action="includes/login.php" method="post">
            <dl class="flex">
                <dt>メールアドレス</dt><dd><input type="email" name="email"></dd>
                <dt>パスワード</dt><dd><input type="password" name="password"></dd>
            </dl>
            <div class="center">
                <input type="submit" value="ログインする">
            </div>
        </form>
        <p class="link"><a href="register.php">会員登録はこちら</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>