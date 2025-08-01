<?php session_start(); ?>
<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=データベース名;charset=utf8', 'ユーザー名', 'パスワード');
$sql=$pdo->prepare('SELECT * FROM customers WHERE mail=? AND password=?');
$sql->execute([$_REQUEST['email'], $_REQUEST['password']]);
foreach($sql as $row){
    $_SESSION['customer']=[
        'id'=>$row['id'], 'name'=>$row['name'], 'mail'=>$row['mail'], 'password'=>$row['password'],
        'postcode3'=>$row['postcode_a'], 'postcode4'=>$row['postcode_b'], 'address'=>$row['address']
    ];
}
if(isset($_SESSION['customer'])) {
    header('Location:../loginCompleted.php');
    exit();
} else {
    header('Location:../loginMissed.php');
    exit();
}
?>
