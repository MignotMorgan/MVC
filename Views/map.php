<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script>
    
   // On vérifie si le navigateur supporte la géolocalisation
   if(navigator.geolocation) {
    
    function hasPosition(position) {
    // Instanciation
     var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
     
     // Ajustage des paramètres
     myOptions = {
      zoom: 15,
      center: point,
      mapTypeId: google.maps.MapTypeId.ROADMAP
     },
     
     // Envoi de la carte dans la div
     mapDiv = document.getElementById("mapDiv"),
     map = new google.maps.Map(mapDiv, myOptions),
     
     marker = new google.maps.Marker({
      position: point,
      map: map,
      // Texte du point
      title: "Vous êtes ici"
      });
    }
    navigator.geolocation.getCurrentPosition(hasPosition);
   }
  </script>
  <style>
   #mapDiv {
    /* Modifier la taille de la carte avec width et height */
    width:700px;
    height:500px;
    border:1px solid #efefef;
    margin:auto;
    -moz-box-shadow:5px 5px 10px #000;
    -webkit-box-shadow:5px 5px 10px #000;
   }
  </style>

    <!-- La carte sera chargée ici -->
    <div id="mapDiv"></div>