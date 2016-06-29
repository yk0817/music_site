// どこでも使えるようにしておく
var map;

function initialize(){
    // 渋谷
    map = new google.maps.Map(document.getElementById('map'),{
      zoom: 14,
      center: {lat:35.661777,lng:139.704051}
    });


    var marker = new google.maps.Marker({
      title:'渋谷クアトロ',
      position: {lat:35.661,lng:139.698},
      map:map
    });
    var marker2 = new google.maps.Marker({
      title:'<a href=\'\'>渋谷WWW</a>',
      position: {lat:35.6615,lng:139.699},
      map:map
    });


    var infowindow = new google.maps.InfoWindow({
      content:"<a href=\"\">渋谷クアトロ</a>"
  })

    marker.addListener('click',function(){
      console.log(infowindow);
      // なぜかインフォウィンドウがかわらない
      infowindow.content = this.title;
      console.log(infowindow);
      infowindow.open(map,marker);
    });

    createMarkerButton(marker);
    function createMarkerButton(marker) {
      //サイドバーにマーカ一覧を作る
      var ul = document.getElementById("marker_list");
      var li = document.createElement("li");
      var title = marker.getTitle();
      // console.log(title);
      li.innerHTML = title;

      ul.appendChild(li);

      //サイドバーがクリックされたら、マーカーを擬似クリック
      google.maps.event.addDomListener(li, "click", function(){
        google.maps.event.trigger(marker, "click");
      });
    }
}

// マップ作成
function making_map(data){
  var DISTRICT_LAT = Number(data[0].DISTRICT_LAT);
  var DISTRICT_LNG = Number(data[0].DISTRICT_LNG);

  map = new google.maps.Map(document.getElementById('map'),{
    zoom: 14,
    center: {lat:DISTRICT_LAT,lng:DISTRICT_LNG}
  });

}

// マーカー、情報ウィンドウ作成
function making_marker(data){
  // console.log(data);
  var maker_data = [];

  // マーカー作成
    for (var i = 0; i < data.length; i++) {
      maker_data.push(data[i]);
      var marker = new google.maps.Marker({
        position: {lat:Number(data[i].LAT),lng:Number(data[i].LNG)},
        map:map
      })
    }

  var infowindow = new google.maps.InfoWindow({
    content:"<a href=\"\">渋谷クアトロ</a>"
})

    marker.addListener('click',function(){
      console.log(infowindow);
      // なぜかインフォウィンドウがかわらない
      infowindow.content = this.title;
      console.log(infowindow);
      infowindow.open(map,marker);
    });

    createMarkerButton(marker);
    function createMarkerButton(marker) {
      //サイドバーにマーカ一覧を作る
      var ul = document.getElementById("marker_list");
      var li = document.createElement("li");
      var title = marker.getTitle();
      // console.log(title);
      li.innerHTML = title;

      ul.appendChild(li);

      //サイドバーがクリックされたら、マーカーを擬似クリック
      google.maps.event.addDomListener(li, "click", function(){
        google.maps.event.trigger(marker, "click");
      });
    }
}


$(".district").click(function(){
  // console.log(this);
  // console.log($(".shibuya").data('area'));

  var district = $(this).data('district');

  $.ajax({
    type: 'POST',
    url: './lib/fetch_place.php',
    dataType:'json',
    data: {
      'district': district
    },
    success: function(data){
      making_map(data);
      making_marker(data);


    },
    error: function(){
      alert("失敗");
    }
  })

});
