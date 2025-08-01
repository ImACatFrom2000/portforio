<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/purchase.css">
<title>C.C.Donuts | 購入確認</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="cart.php">カート</a> > 購入確認
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="purchase container">
        <div class="center pageTitle">
            <h2>ご購入確認</h2>
        </div>
        <?php
        if(isset($_SESSION['customer'])) {
            $pdo=new PDO('mysql:host=localhost;dbname=データベース名;charset=utf8', 'ユーザー名', 'パスワード');
            echo '<section class="purchaseProducts">';
            echo '<h3>ご購入商品</h3>';
            echo '<ul>';
            $totalCount = 0;
            $totalPrice = 0;
            foreach($_SESSION['product'] as $id=>$product) {
                echo '<li><dl>';
                echo '<dt>商品名</dt><dd>', $product['name'], '</dd>';
                echo '<dt>数量</dt><dd>', $product['count'], '個</dd>';
                $subtotalPrice = $product['price']*$product['count'];
                echo '<dt>金額</dt><dd>税込 ￥', $subtotalPrice, '</dd>';
                $totalCount += $product['count'];
                $totalPrice += $subtotalPrice;
                echo '</dl></li>';
            }
            echo '</ul>';
            echo '<dl class="total">';
            echo '<dt>合計数量</dt><dd>', $totalCount, '個</dd>';
            echo '<dt>合計金額</dt><dd>税込 ￥', $totalPrice, '</dd>';
            echo '</dl></section>';
            echo '<section class="sendTo">';
            echo '<h3>お届け先</h3>';
            echo '<dl>';
            echo '<dt>お名前</dt><dd>', $_SESSION['customer']['name'], '</dd>';
            echo '<dt>郵便番号</dt><dd>', $_SESSION['customer']['postcode3'], '-', $_SESSION['customer']['postcode4'], '</dd>';
            echo '<dt>住所</dt><dd>', $_SESSION['customer']['address'], '</dd>';
            echo '</dl></section>';
            echo '<section class="payment">';
            echo '<h3>お支払い方法</h3>';

            $sql=$pdo->prepare('SELECT * FROM credit WHERE id=?');
            $sql->execute([$_SESSION['customer']['id']]);
            $result = $sql->fetch();
            if($result == false) {
                echo '<p class="button"><a href="creditRegister.php">カード情報を登録する</a></p>';
                echo '<p class="center">カード情報登録がまだのお客様はこちらへお進みください。</p>';
            } else {
                $sql->execute([$_SESSION['customer']['id']]);
                foreach($sql as $row) {
                    echo '<dl>';
                    echo '<dt>お支払い</dt><dd>クレジットカード</dd>';
                    echo '<dt>ブランド</dt><dd>', $row['company'], '</dd>';
                    echo '</dl>';
                }
                echo '<p class="button"><a href="purchaseCompleted.php">購入を確定する</a></p>';
            }
            echo '</section>';
        } else {
            echo '<p>ログインしてください。</p>';
        }
        ?>
        </div>
</main>

<?php require 'includes/footer.php'?>
