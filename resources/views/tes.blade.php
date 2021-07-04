<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link rel="stylesheet" href="{{asset('asset/css/maps.css')}}">
    <style>
        #mapid {
            min-height: 1180px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="mapid"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-primary" id="feature-title"></h4>
            </div>
            <div class="modal-body" id="feature-info"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- <script src="http://dukuhwaru.tegalkab.go.id/assets/Frontend/page/geoJs.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- <script data-require="bootstrap" data-semver="3.3.6" src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="{{ asset('/asset/tegal_barat.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('/assets/jquery/jquery.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('/asset/tegal_kota.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('/asset/tes.js') }}"></script>

<!-- <script src="https://gist.github.com/ecangsandy/01989522e1d6ac0c2bc211d40af95a1e.js"></script> -->
<!-- <script src="https://gist.github.com/ecangsandy/e174b6308b3a6b8646fdacaf6a493c46.js"></script> -->

<script>
    // $(document).ready(function() {
    $(function() {
        addLegend();
    });

    // var statesData = 'https://raw.githubusercontent.com/gist/ecangsandy/01989522e1d6ac0c2bc211d40af95a1e/raw/59900f5bd629f7224f4394b4295b3ce79ec3a4c3/map.geojson';

    // console.log('stat' + statesData);


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

    function onMapClick(e) {
        // alert("You clicked the map at " + e.latlng);
        console.log(e);
    }

    // mymap.on('click', onMapClick);

    function onEachFeature(feature, layer) {
        $("#feature-title").html('myMarkerTitle');
        $("#feature-info").html('myMarkerContent');
        layer.on('click', function(e) {
            // $('#featureModal').modal('show');
            console.log(e);
            // or whatever that opens the right modal window
        });
        // $("#featureModal").modal("show");
        var popupContent = "<p>I started out as a GeoJSON " +
            feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

        if (feature.properties && feature.properties.popupContent) {
            popupContent += feature.properties.popupContent;
        }
        var link = $('#test').click(function() {
            // alert("test");
        });

        layer.bindPopup(popupContent);
    }

    function addLegend() {
        var legend = L.control({
            position: 'bottomright'
        });
        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend');
            div.innerHTML =
                '<i class="bg-red"></i> 0 - 1.8<br>' +
                '<i class="bg-yellow"></i> 1.81 - 3<br>' +
                '<i class="bg-green"></i> Tidak ada Kasus';

            return div;
        };
        legend.addTo(mymap);
    }

    L.geoJSON(statesData, {
        onEachFeature: onEachFeature
    }).addTo(mymap);
    mymap.on('popupopen', function() {

        $('#test').click(function() {
            // alert("test");
        });
        // $("img[rel]").overlay();
        // alert('e')
        // show();
    });

    function show() {

        $('#featureModal').modal('show');
    }
    // });
</script>

</html>