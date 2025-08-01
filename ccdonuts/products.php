<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/products.css">
<title>C.C.Donuts | 商品一覧</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > 商品一覧
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="products container">
        <div class="pageTitle center">
            <h2>商品一覧</h2>
        </div>
        <?php
        $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');

        echo '<section class="mainMenu">';
        echo '<h3>メインメニュー</h3>';
        echo '<ul class="list">';
        $sql=$pdo->query('SELECT * FROM products WHERE id <= 6');
        foreach($sql as $row){
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
        echo '</ul></section>';

        echo '<section class="verietySet">';
        echo '<h3>バラエティセット</h3>';
        echo '<ul class="list">';
        $sql=$pdo->query('SELECT * FROM products WHERE id > 6');
        foreach($sql as $row){
            echo '<li><a href="detail.php?id=', $row['id'], '">';
            echo '<img src="images/products/product', $row['id'], '.png" alt="', $row['name'], '">';
            echo '<p class="productName">', $row['name'], '</p>';
            echo '<p class="price">税込　￥', $row['price'], '</p>';
            echo '<form class="center" action="includes/cartInsert.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['id'], '">';
            echo '<input type="hidden" name="name" value="', $row['name'], '">';
            echo '<input type="hidden" name="price" value="', $row['price'], '">';
            echo '<input type="hidden" name="count" value="1">';
            echo '<input type="hidden" name="popularity", value="', $row['popularity'], '">'; 
            echo '<input type="submit" value="カートに入れる">';
            echo '</form>';
            echo '</a></li>';
        }
        echo '</ul></section>';
        ?>
    </div>
</main>
<?php require 'includes/footer.php'?>