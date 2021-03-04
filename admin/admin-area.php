<?php 
	//require_once 'templates/funciones/sesiones.php';
	require_once 'templates/header.php';
    require_once 'templates/navegacion.php';
    //require_once 'templates/funciones/sesiones.php';
	include 'locations.php';
?>
<section >
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>				
                <a href="vista-editar-admin.php?id=<?php echo $_SESSION['id']; ?>">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="../../index.php?cerrar_sesion=true" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>
</section>
<body>
<script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?language=es&key=AIzaSyDWxaXu97xJsfyuvnqBSxPoupNyZ-MqE64">
    </script>

    <div id="map"></div>
    <script>
        /**
         * Create new map
         */
        var infowindow;
        var map;
        var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
        var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
        var locations = <?php get_all_locations() ?>;
        var locationp = <?php get_location_paciente() ?>;
        var myOptions = {
            zoom: 14.7,
            center: new google.maps.LatLng(-1.67098,-78.64712),
            mapTypeControl: true,
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById('map'), myOptions);

        /**
         * Global marker object that holds all markers.
         * @type {Object.<string, google.maps.LatLng>}
         */
        var markers = {};

        /**
         * Concatenates given lat and lng with an underscore and returns it.
         * This id will be used as a key of marker to cache the marker in markers object.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {string} Concatenated marker id.
         */
        var getMarkerUniqueId= function(lat, lng) {
            return lat + '_' + lng;
        };

        /**
         * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
         * This function can be useful for getting new coordinates quickly.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {google.maps.LatLng} An instance of google.maps.LatLng object
         */
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };

        /**
         * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
         */

        /**
         * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */
        

        /**
         * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */

        /**
         * Removes given marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that will be removed.
         * @param {!string} markerId Id of marker.
         */

        /**
         * loop through (Mysql) dynamic locations to add markers to map.
         */
        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                icon :  purple_icon,
                html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Nombres:</a></td>\n" +
                "<td><disabled id='nombres'>"+locations[i][0]+"</td></tr>\n" +
                "<td><a>Apellidos:</a></td>\n" +
                "<td><disabled id='apellidos'>"+locations[i][1]+"</td></tr>\n" +
                "<td><a>Fecha de nacimiento:</a></td>\n" +
                "<td><disabled id='fecha_nacimiento' >"+locations[i][2]+"</td></tr>\n" +
                "<td><a>Sexo:</a></td>\n" +
                "<td><disabled id='sexo'>"+locations[i][3]+"</td></tr>\n" +
                "<td><a>Dirección:</a></td>\n" +
                "<td><disabled id='direccion'>"+locations[i][4]+"</td></tr>\n" +
                "<td><a>Latitud:</a></td>\n" +
                "<td><disabled id='lat'>"+locations[i][5]+"</td></tr>\n" +
                "<td><a>Longitud:</a></td>\n" +
                "<td><disabled id='lng'>"+locations[i][6]+"</td></tr>\n" +
                "<td><a>Cédula:</a></td>\n" +
                "<td><disabled id='cedula'>"+locations[i][7]+"</td></tr>\n" +
                "<td><a>Convencional:</a></td>\n" +
                "<td><disabled id='convencional'>"+locations[i][8]+"</td></tr>\n" +
                "<td><a>Celular:</a></td>\n" +
                "<td><disabled id='celular'>"+locations[i][9]+"</td></tr>\n" +
                "<td><a>Email:</a></td>\n" +
                "<td><disabled id='correo'>"+locations[i][10]+"</td></tr>\n" +
                "</table>\n" +
                "</div>"
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();         
					$("#nombres").val(locations[i][0]);
					$("#apellidos").val(locations[i][1]);
					$("#fecha_nacimiento").val(locations[i][2]);
					$("#sexo").val(locations[i][3]);
					$("#direccion").val(locations[i][4]);
					$("#lat").val(locations[i][5]);
					$("#lng").val(locations[i][6]);
					$("#cedula").val(locations[i][7]);
					$("#convencional").val(locations[i][8]);
					$("#celular").val(locations[i][9]);
					$("#correo").val(locations[i][10]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        var i ; var confirmed = 0;
        for (i = 0; i < locationp.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locationp[i][5], locationp[i][6]),
                map: map,
                icon :  red_icon,
                html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Nombres:</a></td>\n" +
                "<td><disabled id='nombres'>"+locationp[i][0]+"</td></tr>\n" +
                "<td><a>Apellidos:</a></td>\n" +
                "<td><disabled id='apellidos'>"+locationp[i][1]+"</td></tr>\n" +
                "<td><a>Fecha de nacimiento:</a></td>\n" +
                "<td><disabled id='fecha_nacimiento' >"+locationp[i][2]+"</td></tr>\n" +
                "<td><a>Sexo:</a></td>\n" +
                "<td><disabled id='sexo'>"+locationp[i][3]+"</td></tr>\n" +
                "<td><a>Dirección:</a></td>\n" +
                "<td><disabled id='direccion'>"+locationp[i][4]+"</td></tr>\n" +
                "<td><a>Latitud:</a></td>\n" +
                "<td><disabled id='lat'>"+locationp[i][5]+"</td></tr>\n" +
                "<td><a>Longitud:</a></td>\n" +
                "<td><disabled id='lng'>"+locationp[i][6]+"</td></tr>\n" +
                "<td><a>Cédula:</a></td>\n" +
                "<td><disabled id='cedula'>"+locationp[i][7]+"</td></tr>\n" +
                "<td><a>Convencional:</a></td>\n" +
                "<td><disabled id='convencional'>"+locationp[i][8]+"</td></tr>\n" +
                "<td><a>Celular:</a></td>\n" +
                "<td><disabled id='celular'>"+locationp[i][9]+"</td></tr>\n" +
                "<td><a>Email:</a></td>\n" +
                "<td><disabled id='correo'>"+locationp[i][10]+"</td></tr>\n" +
                "<td><a>Nombre contacto emergencia:</a></td>\n" +
                "<td><disabled id='nombre_contacto_emergencia'>"+locationp[i][11]+"</td></tr>\n" +
                "<td><a>Numero contacto emergencia:</a></td>\n" +
                "<td><disabled id='numero_contacto_emergencia'>"+locationp[i][12]+"</td></tr>\n" +
                "</table>\n" +
                "</div>"
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();         
					$("#nombres").val(locationp[i][0]);
					$("#apellidos").val(locationp[i][1]);
					$("#fecha_nacimiento").val(locationp[i][2]);
					$("#sexo").val(locationp[i][3]);
					$("#direccion").val(locationp[i][4]);
					$("#lat").val(locationp[i][5]);
					$("#lng").val(locationp[i][6]);
					$("#cedula").val(locationp[i][7]);
					$("#convencional").val(locationp[i][8]);
					$("#celular").val(locationp[i][9]);
					$("#correo").val(locationp[i][10]);
                    $("#nombre_contacto_emergencia").val(locationp[i][11]);
                    $("#numero_contacto_emergencia").val(locationp[i][12]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        /**
         * SAVE save marker from map.
         * @param lat  A latitude of marker.
         * @param lng A longitude of marker.
         */

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }
    </script>
<?php
	require_once 'templates/footer.php';
?>