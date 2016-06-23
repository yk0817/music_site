<?php
include("func.php");

// なぜかエラーが出る
$pdo = func_pass_db();
$stmt = $pdo->query('SET NAMES utf8');
// $stmt = $pdo->prepare("INSERT INTO music_site (ID,Address,Name,HP,Image_place) VALUES ('1','1','1','1','1'); ");
// $stmt = $pdo->prepare("INSERT INTO test2 (Address,Name,HP,Image_place) VALUES ('1','1','1','1'); ");
$stmt = $pdo->prepare("INSERT INTO music_site (ID,Address,Name,HP,Image_place,Regist_time) VALUES (NULL,:Address,:Name,:HP,:Image_place,SYSDATE()) ");

// echo $_POST['regist_email'];
// echo $_POST['regist_email'];

$stmt->bindValue(':Address',$_POST['regist_email'],PDO::PARAM_INT);
$stmt->bindValue(':Name',$_POST['regist_name'],PDO::PARAM_INT);
$stmt->bindValue(':HP',$_POST['regist_hp'],PDO::PARAM_INT);
$stmt->bindValue(':Image_place',$_POST['regist_img'],PDO::PARAM_INT);

$flag = $stmt->execute();
// var_dump($flag);

if ($flag == false) {
  echo "SQLエラー";
} else {
  echo "成功";
}

 ?>
