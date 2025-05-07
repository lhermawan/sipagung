 
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo: Make a choropleth map</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
<link
href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css"
rel="stylesheet"
/>

<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 200px;
			height: 100px;
		}
	</style>

	<style>#map { width: 100%; height: 500px; }
.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }</style>

<style>

h2,
h3 {
margin: 10px;
font-size: 18px;
}
h3 {
font-size: 16px;
}
p {
margin: 10px;
}
.map-overlay {
position: absolute;
bottom: 0;
right: 0;
background: #fff;
margin-right: 20px;
font-family: Arial, sans-serif;
overflow: auto;
border-radius: 3px;
}

#features {
top: 0;
height: 100px;
margin-top: 20px;
width: 250px;
}
#legend {
padding: 10px;
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
line-height: 18px;
height: 150px;
margin-bottom: 40px;
width: 100px;
}
.legend-key {
display: inline-block;
border-radius: 20%;
width: 10px;
height: 10px;
margin-right: 5px;
}
</style>
</head>
<body>


 
<script>
   mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FsaWhwZXJtYW5hYWEiLCJhIjoiY2trNmRuNm1qMDJ6aTJ3cXdqM2Q0bWNiZiJ9.loFK78Mv4zpmuD_VS3qLew';
                    var map = {!! json_encode($map) !!}
                    console.log(map);
                    var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/galihpermanaaa/ckkxqojdl1x0p17oanehdheiu',
					
                    center: <?php echo $map[0]->longlag;?>,   
                    zoom: 12.15
                    });
                    //mapsebaran kasus
                    map.on('load', function () {
                    // Add a source for the state polygons.
                    map.addSource('states2', {
                    'type': 'geojson',
                    'data':{
                        'type': 'FeatureCollection',
                            'features': [
                            <?php
                            foreach ($map as $item ){?>
                            {
                                "type": "Feature",
                                "properties": {
                                    "Name": "<?php echo $item->desa; ?>",
                                    "color": "rgb(216,191,216)",
                                },
                                "geometry": {
                                    "coordinates": [
                                    [
                                    <?php echo $map[0]->geometry;?>
                                    ]
                                    ],
                                    "type": "MultiPolygon"
                                }
                            },
                        <?php
                    
                    } ?>
                    ]
                    }
                    // 'https://d2ad6b4ur7yvpq.cloudfront.net/naturalearth-3.3.0/ne_110m_admin_1_states_provinces_shp.geojson'
                    });
                    // Add a layer showing the state polygons.
                    map.addLayer({
                    'id': 'states-layer2',
                    'type': 'fill',
                    'source': 'states2',
                    'paint': {
                        'fill-color': ['get', 'color'],
                        'fill-opacity': 0.8,
                        'fill-outline-color': 'rgba(200, 100, 240, 1)'
                    }
                    });
                    // When a click event occurs on a feature in the states layer, open a popup at the
                    // location of the click, with description HTML from its properties.
                    map.on('click', 'states-layer2', function (e) {
                    new mapboxgl.Popup()
                    .setLngLat(e.lngLat)
                    .setHTML(e.features[0].properties.Name)
                    .addTo(map);
                    });
                    // Change the cursor to a pointer when the mouse is over the states layer.
                    map.on('mouseenter', 'states-layer2', function () {
                    map.getCanvas().style.cursor = 'pointer';
                    });
                    // Change it back to a pointer when it leaves.
                    map.on('mouseleave', 'states-layer2', function () {
                    map.getCanvas().style.cursor = '';
                    });
                    });
</script>
</body>
</html>
 
 