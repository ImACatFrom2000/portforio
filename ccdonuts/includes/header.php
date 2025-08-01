<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="common/reset.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles/common.css">
</head>
<body>
<header>
    <div class="headerBar container">
        <nav class="drawer">
            <input class="drawerBtn" type="checkbox" id="drawerBtn">
            <label class="drawerIcon" for="drawerBtn">
                <span></span><span></span><span></span>
            </label>
            <div class="menu">
                <img src="images/common/logo.svg" class="menuLogo">
                <label for="drawerBtn"><img src="images/common/close.png" class="menuClose"></label>
                <ul>
                    <li><a href="index.php">TOP</a></li>
                    <li><a href="products.php">商品一覧</a></li>
                    <li><a href="#">よくある質問</a></li>
                    <li><a href="#">問い合わせ</a></li>
                    <li><a href="#">当サイトのポリシー</a></li>
                </ul>
            </div>
        </nav>
        <h1><a href="index.php"><img src="images/common/logo.svg" alt="C.C.Donutsのロゴ" class="headerLogo"></a></h1>
        <div class="icons flex">
            <a href="login.php"><img src="images/common/login.png"></a>
            <a href="cart.php"><img src="images/common/cart.png"></a>
        </div>
    </div>
    <div class="searchBar">
        <form class="search container" action="searched.php" method="post">
            <button type="submit" class="submitBtn">
                <img src="images/common/search.png" alt="検索アイコン">
            </button>
            <input type="text" name="keyword" class="keywordBox" placeholder="キーワードを入力してください">
        </form>
    </div>

</header>