<?php
include("header.php");



 ?>
<link rel="stylesheet" href="./css/style1.css">
<nav  class="genre-nav">
  <ul class = "clearfix place-nav">
    <li class="tokyo"><a href="">東京</a>
      <ul class="second-level">
        <li><a class="shinjuku" href="">新宿区</a></li>
        <li><a class="shibuya" href="">渋谷区</a></li>
        <li><a class="taito" href="">台東区</a></li>
        <li><a class="suginami" href="">杉並区</a></li>
        <li><a class="nakano" href="">中野区</a></li>
      </ul>
    </li>
    <li class="kanagawa"><a href="">神奈川</a>
      <ul class="second-level">
        <li><a href="">川崎市</a></li>
        <li><a href="">横浜市</a></li>
        <li><a href="">藤沢市</a></li>
      </ul>
    </li>
    <li class="chiba"><a href="">千葉</a>
      <ul class="second-level">
        <li><a href="">千葉市</a></li>
      </ul>
    </li>
    <li class="map" >MAP</li>
  </ul>
</nav>

<main>
  <div id="map_canvas" style="width:500px; height:300px;background-color:white;"></div>
  <!-- <div class = "genre_wrapper">
    <div class = "genre_index clearfix" id="all_mix">
      <ul class="clearfix">
        <li>
          <a href="#"><img src="./img/1.jpg" alt=""></a>
          <h3></h3>
          <p>
            <br>料金：10000円/hr
            <br>HP:
            <br>オファー
          </p>
        </li>
        <li>
          <a href="#"><img src="./img/1.jpg" alt=""></a>
          <h3>やけのはら</h3>
          <p>ジャンル：ALL-MIX
            <br>料金：10000円/hr
            <br>HP:
            <br>オファー
          </p>
        </li>
      </ul>
    </div>
  </div> -->
</main>
<script type="text/javascript">

var map;

function initMap() {
var map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 7
  });
}
//
// var marker1 = new google.maps.Marker();
//
// var latlng = new google.maps.LatLng(35.539001,134.228468);
// var marker2 = new google.maps.Marker({
//   position: latlng
// });

// function initialize() {
//   var
// }



</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9SBAQijPba2gU6AUhFJMhXLuhtbdVoO0&callback=initialize">
</script>


 <?php

include("end.php");
  ?>
