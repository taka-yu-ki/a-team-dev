function initMap() {
    const map = document.getElementById("map");
    
    // eventsテーブルの住所から緯度経度を、idからurlをdataに保存する。例として東京タワーを示す。
    const data = new Array();
    data.push({
        title: "東京タワーハロウィンイベント2023",
        lat: 35.6585769,
        lng: 139.7454506,
        url: 'https://6f16343ef8844343be115a87fee53860.vfs.cloud9.ap-southeast-2.amazonaws.com/',
        category: 'event'
    })

    // マップの設定
    const opt = {
        zoom: 13,
        center: { lat: 35.6585769, lng: 139.7454506 },
        mapTypeId: 'roadmap',
        mapTypeControl: false,
        styles: [{
        featureType: 'all',
        elementType: 'all',
        stylers: [{
            hue: '#00ff00'
        }, {
            saturation: -50
        }, {
            lightness: 0
        }, {
            gamma: 1
        }],

    }, {
        featureType: 'water',
        elementType: 'all',
        stylers: [{
            color: '#666666'
        }],

    }]
    };
    
    // マップのインスタンス作成
    const mapObj = new google.maps.Map(map, opt);
    
    for (let i = 0; i < data.length; i++) {
        // 緯度軽度の取得
        let latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
        
        // categoryごとにiconを分ける
        let iconUrl = '';
        if (data[i].category === 'event') {
            iconUrl = 'https://maps.google.com/mapfiles/ms/micons/orange.png'
        } else if (data[i].category === 'food') {
            iconUrl = 'https://maps.google.com/mapfiles/ms/micons/red.png'
        } else if (data[i].category === 'goods') {
            iconUrl = 'https://maps.google.com/mapfiles/ms/micons/green.png'
        }
        
        // ピンの設定
        let marker = new google.maps.Marker({
            position: latlng,
            map: mapObj,
            icon: {
                url: iconUrl,
            },
        });
    
        // 情報ウィンドウ作成
        let infoWindow = new google.maps.InfoWindow({
            content: data[i].title
        });

        // 情報ウィンドウ表示
        marker.addListener('mouseover', () => {
            infoWindow.open(mapObj, marker);
        });
    
        // 情報ウィンドウ削除
        marker.addListener('mouseout', () => {
            infoWindow.close();
        });
    
        // リンク先を指定する
        google.maps.event.addListener(marker, 'click', function() {
            window.location.href = data[i].url;
        });
    }
}