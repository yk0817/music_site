<?php
// javascript からエリアデータを取得する
// その後、エリアデータから、緯度経度を取る→連想配列
//　次に、連想配列からデータをもらい、値をキーにPHPからデータを取得
// 取得したデータを返してマップ作成

$district = $_POST['district'];
include('func1.php');
$pdo = func_pass_db();
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("SELECT * FROM test2 WHERE DISTRICT = :DISTRICT");
$stmt->bindValue(':DISTRICT',$district,PDO::PARAM_STR);

$res = $stmt ->execute();

if ($res==false) {
  db_error($stmt);
} else{
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


echo json_encode($result);

// echo json_encode($Area);

 ?>
