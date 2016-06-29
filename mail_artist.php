<?php
$mail_date = $_POST['date_offer'];
$hour_date = $_POST['hour_offer'];

// var_dump($mail_date);
// var_dump($hour_date);

if (mail("em072029@gmail.com", "TEST MAILです。"
,  "日程" . $mail_date . "開始時間\n" . $hour_date . "STARTです。",  "From: em072029@gmail.com")) {
  echo "メールが送信されました。";
} else {
  echo "メールの送信に失敗しました。";
}

 ?>
