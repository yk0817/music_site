<?php
include("func.php");

$pdo = func_pass_db();
$stmt = $pdo->prepare("INSERT INTO music_site (ID,Address,Name,HP) VALUES (NULL,:Address,:Name,:HP) ");

$stmt->bindValue(':Address',$_POST['regist_email']);
$stmt->bindValue(':Name',$_POST['regist_name']);
$stmt->bindValue(':HP',$_POST['regist_hp']);

$stmt->execute;


 ?>
