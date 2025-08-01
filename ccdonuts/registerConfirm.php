<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/registerConfirm.css">
<title>C.C.Donuts | 会員登録入力確認</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="login.php">ログイン</a> > <a href="register.php">会員登録</a> > 入力確認
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="registerConfirm container">
        <div class="center pageTitle">
            <h2>入力確認</h2>
        </div>
        
        <?php

        $name = $_REQUEST['name'];
        $nameKana = $_REQUEST['nameKana'];
        $postcode3 = $_REQUEST['postcode3'];
        $postcode4 = $_REQUEST['postcode4'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $emailRe = $_REQUEST['emailRe'];
        $password = $_REQUEST['password'];
        $passwordRe = $_REQUEST['passwordRe'];

        $_SESSION['confirm']=[
            'name'=>$name, 'nameKana'=>$nameKana, 'postcode3'=>$postcode3,
            'postcode4'=>$postcode4, 'address'=>$address,
            'email'=>$email, 'emailRe'=>$emailRe,
            'password'=>$password, 'passwordRe'=>$passwordRe
        ];

        if(preg_match('/^[0-9]{7}$/', $postcode3.$postcode4)) {                                   //郵便番号のパターンマッチング
            if ($email == $emailRe && $password == $passwordRe) {                               //メールアドレスとパスワードの一致
                if(preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {  //メールアドレスのパターンマッチング
                    if(preg_match('/^(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9]{8,20}$/', $password)){   //パスワードのパターンマッチング
                        $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');
                        $sql=$pdo->prepare('SELECT * FROM customers WHERE mail=?');
                        $sql->execute([$email]);
                        $result = $sql->fetch();
                        if($result === false) {
                            echo '<dl class="flex">';
                            echo '<dt class="name">お名前</dt>';
                            echo '<dd class="name">', $name, '</dd>';
                            echo '<dt class="nameKana">お名前（カタカナ）</dt>';
                            echo '<dd class="nameKana">', $nameKana, '</dd>';
                            echo '<dt class="postcode">郵便番号</dt>';
                            echo '<dd class="postcode">', $postcode3.$postcode4, '</dd>';
                            echo '<dt class="address">住所</dt>';
                            echo '<dd class="address">', $address, '</dd>';
                            echo '<dt class="email">メールアドレス</dt>';
                            echo '<dd class="email">', $email, '</dd>';
                            echo '<dt class="emailRe">メールアドレス確認用</dt>';
                            echo '<dd class="emailRe">', $emailRe, '</dd>';
                            echo '<dt class="password">パスワード</dt>';
                            echo '<dd class="password">', $password, '</dd>';
                            echo '<dt class="passwordRe">パスワード確認用</dt>';
                            echo '<dd class="passwordRe">', $passwordRe, '</dd>';
                            echo '</dl>';
                            echo '<p class="button"><a href="registerCompleted.php">登録する</p>';
                        } else {
                            echo '<p>そのメールアドレスは既に使われています。</p>';
                        }
                    } else {
                        echo '<p>', $password, 'は適切なパスワードではありません。</p>';
                    }
                } else {
                    echo '<p>', $email, 'は適切なメールアドレスではありません。</p>';
                }
            } else {
                echo 'メールアドレスまたはパスワードが一致しません。';
            }
        } else {
            echo '<p>', $postcode3.$postcode4, 'は適切な郵便番号ではありません。</p>';
        }
        ?>
        <p class="link"><a href="register.php">入力し直す</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>