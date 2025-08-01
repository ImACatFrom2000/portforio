<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/creditConfirm.css">
<title>C.C.Donuts | カード情報確認</title>
<meta name="robots" content="noindex">

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > カート > 購入確認 > カード登録 > 情報確認
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="creditConfirm container">
        <div class="center pageTitle">
            <h2>入力情報登録</h2>
        </div>
        <?php
        $_SESSION['credit']=[
            'name'=>$_REQUEST['name'], 'number'=>$_REQUEST['number'], 'company'=>$_REQUEST['company'],
            'expiry_month'=>$_REQUEST['expiry_month'], 'expiry_year'=>$_REQUEST['expiry_year'], 'security'=>$_REQUEST['security']
        ];
        echo '<dl>';
        echo '<dt>お名前</dt><dd>', $_SESSION['credit']['name'], '</dd>';
        echo '<dt>カード番号</dt><dd>', $_SESSION['credit']['number'], '</dd>';
        echo '<dt>カード会社</dt><dd>', $_SESSION['credit']['company'], '</dd>';
        echo '<dt>有効期限</dt><dd>', $_SESSION['credit']['expiry_month'], '月', $_SESSION['credit']['expiry_year'], '年</dd>';
        echo '<dt>セキュリティコード</dt><dd>', $_SESSION['credit']['security'], '</dd>';
        echo '</dl>';
        ?>
        <p class="button">
            <a href="creditCompleted.php">登録する</a>
        </p>
    </div>
</main>

<?php require 'includes/footer.php'?>