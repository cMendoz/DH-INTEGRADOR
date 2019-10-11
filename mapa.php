<?php

    $lon = -67;
    $lat = -55;

?>

<div style="width: 100%; height: 100vh; overflow:hidden; position: fixed;">
    <div id='map' style='width: 100vw; height: 105vh;'></div>
</div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoianVsYWJyZWdvIiwiYSI6ImNrMTVtZDM0ejB3aGwzY256cmtia2txbG0ifQ.RozygX8rIQZaI2IlJxBuZA';
    var map = new mapboxgl.Map({
      container: 'map',
      style: $style,
      center: [10,20],
      zoom: 1.3
    });

    map.on('load', function() {
      map.loadImage('img/spot.png', function(error, image) {
        if (error) throw error;
        map.addImage('spot', image);
        map.addLayer({
          "id": "points",
          "type": "symbol",
          "source": {
            "type": "geojson",
            "data": {
              "type": "FeatureCollection",
              "features": [{
                "type": "Feature",
                "geometry": {
                  "type": "Point",
                  "coordinates": [-59.123461682135144,-35.1869058190277]
                }
              }]
            }
          },
          "layout": {
            "icon-image": "spot",
            "icon-size": 0.1
          }
        });
      });

      map.on('mousemove', function (e) {
      document.getElementById('infoMapa').innerHTML =

      JSON.stringify(e.point) + '<br />' +

      JSON.stringify(e.lngLat.wrap());
      });

    setTimeout(function(){

      var target = [<?= $lon.','.$lat;?>];

      map.flyTo({

      center: target,
      zoom: 7,
      bearing: 0,

      speed: 2,
      curve: 1,

      easing: function (t) { return t; }
      });
    }, 000);

    });
</script>
