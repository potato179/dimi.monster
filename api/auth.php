<?php
    include 'common.php';
    header('Content-Type: application/json'); // Specify the type of data
    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password']
    );
    $url = 'https://api.dimigo.in/auth';
    echo post_json($url, $data);
?>