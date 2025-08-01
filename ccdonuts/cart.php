<?php session_start();?>
<?php require 'includes/header.php'?>

<link rel="stylesheet" href="styles/cart.css">
<title>C.C.Donuts | カート</title>

<nav class="pankuzu"><p class="container">
    <a href="index.php">TOP</a> > カート
</p></nav>
<?php require 'includes/welcome.php'?>

<main>
    <div class="cart container">
        <?php
        if(isset($_SESSION['customer'])) {
            if(!empty($_SESSION['product'])) {

                $totalCount = 0;
                $totalPrice = 0;

                echo '<div class="inCart">';
                foreach($_SESSION['product'] as $id=>$product) {
                    $totalCount += $product['count'];
                    $subtotalPrice = $product['price']*$product['count'];
                    $totalPrice+= $subtotalPrice;
                }
                echo '<p>現在 商品', $totalCount, '点</p>';
                echo '<p>ご注文小計：税込 <span class="price">¥', $totalPrice, '</span></p>';
                echo '<p class="button"><a href="purchase.php">購入確認へ進む</a></p>';
                echo '</div>';

                echo '<div class="inCartDetail">';
                foreach($_SESSION['product'] as $id=>$product) {
                    echo '<div class="product flex">';
                    echo '<img src="images/products/product', $id, '.png">';
                    echo '<div class="productDetail">';
                    echo '<p class="productName">', $product['name'], '</p>';
                    echo '<div class="flex">';
                    echo '<p class="price">税込　￥', $product['price'], '</p>';
                    $subtotalPrice = $product['price']*$product['count'];
                    echo '<form action="includes/recalc.php?id=', $id, '" method="post">';
                    echo '<p class="count">数量<input type="number" name="count" value="', $product['count'], '">個</p>';
                    echo '<p><input type="submit" value="再計算">';
                    echo '<p class="delete"><a href="includes/delete.php?id=', $id, '">削除する</a></p>';
                    echo '</form></div></div></div>';
                }
                echo '</div>';
                echo '<div class="inCart">';
                echo '<p>現在 商品', $totalCount, '点</p>';
                echo '<p>ご注文小計：税込 <span class="price">¥', $totalPrice, '</span></p>';
                echo '<p class="button"><a href="purchase.php">購入確認へ進む</a></p>';
                echo '</div>';
            } else {
                echo '<p>カートは空です。</p>';
            }
        } else {
            echo '<p>カートを見るにはログインが必要です。';
        }
        ?>
        <p class="button"><a href="products.php">買い物を続ける</a></p>
    </div>
</main>

<?php require 'includes/footer.php'?>