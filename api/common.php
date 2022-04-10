<?php
    date_default_timezone_set('Asia/Seoul');
    function post_json($url, $fields){
        $post_field_string = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    function post_text($url, $fields){
        $post_field_string = http_build_query($fields, '', '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    function isDimigoinUser($accessToken){
        $bear = 'Authorization: Bearer '.$accessToken;
        $url = "https://api.dimigo.in/user/me";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            $bear
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        $rp = json_decode($resp, true)['identity'];
        return empty(!$rp);
    }
    function makeError($error, $message){
        header('HTTP/1.0 '.$error);
        echo '<!DOCTYPE html>
        <html lang="kr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://chicken-moo.com/files/js/jquery-latest.js"></script>
            <script src="https://dimi.monster/js/common.js"></script>
            <script src="https://dimi.monster/js/style.js?src=index"></script>
            <script src="https://dimi.monster/js/style.js?src=error"></script>
            <title>디미몬스터 :: 나의 소울메이트 찾기</title>
        </head>
        <body link="black" alink="black" vlink="black">
            <div class="title">
                <div class="flexBox pointer">
                    <img src="/img/dimimonster_logo.svg" alt="디미몬스터 로고" class="logo">
                    <div class="text">
                        <div class="mySoulMate">나의 소울메이트 찾기</div>
                        <div class="dimiMonster">디미몬스터</div>
                    </div>
                </div>
            </div>
            <div class="inputCode">
                <div class="resps">
                    <div class="e1">오류!</div><div class="e2">'.$message.'</div>
                </div>
            </div>
            <script>
                $(".flexBox").on("click", (event) => {
                    location.href = "/";
                });
            </script>
            
        </body>
        </html>
        ';
        exit();
    }
?>