<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/creditRegister.css">
<title>C.C.Donuts | カード情報登録</title>
<meta name="robots" content="noindex">

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > カート > 購入確認 > カード登録
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="creditRegister container">
        <div class="center pageTitle">
            <h2>カード情報登録</h2>
        </div>
        <p class="red center">当サイトは模擬サイトですので、実際のクレジットカード情報は登録しないでください。</p>
        <form class="creditForm" action="creditConfirm.php" method="post">
            <dl>
                <dt>お名前<span class="red">（必須）</span></dt>
                    <dd><input type="text" name="name" required></dd>
                <dt>カード番号<span class="red">（必須）</span></dt>
                    <dd><input type="text" name="number" required></dd>
                <dt>カード会社<span class="red">（必須）</span></dt>
                    <dd>
                        <label><input type="radio" name="company" value="JCB" checked>JCB</label>
                        <label><input type="radio" name="company" value="Visa">Visa</label>
                        <label><input type="radio" name="company" value="Mastercard">Mastercard</label>
                    </dd>
                <dt>有効期限<span class="red">（必須）</span></dt>
                    <dd><input type="text" name="expiry_month" required>月
                        <input type="text" name="expiry_year"required>年</dd>
                <dt>セキュリティコード<span class="red">（必須）</span></dt>
                    <dd><input type="text" name="security" required></dd>
            </dl>
            <div class="center">
                <input type="submit" value="入力を確認する">
            </div>
        </form>
    </div>
</main>

<?php require 'includes/footer.php'?>