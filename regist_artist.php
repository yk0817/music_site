<?php
include("header.php");


 ?>
 <link rel="stylesheet" href="./css/style1.css">


<form class="artist_regist" action="regist_confirm.php" method="post" enctype="multipart/form-data" >
  <fieldset>
    <legend>アーティスト登録</legend>
      <p><label>アーティスト名:<input type = "text" name = "artist"></input></label></p>
    <p>
      <label name="genre">ジャンル:
        <select>
          <option>EDM</option>
          <option>ALL-MIX</option>
          <option>HOUSE</option>
          <option>ブレイクコア</option>
          <option>HIP-HOP</option>
          <option>レゲエ</option>
          <option>POPS</option>
          <option>アニソン</option>
        </select>
      </label>
    </p>

      <p><label>mail: <input name ="email" type="text" placeholder="mail-address"></label></p>
      <p>
        <label>HP: <input name ="hp" type="text" placeholder=""></label>
      </p>
      <p>
        <input type="file" accept="image/*" class="image_file" capture="camera" name="upfile">
      </p>
      <p><a href="#" class="upload_btn">Fileアップロード</a></p>
      <label><textarea name="comment" rows="3" cols="20"></textarea></label>

    <input type="submit">

  </fieldset>
</form>


<script>




</script>


 <?php
 include("end.php");
  ?>
