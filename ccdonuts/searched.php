<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/products.css">
<title>C.C.Donuts | 検索結果</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > 検索結果
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="products container">
        <div class="center pageTitle">
            <h2>検索結果</h2>
        </div>
        <ul class="list">
        <?php
        $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');
        $sql=$pdo->prepare('SELECT * FROM products where name like ?');
        $sql->execute(['%'.$_REQUEST['keyword'].'%']);
        foreach ($sql as $row) {
            echo '<li><a href="detail.php?id=', $row['id'], '">';
            echo '<img src="images/products/product', $row['id'], '.png" alt="', $row['name'], '">';
            echo '<p class="productName">', $row['name'], '</p>';
            echo '<p class="price">税込　￥', $row['price'], '</p>';
            echo '<form class="center" action="includes/cartInsert.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['id'], '">';
            echo '<input type="hidden" name="name" value="', $row['name'], '">';
            echo '<input type="hidden" name="price" value="', $row['price'], '">';
            echo '<input type="hidden" name="count" value="1">';
            echo '<input type="submit" value="カートに入れる">';
            echo '</form>';
            echo '</a></li>';
        }
        ?>
        </ul>
</main>
<?php require 'includes/footer.php'?>