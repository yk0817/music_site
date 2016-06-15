<?php

include("func.php");

$pdo = func_pass_db();

$stmt = $pdo->prepare("SELECT * FROM music_site ORDER BY ID DESC");
$res = $stmt->execute();

if ($res==false) {
  db_error($stmt);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}

echo json_encode($result);




 ?>
