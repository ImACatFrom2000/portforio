<?php session_start();?>
<?php require 'includes/header.php'; ?>

<link rel="stylesheet" href="styles/top.css">
<title>C.C.Donuts</title>

<?php require 'includes/welcome.php'?>

<main>
    <div class="hero">
        <img src="images/top/heroPC.png">
    </div>
    <section class="notice container">
        <a href="deetail.php?id=5" class="notice1"><img src="images/top/newProduct.png"></a>
        <a href="#" class="notice2"><img src="images/top/donutsLife.png"></a>
        <a href="products.php" class="notice3"><img src="images/top/products.png"></a>
    </section>
    <section class="introduction flex">
        <p><span>Philosophy</span>私たちの信念<p>
        <p><span>"Creating Connections"</span>「ドーナツでつながる」</p>
    </section>
    <section class="ranking container">
        <div class="center">
            <h2>人気ランキング</h2>
        </div>
        <ol>
            <?php
            $rank=0;
            $pdo=new PDO('mysql:host=localhost;dbname=データベース名;charset=utf8', 'ユーザー名', 'パスワード');
            foreach($pdo->query('SELECT *FROM products ORDER BY popularity DESC LIMIT 6') as $product) {
                $rank++;
                echo '<li><a href="detail.php?id=', $product['id'], '">';
                echo '<div class="center"><p class="rank center">', $rank, '</p></div>';
                echo '<img src="images/products/product', $product['id'], '.png" alt="', $product['name'], '">';
                echo '<p class="productName">', $product['name'], '</p>';
                echo '<p class="price">税込　￥', $product['price'], '</p>';
                echo '<form class="center" action="includes/cartInsert.php" method="post">';
                echo '<input type="hidden" name="id" value="', $product['id'], '">';
                echo '<input type="hidden" name="name" value="', $product['name'], '">';
                echo '<input type="hidden" name="price" value="', $product['price'], '">';
                echo '<input type="hidden" name="count" value="1">';
                echo '<input type="hidden" name="popularity" value="', $product['popularity'], '">';
                echo '<input type="submit" value="カートに入れる">';
                echo '</form></a></li>'; 
            }
            ?>
        </ol>
    </section>
</main>

<?php require 'includes/footer.php'; ?>
