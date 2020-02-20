<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/blog.css">

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kanit|Martel+Sans|Oswald|PT+Mono|Pacifico|Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Gothic|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Noto+Sans+KR|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <title>blog</title>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/App.js"></script>
    <script src="/js/Menu.js"></script>
    <script src="/js/Board.js"></script>
    <script src="/js/Write.js"></script>
    <script src="/js/Form.js"></script>
    <script src="/js/SandUser.js"></script>
    <script src="/js/SandWrite.js"></script>
    <script src="/js/SandComment.js"></script>
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
                        <a href="/" class="logoutBtn init-form-btn nav-text">로그아웃</a>
                        <?php else:?>
                        <a href="#" class="loginBtn init-form-btn nav-text">로그인</a>
                        <a href="#" class="joinBtn init-form-btn nav-text">회원가입</a>
                        <?php endif;?>
                    </div>
                </div>
                <a id="home" class="nav-text line-1" href="/"> 홈페이지 </a>
                <a id="" class="nav-text line-2" href="#">  회원정보 </a>
                <a id="init-board" class="nav-text line-3" href="#"> 게시판 </a>
                <a class="nav-text line-4" href="#"> 지도 </a>
            </nav>

            <form id="login">
                <div class="form-header-text">
                    Blog_Login
                </div>
                <div class="form-group">
                    <label for="userid">아이디</label>
                    <input type="text" class="form-control is-invalid" id="login-userid" name="userid">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" class="form-control is-invalid" id="login-password" name="password">
                </div>
                <div class="form-group">
                    <a href="#" id="login-form-btn" class="form-btn">로그인</a>
                </div>
                <div class="init-dif-form"><a class="dif-login">or Sign Up</a></div>
            </form>

            <form id="join" enctype="multipart/form-data">
                <div class="form-header-text">
                    Blog_Join
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="email" class="form-control is-invalid" id="join-email" name="email">
                </div>
                <div class="form-group">
                    <label for="userid">아이디</label>
                    <input type="text" class="form-control is-invalid" id="join-userid" name="userid">
                </div>
                <div class="form-group">
                    <label for="username">이름</label>
                    <input type="text" class="form-control is-invalid" id="join-username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" class="form-control is-invalid" id="join-password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-2">비밀번호 확인</label>
                    <input type="password" class="form-control is-invalid" id="join-password-2" name="password-2">
                </div>
                <div class="form-group Profile-picture">
                    <label for="Profile-picture">프로필 사진(선택)</label>
                    <input type="file" class="form-control is-invalid" id="Profile-picture" name="Profile-picture">
                </div>
                <div class="form-group">
                    <a href="#" id="join-form-btn" class="form-btn">회원가입</a>
                </div>
                <div class="init-dif-form"><a class="dif-join">or LogIn</a></div>
            </form>
        </div>

        <div class="main">
            <div class="background-logo-text logo-text">ForEver</div>
            <div class="background-main-text main-text">Vlogging changed <br> My life</div>
        </div>

        <div id="board">
            <div id="board-header" class="logo-text">
                <span class="board-logo-text">FE</span>
            </div>
            <nav id="board-nav"> 
                <div class="board-nav-header">
                <div class="board-nav-pic">
                    <img id="board-nav-pic" src="/upload/<?=$_SESSION['user']->image?>" alt="">
                </div>
                    <div class="board-nav-user">
                        <?php if(isset($_SESSION['user'])):?>
                        <span><?=$_SESSION['user']->user_id; ?>님의 블로그</span>
                        <p><?=$_SESSION['user']->email; ?></p>
                        <?php endif;?>
                    </div>
                </div>
                <div id="init-write" class="board-nav-btn">글쓰기<i class="fas fa-edit init-write-icon"></i></div>
                <div class="board-nav-category">
                    <a class="board-nav-viewAll" href="#">전체보기</a>
                    <a class="board-nav-viewAll" href="#">글 관리</a>
                    <a class="board-nav-viewAll" href="#">페이지 관리</a>
                    <a class="board-nav-viewAll" href="#">설정</a>
                </div>
            </nav>
            <div id="board-main">
                <div class="board-main-writes">
                    <div class="board-main-header-text form-group">전체보기</div>
                    <div class="header-buttom-line"></div>
                    <div class="main-list-name">
                        <p>제목</p>
                        <p>작성자</p>
                        <p>댓글 수</p>
                        <p>업로드 날짜</p> 
                    </div>
                    <div id="board-main-write-view">
                        <!-- 글 들어오는 부분 -->
                    </div>
                </div>
                <div class="board-main-page">

                </div>
                <div class="board-main-setting">

                </div>
            </div>

            <div id="write-view-area">
                <div class="write-view-write">
                    <!-- 글 들어오는 부분 -->
                </div>
                <div class="write-view-area-comment">
                    <div id="comment-area">
                    </div>
                    <form id="comment-form">
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        <input type="hidden" name="id" id="comment-write-id">
                        <a href="#" id="comment-save-btn">댓글 남기기</a>
                    </form>
                </div>
            </div>
        
            <div id="write-area">
                <div class="write-sub-tool">
                    <div id="title-tool" class="font-tool">
                        <select name="font-family" id="font-family" class="write-select first-select">
                            <option value="기본">폰트설정</option>
                            <option value="집">집</option>
                            <option value="가">가</option>
                            <option value="고싶다">고싶다</option>
                        </select>
                        <select name="font-size" id="font-size" class="write-select">
                            <option value="15px">20px</option>
                        </select>
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
                        </select>
                        <button id="justifyLeft" class="tool-btn font-align content-tool"><i class="fas fa-align-left aignLeft"></i></button>
                        <button id="justifyCenter" class="tool-btn font-align content-tool"><i class="fas fa-align-center aignCenter"></i></button>
                        <button id="justifyRight" class="tool-btn font-align content-tool"><i class="fas fa-align-right aignRight"></i></button>
                        <button id="CreateLink" class="tool-btn link content-tool"><i class="fas fa-paperclip"></i></button>
                        <button id="insertHTML" class="tool-btn image content-tool"><i class="far fa-image imageForm-icon"></i></button>
                    </div>
                </div>
                <form id="write">
                    <div class="write-header">
                        <div class="write-title" contenteditable="true" placeholder="제목"></div>
                        <input id="write-title-input" name="title" type="hidden">
                    </div>
                    <div class="write-bottom">
                        <div class="write-content" contenteditable="true" placeholder="본문을 이곳에 입력해주세요!"></div>
                        <input id="write-content-input" name="content" type="hidden">
                    </div>
                    <div class="write-image imageForm">
                        <input id="image-change-input" class="write-image" type="file">
                        <input type="text" id="image-width-input" class="write-image" placeholder="이미지의 width값 ex)100">
                        <input type="text" id="image-height-input" class="write-image" placeholder="이미지의 height값 ex)100">
                        <a class="write-image file content-tool insertImage"><i id="image-icon" class="write-image far fa-image imageForm-icon"></i></a>
                    </div>
                    <div class="linkForm">
                        <input type="text" id="link-url-link" placeholder="url을 입력하세요">
                        <a class="link content-tool CreateLink"><i class="fas fa-paperclip linkForm-icon"></i></a>
                    </div>
                    <input id="write-date-input" type="hidden" name="date">
                    <a href="#" id="write-save-btn" class="write">저장</a>
                    <a href="#" id="write-back-btn">취소</a>
                    <input id="update-delete" type="hidden" name="number">
                </form>
            </div>
        </div>
    </div>
</body>
</html>