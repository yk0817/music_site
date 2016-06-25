<?php
// javascript からエリアデータを取得する
// その後、エリアデータから、緯度経度を取る→連想配列
//　次に、連想配列からデータをもらい、値をキーにPHPからデータを取得
// 取得したデータを返してマップ作成

$Area = $_POST['area'];
// include('func1.php');
// $pdo = func_pass_db();
// $stmt = $pdo->query('SET NAMES utf8');
// $stmt = $pdo->prepare("SELECT * FROM test2 WHERE AREA = :AREA");
// $stmt->bindValue(':AREA',$Area,PDO::PARAMSTR);
//
// $result = $stmt ->execute();
//
//
// echo json_encode($result);
echo ($Area);

 ?>
