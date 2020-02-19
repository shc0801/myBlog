class Menu {
    constructor(app) {
        //변수선언
        this.app = app;

        this.initForm = document.querySelectorAll(".init-form > a");
        this.initBoard = document.querySelector("#init-board");
        this.main = document.querySelectorAll(".main");
        
        this.addEvent();
    }

    addEvent() {
        this.app.$menu.addEventListener("click", this.menu)
        
        this.initBoard.addEventListener("click", ()=>{
            $.ajax({
                url: '/board',
                method: 'post',
                success: (data)=>{
                    if(data === '로그인 후 가능한 기능입니다') {
                        this.toastMsg(data);
                        return;
                    }
                    this.createWriteView(data.list);
                    this.changeMenuColor('#000');

                    this.app.$menuIcon.prop("che cked", false);
                    this.app.$boardNavUser.load("/ .board-nav-user");

                    setTimeout(()=>{
                        console.log(this);
                        let board = new Board(this.app, this);
                    }, 100)
                }
            })
        })

        // viewForm
        setInterval(() => {
            this.initForm = document.querySelectorAll(".init-form > a");
            this.initForm.forEach(btn=>{
                btn.addEventListener("click", e=>{
                    let form = new Form(this.app, this, e);
                })
            });
        }, 1000);

    }
    
    menu = () => {
        this.menuIcon = document.querySelector("#menuicon");
        if(!this.menuIcon.checked){
            this.viewMenu();
        } else {
            this.closeMenu();
        }
        this.changeMenuColor("#fff");
    }

    viewMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom':'0%',
            'opacity':'1'
        },'slow');
        // 
    }

    closeMenu() {
        // 화면전환
        this.app.$topDarkWrap.clearQueue().animate({
            'bottom' : '100%',
            'opacity':'0'
        },'slow');
        
        this.app.$login.clearQueue().animate({'opacity':'0'},'slow');
        this.app.$join.clearQueue().animate({'opacity':'0'},'slow');

        let leftDarkWrap = document.querySelector(".left-dark-wrap")
        let topDarkWrap = document.querySelector(".top-dark-wrap")
        setTimeout(() => {
            leftDarkWrap.style.visibility = 'visible';
            this.main.forEach(text=>{
                text.style.visibility = 'visible';
            });
            topDarkWrap.style.left = '45%';
            this.app.$leftDarkWrap.clearQueue().animate({'opacity':'0.4'},'slow');
            this.app.$main.clearQueue().animate({'opacity':'1'},'slow');
        }, 500);
        // 
    }

    //토스트 메시지
    
    toastMsg(msg){
        let toast = document.createElement("div");
        toast.id = 'toast';
        toast.style.zIndex = "200";
        toast.innerText = msg;

        if(document.querySelector("#toast") === null) 
            document.querySelector("body").appendChild(toast);
        else {
            toast.remove();
        }

        let $toast = $("#toast");
        $toast.clearQueue().animate({'opacity':'0.5'},'300');
        $toast.clearQueue().animate({'top':'85%'},'300');
        setTimeout(()=>{
            $toast.clearQueue().animate({'opacity':'0'},'300');
            $toast.clearQueue().animate({'top':'100%'},'300');
            setTimeout(() => {
                $toast.remove();
            }, 300);
        }, 2000)
    }

    ImageCheck(imageInput) {
        let filePath = imageInput.value;
        let fileKind = filePath.substr(filePath.length - 3, 3);
        let file = imageInput.files.length > 0 ? imageInput.files[0] : null;

        if(fileKind !== "jpg" && fileKind !== "gif" && fileKind !== "png")
        {
            alert("jpg, gif, png 확장자를 가진 이미지 파일만 올려주세요.");
            imageInput.value = "";
            imageInput.select();
            return;
        }
        this.url = URL.createObjectURL(file);
    }

    createWriteView(dataList) {
        let mainWriteView = document.querySelector("#board-main-write-view");
        this.app.$MainWriteView.empty();

        dataList.forEach((data)=>{

            $.ajax({
                url: '/commentLoad',
                method: 'post',
                data: data,
                success: (num)=>{
                    this.commentNum = num.commentData.length;
                    if(this.commentNum === undefined) this.commentNum = 0;

                    let boardMainWrite = document.createElement("form");
                    boardMainWrite.id = `write-view-${data.id}`;
                    boardMainWrite.classList.add("board-main-write"); 
                    boardMainWrite.classList.add(`${data.id}`); 
        
                    let write = `
                                <input type="hidden" name="write" class="write-select-input-${data.id}">
                                <p class="main-write-title">${data.title}</p>
                                <p class="main-write-modifi">수정</p>
                                <p class="main-write-delete">삭제</p>
                                <p class="main-write-name">${data.writer}</p>
                                <p class="main-write-comments">${this.commentNum}</p>
                                <p class="main-write-day">${data.date}</p>`;
        
                    boardMainWrite.innerHTML = write
                    mainWriteView.appendChild(boardMainWrite);
        
                    $(`.write-select-input-${data.id}`).val(`${data.id}`);
                    
                    this.writes = document.querySelectorAll(".board-main-write");
                }
            })
        })
    }

    changeMenuColor(color) {
        let menuBar = document.querySelectorAll(".hamburger > label > span");
                            
        menuBar.forEach(bar=>{
            bar.style.backgroundColor = color;
        })
    }
}