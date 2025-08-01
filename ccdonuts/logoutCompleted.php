<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/logoutCompleted.css">
<title>C.C.Donuts | ログアウト完了</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > ログアウト > ログアウト完了
</p></nav>
<div class="welcome"><p class="container">ようこそ　ゲスト様</p></div>

<main>
    <div class="logoutCompleted container">
        <?php 
        if(isset($_SESSION['customer'])) {
            unset($_SESSION['customer']);
            unset($_SESSION['product']);
            echo '<div class="center pageTitle"><h2>ログアウト完了</h2></div>';
            echo '<div class="message"><p>ログアウトしました。</p></div>';
        } else {
            echo '<div class="message"><p>すでにログアウトしています。</p></div>';
        }
        ?>
    </div>
</main>

<?php require 'includes/footer.php'?>

