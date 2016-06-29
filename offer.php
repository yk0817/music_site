<?php
include("header.php");
$artist = $_GET['artist'];
// var_dump($artist_name);
var_dump("a");
 ?>

<form class="offer_action" action="offer_artist.php" method="post">
  <div class="">予約画面</div>
  <br>
  <div class="">アーティスト名：<?=$artist ?></div>
  <div class="">日程</div>
  <input type="text" name="date" class = "input_date" id="datepicker">
  <br>
  <select name = "hour">
    <option value = "14">14時</option>
    <option value = "15">15時</option>
    <option value = "16">16時</option>
    <option value = "17">17時</option>
    <option value = "18">18時</option>
    <option value = "19">19時</option>
    <option value = "20">20時</option>
    <option value = "21">21時</option>
    <option value = "22">22時</option>
    <option value = "23">23時</option>
  </select>
  <br>
  <textarea name="name" rows="8" cols="40" placeholder="備考">

  </textarea>
  <input type="submit" name="name" value="予約">
</form>

<script>
  $(function() {
     $("#datepicker").datepicker();
   });
</script>

<?php


include("end.php");

 ?>
