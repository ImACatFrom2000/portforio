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
        $pdo=new PDO('mysql:host=localhost;dbname=データベース名;charset=utf8', 'ユーザー名', 'パスワード');
        //purchaseテーブルに購入番号と顧客番号を入れる
        $sql=$pdo->prepare('INSERT INTO purchase VALUES(null,?,?)');
        date_default_timezone_set('Japan');
        $sql->execute([$_SESSION['customer']['id'], date('Y/m/d H:i:s')]);
        //購入番号を取得する
        foreach($pdo->query('SELECT * FROM purchase ORDER BY id DESC LIMIT 1') as $row) {
            $purchase_id = $row['id'];
        }
        foreach($_SESSION['product'] as $id=>$product) {
            //purchase_detailに購入番号、商品番号、個数を入れる
            $sql=$pdo->prepare('INSERT INTO purchase_detail VALUES(?,?,?)');
            $sql->execute([$purchase_id, $id, $product['count']]);
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

