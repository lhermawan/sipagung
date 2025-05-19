<script>
   mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FsaWhwZXJtYW5hYWEiLCJhIjoiY2trNmRuNm1qMDJ6aTJ3cXdqM2Q0bWNiZiJ9.loFK78Mv4zpmuD_VS3qLew';
                    var map = {!! json_encode($map) !!}
                    console.log(map);
                    var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/galihpermanaaa/ckkxqojdl1x0p17oanehdheiu',

                    center: <?php echo $map[0]->longlag;?>,
                    zoom: 12
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


