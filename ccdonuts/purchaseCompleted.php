<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/purchaseCompleted.css">
<title>C.C.Donuts | 購入完了</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > カート > 購入確認 > 購入完了
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="purchase container">
        <div class="center pageTitle">
            <h2>ご購入完了</h2>
        </div>

        <?php
        $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');
        //purchaseテーブルに購入番号と顧客番号を入れる
        $sql=$pdo->prepare('INSERT INTO purchase VALUES(null,?)');
        $sql->execute([$_SESSION['customer']['id']]);
        //purchase_detailテーブルに顧客番号と商品番号と個数を入れる
        foreach($_SESSION['product'] as $id=>$product) {
            $sql=$pdo->prepare('INSERT INTO purchase_detail VALUES(?,?,?)');
            $sql->execute([$_SESSION['customer']['id'], $id, $product['count']]);
            //productテーブルのpopularityを1点につき+5する
            $sql=$pdo->prepare('UPDATE products SET popularity=? WHERE id=?');
            $sql->execute([$product['popularity'] + 5*$product['count'], $id]);
        }
        
        //$_SESSION['product']のデータを削除する。
        unset($_SESSION['product']);
        ?>

        <div class="message center">
            <p>ご購入いただきありがとうございます。<br>今後ともご愛顧の程、宜しくお願いいたします。</p>
        </div>
        <p class="link"><a href="index.php">TOPページへすすむ</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>