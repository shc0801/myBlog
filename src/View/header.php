<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내집꾸미기</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/store.css">
    <link rel="stylesheet" href="./css/sub.css">
    <link rel="stylesheet" href="./resources/선수제공파일/(공통) 선수제공파일/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resources/선수제공파일/(공통) 선수제공파일/fontawesome/css/font-awesome.css">

    <script src="./js/Write.js"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./resources/선수제공파일/(공통) 선수제공파일/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</head>
<body>
    <!-- 헤더 -->
    <header class="overflow-hidden">
        <div id="header-container h-100" class="container">
            <div class="w-25 h-100 pt-3 pl-5 ml-3 float-left">
                <a href="#"><img class="logo" src="./images/logo.png" alt="logo" title="logo"></a>
            </div>
            <nav class="w-40 h-100 float-left ml-5">
                <div class="menu w-100 h-100 float-left pl-5">
                    <a href="/">홈</a> 
                    <a href="/party">온라인 집들이</a>
                    <a href="/store">스토어</a>
                    <a href="/specialist">전문가</a>
                    <a href="/build">시공견적</a>
                </div>
            </nav>
            <div class="form float-right pr-5">
                <?php if(isset($_SESSION['user'])):?>
                    <a href="#"><?=$_SESSION['user']->user_name?>( <?=$_SESSION['user']->user_id?> )</a>
                    <a href="/logout">로그아웃</a>
                <?php else:?>
                    <a href="#" class="login" data-toggle="modal" data-target="#login">로그인</a>
                    <a href="#" class="join" data-toggle="modal" data-target="#join">회원가입</a>
                <?php endif;?>
            </div>
        </div>
    </header>

    <!-- 모달 영역 -->

    <form id="login" action="/login" method="post" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body">
                    <div class="form-header-text pt-4">
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
                        <button id="login-form-btn" class="modal-btn">로그인</button>
                        <a href="#" id="forget-password" class="pt-3">비밀번호를 잊으셨나요?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="join" action="/join" method="post" class="modal fade" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        회원가입
                    </div>
                    <div class="form-group">
                        <i id="user-icon" class="fa fa-user float-left pl-3"></i>
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
                        <i id="profile-picture-icon" class="fa fa-image float-left pl-3"></i>
                        <input type="file" class="form-control float-left" id="profile-picture" name="profile-picture">
                    </div>
                        <img id="capt-img" class="w-80 float-left" src="./captcha.php">
                    <div class="form-group capt-form">
                        <input id="capt-input" type="text" class="w-100" name="captcha" placeholder="자동가입방지글자">
                    </div>
                    <div class="form-group">
                        <button id="join-form-btn" class="modal-btn">회원가입</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="write" method="post" class="modal fade" name="write">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        글쓰기
                    </div>
                    <div class="form-group mt-4 textarea-form">
                        <textarea id="content" name="content" cols="30" rows="10" placeholder="노하우를 입력하세요!"></textarea>
                    </div>
                    <div class="form-group write-form-group">
                        <p>before사진</p>
                        <input type="file" name="before" id="before">
                        <p class="pt-2">after사진</p>
                        <input type="file" name="after" id="after">
                    </div>
                    <div class="form-group">
                        <a id="write-form-btn" class="modal-btn">글쓰기</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="rating" method="post" class="modal fade" name="rating">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        평점
                    </div>
                    <div class="form-group mt-4">
                        <select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <a id="rating-form-btn" class="modal-btn">평점주기</a>
                    </div>
                    <input type="hidden" id="w_id" name="w_id">
                </div>
            </div>
        </div>
    </form>

    <form id="review-form" method="post" class="modal fade" name="review">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        전문가 시공 후기
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control float-left" id="price" name="price" placeholder="가격을 입력하세요">
                    </div>
                    <div class="form-group mt-4 textarea-form">
                        <textarea id="content" name="content" cols="30" rows="10" placeholder="내용를 입력하세요"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <a id="review-form-btn" class="modal-btn">작성완료</a>
                    </div>
                    <input type="hidden" id="specialist_id" name="specialist_id">
                </div>
            </div>
        </div>
    </form>
    
    <form id="request" method="post" class="modal fade" name="request">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        젼적 요청
                    </div>
                    <div class="form-group">
                        <i id="calendar-icon" class="fa fa-calendar float-left pl-3"></i>
                        <input type="date" class="form-control float-left" id="date" name="date">
                    </div>
                    <div class="form-group mt-4 textarea-form">
                        <textarea id="content" name="content" cols="30" rows="10" placeholder="내용를 입력하세요"></textarea>
                    </div>
                    <div class="form-group">    
                        <a id="request-form-btn" class="modal-btn">작성완료</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="build-form" method="post" class="modal fade" name="build">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body d-flex flex-column">
                    <div class="form-header-text pt-4">
                        견적 작성
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control float-left" id="price" name="price" placeholder="가격을 입력하세요">
                    </div>
                    <div class="form-group">    
                        <a id="build-form-btn" class="modal-btn">작성완료</a>
                    </div>
                    <input name="num" type="text" hidden>
                </div>
            </div>
        </div>
    </form>

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