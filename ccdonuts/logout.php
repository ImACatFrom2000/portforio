<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/logout.css">
<title>C.C.Donuts | ログアウト</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > ログアウト
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="logout container">
        <div class="center pageTitle">
            <h2>ログアウト</h2>
        </div>
        <form action="logoutCompleted.php" method="post">
            <p>ログアウトしますか？</p>
            <p><input type="submit" value="ログアウト"></p>
        </div>
    </div>
</main>

<?php require 'includes/footer.php'?>