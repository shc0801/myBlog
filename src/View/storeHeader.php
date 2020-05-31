<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스토어 페이지</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/store.css">
    <link rel="stylesheet" href="./resources/선수제공파일/(공통) 선수제공파일/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resources/선수제공파일/(공통) 선수제공파일/fontawesome/css/font-awesome.css">
    
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./resources/선수제공파일/(공통) 선수제공파일/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="./js/App.js"></script>
</head>
<body>
    <!-- 헤더 -->
    <header class="overflow-hidden">
        <div id="header-container" class="container">
            <div class="w-25 pt-3 pl-5 ml-3 float-left">
                <a href="#"><img class="logo" src="./images/logo.png" alt="logo" title="logo"></a>
            </div>
            <div class="search-form w-40 float-left mt-4 ml-5 pl-3">
                <input type="text" class="search w-90 h-100">
                <img class="float-right mt-2 pr-3" src="./images/B/search-icon.png" alt="">
            </div>
            <div class="form float-right pr-5">
                <a href="#" class="login" data-toggle="modal" data-target="#login">로그인</a>
                <a href="#" class="join" data-toggle="modal" data-target="#join">회원가입</a>
            </div>
        </div>
    </header>
    <nav>
        <div class="container h-100">
            <div class="menu w-40 h-100">
                <a href="/">홈</a> 
                <a href="/party">온라인 집들이</a>
                <a href="/store">스토어</a>
                <a href="/specialist">전문가</a>
                <a href="/estimate">시공견적</a>
            </div>
        </div>
    </nav>

    <!-- 모달 영역 -->

    <form id="login" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body">
                    <div class="form-header-text pt-5">
                        로그인
                    </div>
                    <div class="form-group mt-4">
                        <i id="user-icon" class="fa fa-user float-left pl-3"></i>
                        <input type="text" class="form-control float-left" id="userid" name="userid" placeholder="아이디">
                    </div>
                    <div class="form-group">
                        <i id="password-icon" class="fa fa-lock float-left pl-3"></i>
                        <input type="password" class="form-control float-left" id="password" name="password" placeholder="비밀번호" >
                    </div>
                    <div class="form-group">
                        <a href="#" id="login-form-btn">로그인</a>
                        <a href="#" id="forget-password" class="pt-3">비밀번호를 잊으셨나요?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="join" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body">
                    <div class="form-header-text pt-5">
                        회원가입
                    </div>
                    <div class="form-group mt-4">
                        <i id="user-icon" class="fa fa-envelope float-left pl-3"></i>
                        <input type="email" class="form-control float-left" id="email" name="email" placeholder="이메일">
                    </div>
                    <div class="form-group">
                        <i id="password-icon" class="fa fa-user float-left pl-3"></i>
                        <input type="text" class="form-control float-left" id="userid" name="userid" placeholder="아이디" >
                    </div>
                    <div class="form-group">
                        <i id="user-icon" class="fa fa-user float-left pl-3"></i>
                        <input type="text" class="form-control float-left" id="username" name="username" placeholder="이름">
                    </div>
                    <div class="form-group">
                        <i id="password-icon" class="fa fa-lock float-left pl-3"></i>
                        <input type="password" class="form-control float-left" id="password" name="password" placeholder="비밀번호" >
                    </div>
                    <div class="form-group">
                        <i id="password-icon" class="fa fa-lock float-left pl-3"></i>
                        <input type="password" class="form-control float-left" id="password-2" name="password-2" placeholder="2차 비밀번호" >
                    </div>
                    <div class="form-group">
                        <a href="#" id="login-form-btn">로그인</a>
                        <a href="#" id="forget-password" class="pt-3">비밀번호를 잊으셨나요?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="user-form" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body">
                    <div class="form-header-text pt-5">
                        주문자 정보 확인
                    </div>
                    <div class="form-group mt-4">
                        <i id="password-icon" class="fa fa-user float-left pl-3"></i>
                        <input type="text" class="form-control float-left" id="address" name="address" placeholder="이름" >
                    </div>
                    <div class="form-group">
                        <i id="user-icon" class="fa fa-map float-left pl-3"></i>
                        <input type="text" class="form-control float-left" id="name" name="name" placeholder="집주소">
                    </div>
                    <div class="form-group">
                        <a href="#" id="user-form-btn">구매완료</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="result" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body">
                    <div class="form-header-text pt-2">
                        영수증
                    </div>
                    <canvas id="modal-canvas" class="mt-3"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- 슬라이드 영역 -->
    <section id="visual">
        <input type="radio" name="slide" id="slide-1" hidden checked="">
        <input type="radio" name="slide" id="slide-2" hidden >
        <input type="radio" name="slide" id="slide-3" hidden >
        <input type="radio" name="slide" id="slide-4" hidden >

        <div id="slide-container" class="h-100 overflow-hidden">
            <div class="slider w-300 h-100">
                <div class="slide-img-1"></div>
                <div class="slide-img-2"></div>
                <div class="slide-img-3"></div>
            </div>
            <div class="rect h-90"></div>
            <div class="slide-text">
                <p><span>당신</span>만을 위한 인테리어</p>
                <p>What you want most, only for you</p>
            </div>

            <label class="slide-controller left-btn slide-2" for="slide-2"><img src="./images/left-btn.png" alt="left-btn" title="left-btn"></label>
            <label class="slide-controller left-btn slide-3" for="slide-3"><img src="./images/left-btn.png" alt="left-btn" title="left-btn"></label>
            <label class="slide-controller left-btn slide-4" for="slide-4"><img src="./images/left-btn.png" alt="left-btn" title="left-btn"></label>
            <label class="slide-controller left-btn slide-1" for="slide-1"><img src="./images/left-btn.png" alt="left-btn" title="left-btn"></label>

            <label class="slide-controller right-btn slide-2" for="slide-2"><img src="./images/right-btn.png" alt="right-btn" title="right-btn"></label>
            <label class="slide-controller right-btn slide-3" for="slide-3"><img src="./images/right-btn.png" alt="right-btn" title="right-btn"></label>
            <label class="slide-controller right-btn slide-4" for="slide-4"><img src="./images/right-btn.png" alt="right-btn" title="right-btn"></label>
            <label class="slide-controller right-btn slide-1" for="slide-1"><img src="./images/right-btn.png" alt="right-btn" title="right-btn"></label>
        </div>
    </section>