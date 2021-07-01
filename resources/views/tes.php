<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <style>
        #mapid {
            min-height: 1180px;
        }
    </style>
</head>

<body>
    ini tes
    <div id="mapid" class="container"></div>
</body>
<!-- <script src="http://dukuhwaru.tegalkab.go.id/assets/Frontend/page/geoJs.js"></script> -->
<script>
    var statesData = {
        "type": "FeatureCollection",
        "features": [{
            "type": "Feature",
            "properties": {},
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [
                            109.10083,
                            -6.83861
                        ],
                        [
                            109.121948,
                            -6.8475
                        ],
                        [
                            109.12722,
                            -6.84861
                        ],
                        [
                            109.152238,
                            -6.8475
                        ],
                        [
                            109.146392,
                            -6.878238999999894
                        ],
                        [
                            109.142807,
                            -6.88096
                        ],
                        [
                            109.145049,
                            -6.88552
                        ],
                        [
                            109.14379800000012,
                            -6.894178999999895
                        ],
                        [
                            109.132348,
                            -6.89324
                        ],
                        [
                            109.128165,
                            -6.899648999999897
                        ],
                        [
                            109.11477600000012,
                            -6.905349
                        ],
                        [
                            109.108002,
                            -6.90011
                        ],
                        [
                            109.098967,
                            -6.899108999999896
                        ],
                        [
                            109.08649,
                            -6.90081
                        ],
                        [
                            109.065742,
                            -6.90162
                        ],
                        [
                            109.06454,
                            -6.895141
                        ],
                        [
                            109.0710820000001,
                            -6.88908
                        ],
                        [
                            109.081771,
                            -6.86824
                        ],
                        [
                            109.08496,
                            -6.85966
                        ],
                        [
                            109.096786,
                            -6.86435
                        ],
                        [
                            109.099938,
                            -6.85991
                        ],
                        [
                            109.10083,
                            -6.83861
                        ]
                    ]
                ]
            }
        }]
    }
    var mymap = L.map('mapid').setView([-6.8686, 109.1129], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    L.geoJson(statesData).addTo(mymap);
</script>

</html>