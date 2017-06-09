var siegeSocial;




function initMap() {

	// Une position par défaut (Châtelet à Orléans) voir http://www.coordonnees-gps.fr/communes
//var chateletOrleans = new google.maps.LatLng({lat: 47.89927580000001, lng: 1.9065545999999358});

	//création d'un objet siegeSocial
  siegeSocial = new google.maps.Map(document.getElementById('siegeSocial'), {
    center: {lat: 48.1466075, lng: 1.6197907},
    mapTypeId: google.maps.MapTypeId.SATELLITE,
    zoom: 4
  });


  
  // ROADMAP peut être remplacé par SATELLITE, HYBRID ou TERRAIN
	// Zoom : 0 = terre entière, 19 = au niveau de la rue
  
}
