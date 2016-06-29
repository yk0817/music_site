<?php
include("header_place.php");

 ?>
<link rel="stylesheet" href="./css/style1.css">
<nav  class="genre-nav">
  <ul class = "clearfix place-nav">
    <li class="tokyo"><a href="">東京</a>
      <ul class="second-level">
        <li class = "district">新宿区</li>
        <!-- <li><a class="shibuya" onclick="alert("a");" href="">渋谷区</a></li> -->
        <li class = "district" class="SHIBUYA" data-district = "shibuya">渋谷区</li>
        <li class = "district">台東区</li>
        <li class = "district"><a class="suginami" href="">杉並区</a></li>
        <li class = "district">中野区</li>
      </ul>
    </li>
    <li class="kanagawa"><a href="">神奈川</a>
      <ul class="second-level">
        <li class = "district">川崎市</li>
        <!-- <li id = "district" class="SHIBUYA" data-district = "shibuya">渋谷区</li> -->
        <li class = "district" class="YOKOHAMA" data-district = "yokohama">横浜市</li>
        <li class = "district">藤沢市</li>
      </ul>
    </li>
    <li class="chiba"><a href="">千葉</a>
      <ul class="second-level">
        <li class = "district"><a href="">千葉市</a></li>
      </ul>
    </li>
    <li class="map" >MAP</li>
  </ul>
</nav>

<main>
  <div class="map_wrapper clearfix">
    <h2>地図</h2>
    <div id="map"></div>
    <ul id="marker_list"></ul>
  </div>
</main>
<script type="text/javascript" src="./js/place.js"></script>

<!-- <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9SBAQijPba2gU6AUhFJMhXLuhtbdVoO0&callback=initialize"> -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9SBAQijPba2gU6AUhFJMhXLuhtbdVoO0&sensor=true">
</script>


 <?php

include("end.php");
  ?>
