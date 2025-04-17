<?php
class MapaController {
    public function obtenerVeterinarias() {
        // Integrar con Google Maps API
        $apiKey = "AIzaSyDVMzEfIb8C-5YV-irRMupw4-mEtlocuCs";
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=9.9281,-84.0907&radius=50000&type=veterinary_care&key={$apiKey}";
        
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
?>