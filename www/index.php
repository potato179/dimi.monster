<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://chicken-moo.com/files/js/jquery-latest.js"></script>
    <link rel="manifest" href="/js/manifest.webmanifest">
    <script src="./js/common.js"></script>
    <script src="./js/style.js?src=index"></script>
    <title>디미몬스터 :: 나의 소울메이트 찾기</title>
</head>
<body link="black" alink="black" vlink="black">
    <div class="title">
        <div class="flexBox">
            <img src="/img/dimimonster_logo.svg" alt="디미몬스터 로고" class="logo">
            <div class="text">
                <div class="mySoulMate">나의 소울메이트 찾기</div>
                <div class="dimiMonster">디미몬스터</div>
            </div>
        </div>
    </div>
    <div class="inputCode">
        <div class="img">
            <img src="/img/three_bug.svg" class="monster1">
        </div>
        <div class="code">
            <div class="cs">코드 입력<img src="/img/bug.svg" class="codeImg"></div>
            <div class="code-form">
                <input type="text" autocomplete="off" name="username" class="code-username" placeholder="마스터 등록 코드">
                <input type="password" autocomplete="off" name="password" class="code-password" placeholder="마스터 인증 코드">
                <input type="submit" value="마스터 인증" class="code-submit">
            </div>
            <div class="whatismastercode">마스터 코드를 모른다면?&nbsp;<div class="mastercodeis pointer">마스터 확인</div></div>
        </div>
    </div>
    <script>
        const post_to_url = (path, params, method) => {
            method = method || "post"; // Set method to post by default, if not specified.
            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);
            for(var key in params) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
        }
        const masterCode = () => {
            let username = $('.code-username').val();
            let password = $('.code-password').val();
            if(username == '' || password == '') {
                alert('아이디와 비밀번호를 입력해 주세요.');
                return;
            }
            $.ajax({
                url: 'https://api.dimi.monster/auth',
                type: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: (res) => {
                    let accessToken = res['accessToken'];
                    if(res['message'] == '로그인에 실패했어요.'){
                        alert('로그인 정보가 잘못됐어요.');
                        return;
                    }
                    console.log(accessToken);
                    post_to_url('/main', {'accessToken': accessToken});
                },
                error: (res) => {
                    alert(`[${res.status}] ${res.statusText}\n오류1!!!!`);
                }
            });
        };
        $('.code-submit').on('click', (event) => {
            masterCode();
        });
        $('.code-username').on('keydown', (key) => {
            if(key.keyCode == 13) masterCode();
        });
        $('.code-password').on('keydown', (key) => {
            if(key.keyCode == 13) masterCode();
        });
        let first = true;
        $('.mastercodeis').on('click', (event) => {
            if(first){
                $('.mastercodeis').html('디미고인 계정으로 시도하세요.');
                first = false;
            }
            else{
                $('.mastercodeis').html('마스터 확인');
                first = true;
            }
        });
    </script>
</body>
</html>
