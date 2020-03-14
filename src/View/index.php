<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>부산뮤직페스티벌</title>
    <link rel="stylesheet" href="./css/fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./js/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Search.css">
    <link rel="stylesheet" href="./css/Library.css">
    <link rel="stylesheet" href="./css/playlist.css">
    <link rel="stylesheet" href="./css/Queue.css">
    
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="./js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="./js/script.js"></script>
</head>
<body>
    <div id="contextmenu">
        
    </div>
    <div id="playListMenu">
        <div class="addPlayList">
        </div>
        <div class="newPlayList">
            새 재생목록
        </div>
        <div class="newplayListForm" style="display: none;">
            이름
            <input id="playListInput" type="text" placeholder="재생목록 이름 입력">
            <button id="addPlayListBtn">확인</button>
        </div>
        <div class="closePlayList">
            <i class="fa fa-close"></i>
        </div>
    </div>
    <div id="lyric-form"></div>
    <!-- <div class="loading-form">
        <div class="loading"></div>
    </div> -->
    <header>
        <a href="#"><img id="logo" src="./images/logo.png" alt=""></a>
        <form class="search-bar">
            <i class="fa fa-search"></i>
            <input type="text" id="search" name="search" placeholder="search for songs">
        </form>
    </header>
    <nav>
        <div class="line"></div>
        <div class="menu-top-text">
            <p>menu</p>
        </div>
        <div class="menu">
            <div class="menu-logIn">
                <div id="init-form">
                    <?php if(isset($_SESSION['user'])):?>
                        <label id="logout-label">logout</label>
                    <?php else:?>
                        <label id="login-label" for="login-key">logIn</label>
                    <?php endif;?>
                </div>
                <input type="checkbox" id="login-key">
                <form id="login-form" method='post' action="/login">
                    <div class="login-form-title">
                        LogIn
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
                </form>
            </div>
            <div class="menu-HOME page Home"><a href="#"><p>HOME</p></a></div>
            <div class="menu-Library page Library"><a href="#"><p>Library</p></a></div>
            <div class="menu-Queue page Queue"><a href="#"><p>Queue</p></a></div>
        </div>
        <div class="thank-you">
            <p>Thank you for useing this web</p>
        </div>
        <div class="thank-you-line"></div>
    </nav>
    <section style="display: block;">
        <div class="music-recommendation music">
            <p>추천음악</p>
            <div>
                
            </div>
        </div>
        <div class="music-genre">
            <div class="music-genre-ballad music">
                <p>발라드</p>
                <div>
                    <div class="12">
                        <img src="./covers/pathos.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>어디에도</span><br>
                        [MV] M.C THE MAX(엠씨더맥스)</p>
                    </div>
                    <div class="6">
                        <img src="./covers/180˚.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>180도</span><br>
                        벤</p>
                    </div>
                    <div class="5">
                        <img src="./covers/헤어져줘서 고마워.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>헤어져줘서 고마워</span><br>
                        벤</p>
                    </div>
                    <div class="7">
                        <img src="./covers/RECIPE.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>열애중</span><br>
                        벤</p>
                    </div>
                    <div class="11">
                        <img src="./covers/너를 만나.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>너를 만나</span><br>
                            폴킴</p>
                    </div>
                </div>
            </div>
            <div class="music-genre-rap music">
                <p>힙합/랩</p>
                <div>
                    <div class="10">
                        <img src="./covers/Dingo X Indigo Music.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>띵</span><br>
                            (Prod. By 기리보이)</p>
                    </div>
                    <div class="17">
                        <img src="./covers/XX.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>아낙네</span><br>
                            MINO (송민호)</p>
                    </div>
                    <div class="18">
                        <img src="./covers/제니 (JENNIE).jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>"SOLO"</span><br>
                            제니 (JENNIE)</p>
                    </div>
                    <div class="19">
                        <img src="./covers/LOVE YOURSELF ̿ `Answer`.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>IDOL</span><br>
                            방탄소년단</p>
                    </div>
                    <div class="20">
                        <img src="./covers/LOVE YOURSELF 承 `Her`.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>DNA</span><br>
                            방탄소년단</p>
                    </div>
                </div>
            </div>
            <div class="music-genre-dence music">
                <p>댄스</p>
                <div>
                    <div class="8">
                        <img src="./covers/Perfect Velvet - The 2nd Album.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>피카부 (Peek-A-Boo)</span><br>
                        Red Velvet (레드벨벳)</p>
                    </div>
                    <div class="22">
                        <img src="./covers/YES or YES.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>YES or YES</span><br>
                        트와이스 (twice)</p>
                    </div>
                    <div class="1">
                        <img src="./covers/Fun to The World.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>BAAM</span><br>
                        모모랜드 (Momoland)</p>
                    </div>
                    <div class="2">
                        <img src="./covers/GREAT!.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>뿜뿜</span><br>
                        모모랜드 (Momoland)</p>
                    </div>
                    <div class="0">
                        <img src="./covers/Show me.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>I'm So Hot</span><br>
                        모모랜드 (Momoland)</p>
                    </div>
                </div>
            </div>
            <div class="music-genre-Rock music">
                <p>록/메탈</p>
                <div>
                    <div class="16">
                        <img src="./covers/장범준 3집.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>당신과는 천천히</span><br>
                        장범준</p>
                    </div>
                    <div class="26">
                        <img src="./covers/Red Diary Page.2.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>여행</span><br>
                        볼빨간사춘기</p>
                    </div>
                    <div class="27">
                        <img src="./covers/2012.02.14.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>We Are Young (Feat. Janelle Monae)</span><br>
                        Fun.</p>
                    </div>
                    <div class="30">
                        <img src="./covers/전설.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>주저하는 연인들을 위해</span><br>
                        잔나비</p>
                    </div>
                </div>
            </div>
            <div class="music-genre-POP music">
                <p>POP</p>
                <div>
                    <div class="15">
                        <img src="./covers/Evolve.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>Believer</span><br>
                        Imagine Dragons</p>
                    </div>
                    <div class="28">
                        <img src="./covers/Nine Track Mind (Deluxe).jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>We Don`t Talk Anymore (Feat. Selena Gomez)</span><br>
                        Charlie Puth</p>
                    </div>
                    <div class="29">
                        <img src="./covers/Despacito.jpg" alt="">
                        <div class="play-btn"><i class="fa fa-play"></i></div>
                        <p><span>Despacito (Feat. Daddy Yankee)</span><br>
                        Luis Fonsi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="cover-img">
            <img src="" alt="">
        </div>
        <div class="music-text">

        </div>
        <div class="music-player">
            <div class="music-player-top">
                <i class="fa fa-step-backward"></i>
                <i class="fa fa-play"></i>
                <i class="fa fa-pause"></i>
                <i class="fa fa-step-forward"></i>
                <input id="repeat-btn" type="button" value="반복안함">
            </div>
            <div class="music-player-bottom">
                <div class="view-lyrics-btn">가사보기</div>
                <div class="now-time">0:00</div>
                <input id="time-bar" type="range" value="0" max="100" min="0">
                <div class="all-time">0:00</div>
                <i class="fa fa-volume-off sound-btn"></i>
                <input type="range" id="sound-set" value="5" max="10" min="0">
                <div class="sound-percent">50%</div>
            </div>
        </div>
    </footer>
</body>
</html>