<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kanit|Martel+Sans|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Gothic|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Noto+Sans+KR|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" href="/write.css">
    <title>blog</title>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/App.js"></script>
    <script src="/js/Menu.js"></script>
    <script src="/js/Write.js"></script>
    <script src="/js/Form.js"></script>
    <script src="/js/Sand.js"></script>

    <!-- 글쓰기 에디터 -->
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  -->

    <!-- include summernote css/js-->
    <!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script> -->
    <!-- -->
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
                <div id="init-form" >
                    <div class="init-form">
                        <?php if(isset($_SESSION['user'])):?>
                        <a href="#" class="logoutBtn init-form-btn nav-text">로그아웃</a>
                        <?php else:?>
                        <a href="#" class="loginBtn init-form-btn nav-text">로그인</a>
                        <a href="#" class="joinBtn init-form-btn nav-text">회원가입</a>
                        <?php endif;?>
                    </div>
                </div>
                <a id="home" class="nav-text line-1" href="/"> 홈페이지 </a>
                <a id="" class="nav-text line-2" href="#"> 자기소개 </a>
                <a id="init-write" class="nav-text line-3" href="#"> 글쓰기 </a>
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
                    <a href="#" id="login-form-btn" class="form-btn">LogIn</a>
                </div>
                <div class="init-dif-form"><a class="dif-login">or Sign Up</a></div>
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
                    <a href="#" id="join-form-btn" class="form-btn">Join</a>
                </div>
                <div class="init-dif-form"><a class="dif-join">or LogIn</a></div>
            </form>
        </div>
        
        <div class="main">
            <div class="background-logo-text logo-text">ForEver</div>
            <div class="background-main-text main-text">Vlogging changed <br> My life</div>
        </div>
        <div id="write-area">
            <div class="write-tool">
                <i class="fas fa-times write-back-icon"></i>
            </div>
            <div class="write-sub-tool">
                <div id="title-tool" class="font-tool">
                    <select name="font-family" id="font-family" class="write-select first-select">
                        <option value="기본">폰트설정</option>
                        <option value="집">집</option>
                        <option value="가">가</option>
                        <option value="고싶다">고싶다</option>
                    </select>
                    <select name="font-size" id="font-size" class="write-select">
                        <option value="15px">15px</option>
                        <option value="17px">17px</option>
                        <option value="18px">18px</option>
                        <option value="25px">25px</option>
                    </select>
                    <select name="font-weight" id="font-weight" class="write-select">
                        <option value="기본">폰트크기</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                        <option value="bold">bold</option>
                    </select>
                    <button id="aignLeft" class="tool-btn font-align title-tool"><i class="fas fa-align-left aignLeft"></i></button>
                    <button id="aignCenter" class="tool-btn font-align title-tool"><i class="fas fa-align-center aignCenter"></i></button>
                    <button id="aignRight" class="tool-btn font-align title-tool"><i class="fas fa-align-right aignRight"></i></button>
                </div>

                <div id="content-tool" class="font-tool">  
                    <select name="font-family" id="font-family" class="write-select first-select">
                        <option value="기본">폰트설정</option>
                        <option value="집">집</option>
                        <option value="가">가</option>
                        <option value="고싶다">고싶다</option>
                    </select>
                    <select name="font-size" id="font-size" class="write-select">
                        <option value="15px">15px</option>
                        <option value="17px">17px</option>
                        <option value="18px">18px</option>
                        <option value="25px">25px</option>
                    </select>
                    <select name="font-weight" id="font-weight" class="write-select">
                        <option value="기본">폰트크기</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                        <option value="bold">bold</option>
                    </select>
                    <button id="aignLeft" class="tool-btn font-align content-tool"><i class="fas fa-align-left aignLeft"></i></button>
                    <button id="aignCenter" class="tool-btn font-align content-tool"><i class="fas fa-align-center aignCenter"></i></button>
                    <button id="aignRight" class="tool-btn font-align content-tool"><i class="fas fa-align-right aignRight"></i></button>
                    <button id="underline" class="tool-btn font-style content-tool"><i class="fas fa-underline"></i></button>
                    <button id="Italic" class="tool-btn font-style content-tool"><i class="fas fa-italic"></i></button>
                    <button id="textLink" class="tool-btn link content-tool"><i class="fas fa-paperclip"></i></button>
                </div>
            </div>
            <form id="write">
                <div class="write-header">
                    <div class="write-title" contenteditable="true" placeholder="제목"></div>
                </div>
                <div class="write-bottom">
                    <div class="write-content" contenteditable="true" placeholder="본문을 이곳에 입력해주세요!"></div>
                </div>
                <div class="linkForm">
                    <input type="text" id="url-link" placeholder="url을 입력하세요">
                    <button id="textLink" class="link content-tool"><i class="fas fa-paperclip linkForm-icon" onclick="document.execCommand('textLink')"></i></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>