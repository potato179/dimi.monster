<?php
    header('Content-Type: application/json'); // Specify the type of data

    $url = "https://api.dimigo.in/timetable/weekly/grade/".$_GET['grade']."/class/".$_GET['class'];

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