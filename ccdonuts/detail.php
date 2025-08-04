<?php session_start(); ?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/detail.css">
<title>C.C.Donuts | 商品詳細</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > <a href="products.php">商品一覧</a> >
    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');
    $sql=$pdo->prepare('SELECT * FROM products WHERE id=?');
    $sql->execute([$_REQUEST['id']]);
    foreach($sql as $row) {
        echo $row['name'];
    }
    ?>
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="detail container">
        <?php
        $pdo=new PDO('mysql:host=localhost;dbname=ss707001_ccdonuts;charset=utf8', 'ss707001_user', 'cca.password');
        $sql=$pdo->prepare('SELECT * FROM products WHERE id=?');
        $sql->execute([$_REQUEST['id']]);
        foreach($sql as $row) {
            $sql=$pdo->prepare('UPDATE products SET popularity=? WHERE id=?');
            $sql->execute([$row['popularity'] + 1, $row['id']]);
            echo '<div class="flex">';
            echo '<div class="detailImage">';
            echo '<img src="images/products/product', $row['id'], '.png" alt="', $row['name'], '">';
            echo '</div>';
            echo '<div class="detailText">';
            echo '<h2>', $row['name'], '</h2>';
            echo '<p class="introduction">', $row['introduction'], '</p>';
            echo '<p class="price">税込　￥', $row['price'], '</p>';
            echo '<form class="flex" action="includes/cartInsert.php" method="post">';
            echo '<input type="number" name="count" value="1">個';
            echo '<input type="hidden" name="id" value="', $row['id'], '">';
            echo '<input type="hidden" name="name" value="', $row['name'], '">';
            echo '<input type="hidden" name="price" value="', $row['price'], '">';
            echo '<input type="submit" value="カートに入れる">';
            echo '<a class="addFavorite"><img src="images/detail/favorite.svg"></a>';
            echo '</form>';

            echo '</div></div>';
        }
        ?>
    </div>
</main>

<?php require 'includes/footer.php'?>