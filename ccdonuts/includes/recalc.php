<?php session_start(); ?>
<?php
$_SESSION['product'][$_REQUEST['id']]['count'] = $_REQUEST['count'];
header('Location:../cart.php');
exit();
?>