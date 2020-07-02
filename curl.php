<?php

// Define a constant for the API endpoint
define("RANK_API_ENDPOINT", "https://api.sportsdata.io/v3/nba/scores/json/Standings/2020?key=f7ef4fe182c047afb1d1458538da21f4");
// Initialize curl
$curl = curl_init();
// Set some curl options
curl_setopt($curl, CURLOPT_URL, RANK_API_ENDPOINT);
// Verifies the authenticity of the peer's SSL certificate
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// Returns the data instead of printing it to the page
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Execute curl, aka make a HTTP request
$response = curl_exec($curl);
// close curl
curl_close($curl);

echo $response;