<?php
    header('Content-Type: application/json'); // Specify the type of data
    $date = $_GET['date'];
    $url = 'https://api.dimigo.in/meal/date/'.$date;
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    echo $resp;
?>