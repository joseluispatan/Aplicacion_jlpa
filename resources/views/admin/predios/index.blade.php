<x-admin-layout>
    <style>
        #map {
        width: 100%;
        height: 800px; }
        </style>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  
  <link rel="stylesheet" href="{{ asset('css/L.Control.MousePosition.css') }}" />
<script src="{{ asset('js/L.Control.MousePosition.js') }}" type="text/javascript"></script>

<link rel="stylesheet" href="{{ asset('css/L.Control.BetterScale.css') }}" />
<script src="{{ asset('js/L.Control.BetterScale.js') }}"></script>
<!-- Para Buscar -->
<link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}" />
<script src="{{ asset('js/leaflet-search.js') }}"></script>
   <!-- Para habilitar mapas base de googlemaps -->
   <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>

<div id="map"></div>
    <script>
//llamamos al archivo predios.php
   
   var predios = @include('admin.predios.prediosos')
 
    var map = L.map('map').setView([-15.8378,-67.5439], 18); 
    var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {minZoom: 2, maxZoom: 21}).addTo(map);
    var satMutant = L.gridLayer.googleMutant({maxZoom: 21,minZoom: 6,type: "satellite",});
    var hybridMutant = L.gridLayer.googleMutant({maxZoom: 21,minZoom: 6,type: "hybrid",});

// Estilo a la capa
var predioStyle = {
 'color': "#07b5fb",
 'weight': 2,
 'opacity': 0.6
};
//Dibujamos los marcadores geoJson
       var geoJsonLayer = L.geoJSON(predios,{
            style: predioStyle,
            onEachFeature: function(feature, layer) {layer.bindPopup (
                "<h3>Código Catastral: "+feature.properties.codigo+"</h3>       <li>Nombre:" 
                +feature.properties.propietari+"</li>                           <li>Número: " 
                +feature.properties.numero+"</li>" 
                + "<button onclick='redirectToEdit(" + feature.properties.id + ")' style='display: block; margin: 0 auto; color: white; background-color: #3498db; padding: 5px 20px; border: none; border-radius: 5px; cursor: pointer;'>Editar</button>"
            );
            }}).addTo(map);
            function redirectToEdit(id) {
            window.location.href = '/admin/predios/edit/' + id;
            }
    // Insertando un control de busqueda
    var searchControl = new L.Control.Search({
        layer: geoJsonLayer,
        propertyName: 'codigo',
        marker: false,
        textCancel: 'Cancelar',
        textErr: 'Objeto no encontrado',
        textPlaceholder: 'Buscar',
        moveToLocation: function(latlng, title, map) {
            //map.fitBounds( latlng.layer.getBounds() );
            var zoom = map.getBoundsZoom(latlng.layer.getBounds());
              map.setView(latlng, zoom); // access the zoom
        }
    });
    searchControl.on('search:locationfound', function(e) {
        e.layer.setStyle({fillColor: '#3f0', color: '#0f0'});
        if(e.layer._popup)
            e.layer.openPopup();
    }).on('search:collapsed', function(e) {
        featuresLayer.eachLayer(function(layer) {	//restore feature color
            featuresLayer.resetStyle(layer);
        });	
    });map.addControl( searchControl );
    
    L.control.mousePosition().addTo(map);
    L.control.betterscale().addTo(map);
   //Control de mapas base
    L.control
        .layers(
            {
                Callejero: osm,
                Satelital: satMutant,
                Híbrido: hybridMutant,
            },
        ).addTo(map);     
    </script>
  </div>
</div>
</x-admin-layout>