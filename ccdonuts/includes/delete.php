<?php session_start(); ?>
<?php
unset($_SESSION['product'][$_REQUEST['id']]);
header('Location:../cart.php');
exit();
?>