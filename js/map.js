function initialize(X_point, Y_point, target) {
	var zoomLevel = 16; // 지도의 확대 레벨 : 숫자가 클수록 확대정도가 큼

	var markerTitle = 'Medpacto';		//마우스 오버시 툴팁으로 보여짐
	var markerMaxWidth = 250;

	var contentString = '<h2 style="padding:5px 0 10px;">Medpacto</h2>'			//위치를 클릭하면 보여지는 상세 설명
			+ '<p style="margin-bottom:5px"> for life science researches in the promotion of human health and welfare.</p>';

	var myLatlng = new google.maps.LatLng(37.2915453,127.0408903);
	var mapOptions = {
		zoom : zoomLevel,
		center : myLatlng,
		gestureHandling: 'greedy',
		mapTypeId: 'roadmap'
	}
	var map = new google.maps.Map(document.getElementById('map'),
			mapOptions);

	var marker = new google.maps.Marker({
		position : myLatlng,
		map : map,
		title : markerTitle
	});

	var infowindow = new google.maps.InfoWindow({
		content : contentString,
		maxWidth : markerMaxWidth
	});

	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});
}
initialize();