<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <style>
        #map { 
            height: 600px; 
            width: 1300px;
        }
    </style>

<?php if (isset($lokasi)) : ?>
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="col">
                <h2 class="page-title">
                <?= $lokasi->alamat_tujuan ?>
                </h2>
            </div>
            </div>
        </div>
    </div>
    
    <div class="page-body">
        <div class="col-md-10 col-lg-8" style="margin-left:185px;padding:10px;">
            <div class="col">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    
        
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        
        L.Routing.control({
            waypoints: [
                L.latLng(-3.689333157670575, 114.72455453798136),
                L.latLng(<?= $lokasi->latlong ?>)
            ]
        }).addTo(map);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
    <?php endif; ?>
