<?php session_start(); ?>

<?php
if(isset($_SESSION['customer'])){
    $id = $_REQUEST['id'];
    if(!isset($_SESSION['product'])) {
        $_SESSION['product'] = [];
    }
    $count = 0;
    if(isset($_SESSION['product'][$id])) {
        $count = $_SESSION['product'][$id]['count'];
    }
    $_SESSION['product'][$id]=[
        'name'=>$_REQUEST['name'],
        'price'=>$_REQUEST['price'],
        'count'=>$count + $_REQUEST['count']
    ];
    header('Location:../cart.php');
    exit();
} else {
    header('Location:../login.php');
    exit();
}
?>