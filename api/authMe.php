<?php
    include 'common.php';
    header('Content-Type: application/json'); // Specify the type of data
    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password']
    );
    $url = 'https://api.dimi.monster/auth';
    $accessToken = json_decode(post_text($url, $data), true)['accessToken'];
    $bear = 'Authorization: Bearer '.$accessToken;

    $url = "https://api.dimigo.in/user/me";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        $bear
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    echo $resp;
?>