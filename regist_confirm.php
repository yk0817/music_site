<?php
session_start();
include("header.php");

if (
isset($_POST["artist"]) || isset($_POST["email"]) || isset($_POST["hp"]) || isset($_POST["hp"]) || !isset($_FILES['upfile']['error'])
)
 {
   $artist = $_POST["artist"];
   $email = $_POST["email"];
   $hp = $_POST["hp"];
   $tmp_path = $_FILES["upfile"]["tmp_name"];
   $file_name = $_FILES["upfile"]["name"];
   echo "<div class='tmp_path'>".$tmp_path."</div>"."\n";
   echo "<div class='file_name'>".$file_name."</div>"."\n";
   $extension = pathinfo($file_name,PATHINFO_EXTENSION); //
  //  echo $extension;
   $uniq_name = "./upload/".date("YmdHis").session_id().".".$extension; //ユニークファイル名
   echo "<div class='uniq_name'>".$uniq_name."</div>";

  if (is_uploaded_file($tmp_path)) {
    if (move_uploaded_file($tmp_path,$uniq_name)) {
      echo $tmp_path;
      $img = '<img src="'.urldecode($uniq_name).'">';
      chmod($uniq_name,0644);
    } else {
      echo "error";
    }
  }

} else {
  // header('location: regist_artist.php');
  echo "エラー";
  exit();
}

 ?>


<form  class="regist_form" action="insert_artist.php" method="post">
  <input type="text"  name="regist_name" value="">
  <input type="text"  name="regist_email" value="">
  <input type="text"  name="regist_hp" value="">
  <input type="submit">
</form>

<h1>あなたの回答は以下のとおりでよろしいでしょうか？</h1>
  <li>アーティスト名：<?= $artist ?></li>
  <li>Email:<?= $email ?></li>
  <li>HP :<?= $hp ?></li>
  <li><a href=""></a><li>
<div class="regist_photo"><?= $img ?></div>


<button class="regist_btn">登録</button>

</div>


<?php

include("end.php");
 ?>

<script>
var artist = "<?= $artist ?>";
var email = "<?= $email ?>";
var hp = "<?= $hp ?>";


  $(".regist_artist").val(artist);
  $(".regist_email").val(email);
  $(".regist_hp").val(hp);


$('.regist_btn').on('click',function(){
   $(".regist_form").submit();
 });


</script>
