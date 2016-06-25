<script type='text/javascript'>

      var stationList = [
        {"latlng":[35.681382,139.766084],name:"東京駅", nozomi : 1, hikari : 1, kodama : 1},
        {"latlng":[35.630152,139.74044],name:"品川駅", nozomi : 1, hikari : 1, kodama : 1},
        {"latlng":[35.507456,139.617585],name:"新横浜駅", nozomi : 1, hikari : 1, kodama : 1},
        {"latlng":[35.25642,139.154904],name:"小田原駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[35.103217,139.07776],name:"熱海駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[35.127152,138.910627],name:"三島駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[35.142015,138.663382],name:"新富士駅", nozomi : 0, hikari : 0, kodama : 1},
        {"latlng":[34.97171,138.38884],name:"静岡駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[34.769758,138.014928],name:"掛川駅", nozomi : 0, hikari : 0, kodama : 1},
        {"latlng":[34.703741,137.734442],name:"浜松駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[34.762811,137.381651],name:"豊橋駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[34.96897,137.060662],name:"三河安城駅", nozomi : 0, hikari : 0, kodama : 1},
        {"latlng":[35.170694,136.881637],name:"名古屋駅", nozomi : 1, hikari : 1, kodama : 1},
        {"latlng":[35.315705,136.685593],name:"岐阜羽島駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[35.314188,136.290488],name:"米原駅", nozomi : 0, hikari : 1, kodama : 1},
        {"latlng":[34.985458,135.757755],name:"京都駅", nozomi : 1, hikari : 1, kodama : 1},
        {"latlng":[34.73348,135.500109],name:"新大阪駅", nozomi : 1, hikari : 1, kodama : 1}
      ];

      //情報ウィンドウを1つだけ開くようにする
      var infoWnd = new google.maps.InfoWindow();

      //マーカーとラジオボタンの制御をするためのコントローラー
      var markerController = new google.maps.MVCObject();

      //初期化
      function initialize() {
        //地図を表示
        var mapDiv = document.getElementById("map_canvas");
        mapCanvas = new google.maps.Map(mapDiv);
        mapCanvas.setMapTypeId(google.maps.MapTypeId.ROADMAP);

        //ラジオボタンが選択されたら、selectChangedを呼び出す
        var i, choise = [
          document.getElementById("nozomi"),
          document.getElementById("hikari"),
          document.getElementById("kodama")
        ];
        for (i = 0; i < choise.length; i++) {
          google.maps.event.addDomListener(choise[i], "click", selectChanged);
        }


        //地図上にマーカーを配置していく
        var bounds = new google.maps.LatLngBounds();
        var station, latlng;

        for ( i = 0; i < stationList.length; i++) {
          station = stationList[i];
          latlng = new google.maps.LatLng(station.latlng[0], station.latlng[1]);
          bounds.extend(latlng);
          var marker = createMarker({
            map : mapCanvas,
            position : latlng,
            others : station
          });

          //サイドバーのボタンを作成
          createMarkerButton(marker);
        }
        //マーカーが全て収まるように地図の中心とズームを調整して表示
        mapCanvas.fitBounds(bounds);


        //初期値セット
        markerController.set("select", "kodama");
        google.maps.event.trigger(choise[2], "click");
      }

      //ラジオボタンが選択されたら呼び出される。
      //markerControllerの値を更新すると、各マーカーに select_changedイベントが発生する
      function selectChanged() {
        var selectedVal = this.value;
        markerController.set("select", selectedVal);

        //選択されたラジオボタンに対応する<ul>を表示する
        var i, ul, listNames = ["nozomi", "hikari", "kodama"];
        for (i = 0; i < listNames.length; i++) {
          ul = document.getElementById(listNames[i] + "_list");
          if (listNames[i] === selectedVal) {
            ul.style.display = "block";
          } else {
            ul.style.display = "none";
          }
        }
      }

      //マーカーを作成する
      function createMarker(params) {
        var marker = new google.maps.Marker(params);

        //マーカーがクリックされたら、情報ウィンドウを表示
        google.maps.event.addListener(marker, "click", function() {
          infoWnd.setContent("<strong>" + params.others.name + "</strong>");
          infoWnd.open(params.map, marker);
        });

        // marker.select = markerController.select として連動させる。
        // markerController.select が変化すると、marker.select も変化して
        // select_changedイベントが発生する
        marker.bindTo("select", markerController, "select");
        google.maps.event.addListener(marker, "select_changed", changeMarkerVisibility);
        return marker;
      }

      //markerControllerのselectプロパティが変化したら、
      //params.others.[nozomi/hikari/kodama]の値を調べて、
      //マーカーの表示／非表示を変更する
      function changeMarkerVisibility() {
        //this は markerを指す
        var marker = this;
        var others = marker.get("others");

        //ラジオボタンの選択された値(nozomi / hikari / kodama)
        var selectedVal = marker.get("select");

        //マーカーを作るときに渡したothersプロパティの nozomi/hikari/kodamaプロパティを見て
        // 1ならtrue、0ならfalse
        marker.setVisible( others[selectedVal] ? true : false );
      }

      //サイドバーにマーカ一覧を作る
      function createMarkerButton(marker) {
        var others = marker.get("others"),
            i, name, ul, li,
            listNames = ["nozomi", "hikari", "kodama"];


        // 各<ul>に プロパティ=1 (例: nozomi = 1)のときだけ作成する
        for (i = 0; i < listNames.length; i++) {
          name = listNames[i];
          if (others[ name ]) {
            ul = document.getElementById( name + "_list" );
            li = document.createElement("li");
            li.innerHTML = others.name;
            ul.appendChild(li);

            //サイドバーがクリックされたら、マーカーを擬似クリック
            google.maps.event.addDomListener(li, "click", function() {
              google.maps.event.trigger(marker, "click");
            });
          }
        }

      }

      google.maps.event.addDomListener(window, "load", initialize);
  </script>
