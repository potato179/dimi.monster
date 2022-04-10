<?php
    include '../api/common.php';
    $bear = 'Authorization: Bearer '.$_POST['accessToken'];
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
    if(empty($rp)) makeError('403 Forbidden', '403 로그인 형식 잘못됨');
?>
<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://chicken-moo.com/files/js/jquery-latest.js"></script>
    <script src="./js/common.js"></script>
    <script src="./js/style.js?src=index"></script>
    <title>디미몬스터 :: 나의 소울메이트 찾기</title>
    <script>
        const accessToken = "<?php echo $_POST['accessToken']; ?>";
        const userInfo = <?php echo $resp; ?>['identity'];
        console.log(userInfo);
    </script>
</head>
<body link="black" alink="black" vlink="black">
    <div class=""></div>

    <script>

    </script>
</body>
</html>
