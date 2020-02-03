<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kanit|Martel+Sans|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Gothic|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Noto+Sans+KR|Roboto&display=swap" rel="stylesheet">
    <title>blog</title>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/App.js"></script>
    <script src="/js/Menu.js"></script>
    <script src="/js/Form.js"></script>
</head>
<body>
    <div id="container">
        <!-- <a href="https://pixabay.com/ko/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1280537">Pixabay</a>로부터 입수된 <a href="https://pixabay.com/ko/users/freephotocc-2275370/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1280537">Andrian Valeanu</a>님의 이미지 입니다. -->
        <header>
            <div class="hamburger">
                <input type="checkbox" id="menuicon">
                <label for="menuicon">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </header>

        <div class="left-dark-wrap"></div>
        <div class="top-dark-wrap">
            <nav>
                <div class="init-form">
                    <a href="#" class="loginBtn init-form-btn nav-text">로그인</a>
                    <a href="#" class="joinBtn init-form-btn nav-text">회원가입</a>
                </div>
                <a id="home" class="nav-text line-1" href="#"> 홈페이지 </a>
                <a id="" class="nav-text line-2" href="#"> 자기소개 </a>
                <a class="nav-text line-3" href="#"> 글쓰기 </a>
                <a class="nav-text line-4" href="#"> 지도 </a>
            </nav>

            <form id="login">
                <div class="form-header-text">
                    Blog_Login
                </div>
                <div class="form-group">
                    <label for="userid">User Id</label>
                    <input type="text" class="form-control is-invalid" id="userid" name="userid">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control is-invalid" id="password" name="password">
                </div>
                <div class="form-group">
                    <button id="login-form-btn">LogIn</button>
                </div>
                <div class="init-dif-form"><a class="dif-login" href="#">or Sign Up</a></div>
            </form>

            <form id="join">
                <div class="form-header-text">
                    Blog_Join
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control is-invalid" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="userid">User Id</label>
                    <input type="text" class="form-control is-invalid" id="userid" name="userid">
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control is-invalid" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control is-invalid" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-2">password-2</label>
                    <input type="password" class="form-control is-invalid" id="password-2" name="password-2">
                </div>
                <div class="form-group">
                    <button id="login-form-btn">Join</button>
                </div>
                <div class="init-dif-form"><a class="dif-join" href="#">or LogIn</a></div>
            </form>
        </div>
        <div class="main">
            <div class="background-logo-text logo-text">ForEver</div>
            <div class="background-main-text main-text">Vlogging changed <br> My life</div>
        </div>
    </div>
</body>
</html>