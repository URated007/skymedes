<?php
// process-api.php

// Function to format the date as Y-m-d
function format_date($date) {
    $dateTime = new DateTime($date);
    return $dateTime->format('Y-m-d');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract form data
    $countriesVisited = $data['countriesVisited'];
    $citizenship = $data['citizenship'];
    $coverageStart = $data['coverageStart'];
    $coverageEnd = $data['coverageEnd'];

    // Prepare data for API request
    $postData = array(
        'Credentials' => array(
            'username' => 'smte',
            'password' => 'P0wPSy9WbrPrnaGyhwrygHIWkBp4wTtxg5'
        ),
        'PriceMembership' => array(
            'coverageStart' => format_date($coverageStart),
            'coverageEnd' => format_date($coverageEnd),
            'countriesVisited' => $countriesVisited,
            'citizenship' => $citizenship
        )
    );
    
    
    // API URL
    $url = 'https://portal.optimumhq.com/custom/sm/api/skymedApplication.jsp';

    // Setup cURL options
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array('Content-Type: application/json')
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
    // Return API response
    echo $response;
    
}
?>
