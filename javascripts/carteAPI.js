var siegeSocial;




function initMap() {

	// Une position par défaut (Châtelet à Orléans) voir http://www.coordonnees-gps.fr/communes
  var neuville = new google.maps.LatLng({lat: 48.0686283, lng: 2.0533742000000075});

	//création d'un objet siegeSocial
  siegeSocial = new google.maps.Map(document.getElementById('siegeSocial'), {
    center: neuville,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    zoom: 16
  });


  
  // ROADMAP peut être remplacé par SATELLITE, HYBRID ou TERRAIN
	// Zoom : 0 = terre entière, 19 = au niveau de la rue
  
}
