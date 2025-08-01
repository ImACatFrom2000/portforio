<div class="welcome">
    
    <?php
    if(isset($_SESSION['customer'])) {
        echo '<p class="container">ようこそ　', $_SESSION['customer']['name'], '様</p>';
    } else {
        echo '<p class="container">ようこそ　ゲスト様</p>';
    }
    ?>
</div>