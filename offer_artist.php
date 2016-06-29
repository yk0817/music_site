<?php
include("func.php");

// $pdo = func_pass_db();
// $stmt = $pdo->prepare()

$date = $_POST["date"];
$hour = $_POST["hour"];

var_dump($date);
var_dump($hour);



 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>内容確認</h1>

  <div>日付:<?= $date?></div>
  <div>時間：<?= $hour?></div>
  <input type="submit" class= "submit_click" value = "送信">


</form>
  <form action="mail_artist.php" method="post">
    <input type="text" name="date_offer" class="date_offer" value="">
    <input type="text" name="hour_offer" class="hour_offer" value="">
    <input type="submit" class="mail_click" value="クリック" >
  </form>

<script type="text/javascript" src="./js/jquery-2.1.0.min.js"></script>
<script>

var date = <?= $date ?>;
var hour = <?= $hour ?>;
// alert(date);

$(".date_offer").val(date);
$(".hour_offer").val(hour);

$(".submit_click").on("click",function(){
    $(".mail_click").trigger("click");
});

</script>
</body>
</html>
