<?php
    include 'common.php';
    $accessToken = $_GET['accessToken'];
    $userInfomation = json_decode(post_text('https://api.dimi.monster/me', array(
        'accessToken' => $accessToken
    )), true)['identity'];
    if(empty($userInfomation)){
        echo json_encode(array(
            'message' => 'accessToken이 입력되지 않았거나 변조되었습니다.'
        ));
    }
    
    echo date("YmdHis").$userInfomation['serial'];

    $allowed_ext = array('jpg','jpeg','png');
?>