<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/register.css">
<title>C.C.Donuts | 会員登録</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="login.php">ログイン</a> > 会員登録
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="register container">
        <div class="center pageTitle">
            <h2>会員登録</h2>
        </div>
        <form class="registerForm" action="registerConfirm.php" method="post">
            <dl class="flex">
                <dt class="name">お名前<span class="red">（必須）</span></dt>
                    <dd class="name"><input type="text" name="name" required></dd>
                <dt class="nameKana">お名前（カタカナ）<span class="red">（必須）</span></dt>
                    <dd class="nameKana"><input type="text" name="nameKana" required></dd>
                <dt class="postcode">郵便番号<span class="red">（必須）</span></dt>
                    <dd class="postcode"><input type="text" name="postcode3" required>
                                         <input type="text" name="postcode4" required></dd>
                <dt class="address">住所<span class="red">（必須）</span></dt>
                    <dd class="address"><input type="text" name="address" required></dd>
                <dt class="email">メールアドレス<span class="red">（必須）</span></dt>
                    <dd class="email"><input type="text" name="email" required></dd>
                <dt class="emailRe">メールアドレス確認用<span class="red">（必須）</span></dt>
                    <dd class="emailRe"><input type="text" name="emailRe" required></dd>
                <dt class="password">パスワード<span class="red">（必須）</span><span class="attention">半角英数字8文字以上20文字以内で入力してください。※記号の使用はできません</span></dt>
                    <dd class="password"><input type="text" name="password" required></dd>
                <dt class="passwordRe">パスワード確認用<span class="red">（必須）</span></dt>
                    <dd class="passwordRe"><input type="text" name="passwordRe" required></dd>
            </dl>
            <div class="center">
                <input type="submit" value="入力確認する">
            </div>
        </form>
    </div>
</main>

<?php require 'includes/footer.php'?>